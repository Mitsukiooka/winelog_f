@extends('layouts.app')

@section('content')

<section id="chefs" class="chefs">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Profile</h2>
      <p>マイページ</p>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
          @if (!empty($profile->image_file))
            <img src="{{ $profile->image_file }}" class="img-fluid" alt="">
          @else
            <img src="../img/default_profile.png" class="img-fluid" alt="">
          @endif
          <div class="member-info">
            <div class="member-info-content">
              <h4>{{ Auth::user()->name }}</h4>
            </div>
            <div class="social">
              <a href="{{ $profile->twitter }}"><i class="icofont-twitter"></i></a>
              <a href="{{ $profile->facebook }}"><i class="icofont-facebook"></i></a>
              <a href="{{ $profile->instagram }}"><i class="icofont-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <ul>
          <i class="icofont-glass"></i><p>お気にりのワイン：{{ $profile->favoriteWine }}</p>
          <i class="icofont-waiter"></i><p>お気にりの生産者：{{ $profile->favoriteMaker }}</p>
        </ul>
        <button type="button" class="btn-index" onclick="location.href='{{ route('profile.edit', $profile->id) }}'">
            {{ __('プロフィールを変更') }}
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        @if (!empty($reviews))
          <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Your Review</h2>
                    <p>あなたのレビュー一覧</p>
                </div>
                <div class="row">
                  @foreach ($reviews as $review)  
                      <div class="col-lg-4">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                          <span>{{ $review->wine->name }}</span>
                          <p>{{ $review->displayReview($review->comment) }}...</p>
                          </div>
                          <i class="bx bx-chevron-right"></i>
                          <a href="{{ route('wine.review.show', [$review->wine->id, $review->id]) }}">{{ __('レビューの続きを見る') }}</a>
                          <i class="bx bx-chevron-right"></i>
                          <a href="{{ route('wine.review.edit', [$review->wine->id, $review->id]) }}">{{ __('レビューを編集') }}</a>
                      </div>
                  @endforeach
                </div>
            </div>
          </section>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection