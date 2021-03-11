@extends('layouts.app')

@section('content')
<main id="main">
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Login</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-md-6 form-group-login">
                        <input type="text" name="email" id="email" placeholder="メールアドレス" class="form-control @error('email') is-invalid @enderror">
                        <div class="validate"></div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6 form-group-login">
                        <input type="password" name="password" id="password" placeholder="パスワード" class="form-control @error('password') is-invalid @enderror">
                        <div class="validate"></div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6 form-group-login">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span>{{ __('ログイン情報を保存') }}</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary-login" name='action' value='add'>
                            {{ __('ログイン') }}
                        </button>
                        <a href="{{ route('register')  }}"><p>{{ __('アカウント作成はこちら') }}</p></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
