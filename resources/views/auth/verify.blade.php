@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Убедитесь, что Ваш Email ') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('На ваш электронный адрес отправлено писмо для проверки.') }}
                        </div>
                    @endif

                    {{ __('Перед тем, как продолжить, пожалуйста, проверьте вашу электронную почту на предмет наличия писма подтверждения.') }}
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажать здесь, чтобы запросить другой') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
