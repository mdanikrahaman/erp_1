@extends('front.layout')

@section('breadcrumb-title')
    {{ __('Page Not Found') }}
@endsection
@section('breadcrumb-link')
    {{ __('404') }}
@endsection

@section('content')
    <!--  Error section start  -->
    <div class="error-section ptb-120 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="not-found">
                        <svg data-src="{{ asset('assets/front/img/404.svg') }}" data-unique-ids="disabled"
                            data-cache="disabled"></svg>
                    </div>
                    <div class="error-txt">
                        <h2>{{ __("You're lost") }}...</h2>
                        <p class="mx-auto">
                            {{ __('The page you are looking for might have been moved, renamed, or might never existed.') }}

                        </p>
                        <a href="{{ route('front.index') }}" class="btn btn-lg btn-primary">{{ __('Back to Home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Error section end  -->
@endsection
