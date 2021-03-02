@extends('layouts.app')

@section('content')
<main id="main">
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Register</h2>
            </div>

            <form method="POST" action="{{ route('register') }}" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name">
                        <div class="validate"></div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                        <div class="validate"></div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                        <div class="validate"></div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="Password Confirm" class="form-control" required autocomplete="new-password">
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" name='action' value='add'>
                            {{ __('登録') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
