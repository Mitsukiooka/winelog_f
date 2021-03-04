@extends('layouts.app')

@section('content')
<main id="main">
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Reset Password</h2>
            </div>

            <form method="POST" action="{{ route('password.email') }}" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-md-6 form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <div class="validate"></div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" name='action' value='add'>
                            {{ __('送信') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
