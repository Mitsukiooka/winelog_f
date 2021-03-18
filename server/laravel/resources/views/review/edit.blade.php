@extends('layouts.app')

@section('content')
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Post Review</h2>
        </div>

        <form action="{{ route('wine.review.update',  [$wine->id, $review->id]) }}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="comment">レビュー</label>
                <textarea class="form-control" name="comment" id="comment" rows="5" >{{ $review->comment }}</textarea>
                <div class="validate"></div>
            </div>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" name='action' value='add'>
                        {{ __('更新') }}
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