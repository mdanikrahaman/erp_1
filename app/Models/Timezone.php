<?php

namespace App\Models;

use App\Models\User\BasicSetting;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    public $timestamps = false;

    protected $table = "timezones";

    public $fillable = [
        'country_code',
        'timezone',
        'gmt_offset',
        'dst_offset',
        'raw_offset',
    ];

    public function basicSettings()
    {
        return $this->belongsTo(BasicSetting::class, 'timezone');
    }
}
