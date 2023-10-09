<?php

namespace App\Http\Requests\Front\HotelBooking;

use App\Models\User\HotelBooking\Room;
use App\Rules\IsRoomAvailableRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $maxGuests = Room::query()->findOrFail($this->room_id)->max_guests;
        $ruleArray = [
            'dates' => [
                'required',
                new IsRoomAvailableRule($this->room_id)
            ],
            'nights' => 'required|numeric|min:1',
            'guests' => ['required', 'numeric', 'min:1', 'max:' . $maxGuests],
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required|email:rfc,dns'
        ];

        if ($this->paymentType == 'stripe') {
            $ruleArray['cardNumber'] = 'required';
            $ruleArray['cardCVC'] = 'required';
            $ruleArray['month'] = 'required';
            $ruleArray['year'] = 'required';
        }
        if ($this->paymentType == 'authorize.net') {
            $ruleArray['AuthorizeCardNumber'] = 'required';
            $ruleArray['AuthorizeCardCode'] = 'required';
            $ruleArray['AuthorizeMonth'] = 'required';
            $ruleArray['AuthorizeYear'] = 'required';
        }

        return $ruleArray;
    }
}
