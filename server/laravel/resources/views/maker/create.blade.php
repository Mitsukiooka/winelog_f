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
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="生産者名" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" class="form-control" name="country" id="country" placeholder="出身国">
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4 col-md-6 form-group">
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
                    <button type="submit" class="btn btn-primary" name='action' value='add'>
                        {{ __('追加') }}
                    </button>
                    <button type="submit" class="btn btn-primary" name='action' value='back'>
                        {{ __('戻る') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection