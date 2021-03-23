@extends('layouts.app')

@section('content')

<section id="chefs" class="chefs">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Your Review</h2>
      <p>{{ $wine->name }}へのレビュー</p>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class='wine-comment'>
          <p>{{ $wine->name }}</p>
          <p>{{ $review->comment }}</p>
        </div>
      </div>
      @if ($review->user->id == Auth::user()->id)
        <button type="button" class="btn-index" onclick="location.href='{{ route('wine.review.edit', [$review->wine->id, $review->id]) }}'">
          {{ __('レビューを編集') }}
        </button>
      @endif
    </div>
  </div>
</section>
@endsection