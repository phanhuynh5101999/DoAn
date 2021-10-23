@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div style="font-size: 18px;" class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <a style="font-size: 16px; font-style: italic" href="http://localhost/Phan_Thuc_Huynh_1711060722/public/reset-password/{{$token}}">Click here to confirm your password change</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
