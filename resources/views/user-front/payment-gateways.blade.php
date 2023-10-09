<select required name="payment_method" id="payment-gateway" class="olima_select form_control">
    <option value="" selected disabled>{{ $keywords['Choose_an_option'] ?? __('Choose an option') }}
    </option>
    @foreach ($payment_gateways as $payment)
        <option value="{{ $payment->name }}" {{ old('payment_method') == $payment->name ? 'selected' : '' }}>
            {{ $payment->name }}
        </option>
    @endforeach
    @foreach ($offlines as $offline)
        <option value="{{ $offline->name }}" {{ old('payment_method') == $offline->name ? 'selected' : '' }}>
            {{ $offline->name }}
        </option>
    @endforeach
</select>


{{-- START: Stripe Card Details Form --}}
<div class="row gateway-details py-3" id="tab-stripe" style="display: none;">
    <div class="col-md-6">
        <div class="form_group">
            <label>{{ __('Card Number') }} *</label>
            <input type="text" class="form-control" name="cardNumber" placeholder="{{ __('Card Number') }}"
                autocomplete="off" oninput="validateCard(this.value);" disabled />
            @if ($errors->has('cardNumber'))
                <p class="text-danger">{{ $errors->first('cardNumber') }}</p>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form_group">
            <label>{{ __('CVC') }} *</label>
            <input type="text" class="form-control" placeholder="{{ __('CVC') }}" name="cardCVC"
                oninput="validateCVC(this.value);" disabled>
            @if ($errors->has('cardCVC'))
                <p class="text-danger">{{ $errors->first('cardCVC') }}</p>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form_group">
            <label>{{ __('Month') }} *</label>
            <input type="text" class="form-control" placeholder="{{ __('Month') }}" name="month" disabled>
            @if ($errors->has('month'))
                <p class="text-danger">{{ $errors->first('month') }}</p>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form_group">
            <label>{{ __('Year') }} *</label>
            <input type="text" class="form-control" placeholder="{{ __('Year') }}" name="year" disabled>
            @if ($errors->has('year'))
                <p class="text-danger">{{ $errors->first('year') }}</p>
            @endif
        </div>
    </div>
</div>
{{-- END: Stripe Card Details Form --}}

{{-- START: Authorize.net Card Details Form --}}
<div class="row gateway-details py-3" id="tab-anet" style="display: none;">
    <div class="col-lg-6">
        <div class="form_group mb-3">
            <input class="form-control" type="text" name="anetCardNumber" id="anetCardNumber"
                placeholder="Card Number" disabled />
        </div>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="form_group">
            <input class="form-control" type="text" name="anetExpMonth" id="anetExpMonth" placeholder="Expire Month"
                disabled />
        </div>
    </div>
    <div class="col-lg-6 ">
        <div class="form_group">
            <input class="form-control" type="text" name="anetExpYear" id="anetExpYear" placeholder="Expire Year"
                disabled />
        </div>
    </div>
    <div class="col-lg-6 ">
        <div class="form_group">
            <input class="form-control" type="text" name="anetCardCode" id="anetCardCode" placeholder="Card Code"
                disabled />
        </div>
    </div>
    <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" disabled />
    <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" disabled />
    <ul id="anetErrors"></ul>
</div>
{{-- END: Authorize.net Card Details Form --}}

<div id="instructions"></div>
<input type="hidden" name="is_receipt" value="0" id="is_receipt">

@if ($errors->has('receipt'))
    <p class="text-danger mb-4">{{ $errors->first('receipt') }}</p>
@endif
{{-- End: Offline Gateways Area --}}
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="lc" value="UK">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="ref_id" id="ref_id" value="">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
<input type="hidden" name="currency_sign" value="$">
