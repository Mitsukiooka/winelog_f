@extends('layouts.app')

@section('content')
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>New Maker</h2>
        </div>

        <form action="{{ route('maker.store') }}" method="post" enctype='multipart/form-data' role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        @csrf
            <div class="form-row">
                <div class="col-lg-6 col-md-6 form-group">
                <label for="name">生産者名</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="生産者名" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                <label for="country">出身国</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" placeholder="出身国">
                    <div class="validate"></div>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-6 form-group-file">
                    <label>
                        <input type="file" name="image_file" id="image_file">画像をアップロード
                    </label>
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
                    <button type="submit" class="btn btn-primary-login" name='action' value='add'>
                        {{ __('追加') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection