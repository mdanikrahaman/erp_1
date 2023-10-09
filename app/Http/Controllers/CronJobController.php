<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Membership;
use App\Models\BasicSetting;
use Illuminate\Http\Request;
use App\Models\BasicExtended;
use App\Jobs\SubscriptionExpiredMail;
use App\Jobs\SubscriptionReminderMail;
use Illuminate\Support\Facades\Config;
use App\Http\Helpers\UserPermissionHelper;

class CronJobController extends Controller
{
    public function expired()
    {

        $bs = BasicSetting::first();
        $be = BasicExtended::first();

        Config::set('app.timezone', $bs->timezone);
        $exMembers = Membership::whereDate('expire_date', Carbon::now()->subDays(1))->get();
        foreach ($exMembers as $key => $exMember) {
            if (!empty($exMember->user)) {
                $user = $exMember->user;
                $currPackage = UserPermissionHelper::userPackage($user->id);

                if (is_null($currPackage)) {
                    SubscriptionExpiredMail::dispatch($user, $bs, $be);
                }
            }
        }


        $rmdMembers = Membership::whereDate('expire_date', Carbon::now()->addDays($be->expiration_reminder))->get();
        foreach ($rmdMembers as $key => $rmdMember) {
            if (!empty($rmdMember->user)) {
                $user = $rmdMember->user;
                $nextPackageCount = Membership::query()->where([
                    ['user_id', $user->id],
                    ['start_date', '>', Carbon::now()->toDateString()]
                ])->where('status', '<>', 2)->count();

                if ($nextPackageCount == 0) {
                    SubscriptionReminderMail::dispatch($user, $bs, $be, $rmdMember->expire_date);
                }
            }
        }

        \Artisan::call("queue:work --stop-when-empty");
    }
}
