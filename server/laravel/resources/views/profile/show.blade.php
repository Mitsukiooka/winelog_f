@extends('layouts.app')

@section('content')

<section id="chefs" class="chefs">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Profile</h2>
      <p>Check Your Profile</p>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
          <img src="../../profile_images/{{ $profile->image_file }}" class="img-fluid" alt="">
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
      <div class="col-lg-6 col-md-6">
        <ul>
          <li><i class="icofont-world"></i><p>{{ $profile->favoriteWine }}</p></li>
          <li><i class="icofont-hill"></i><p>{{ $profile->favoriteMaker }}</p></li>
        </ul>
        <button type="button" class="btn-index" onclick="location.href='{{ route('profile.edit', $profile->id) }}'">
            {{ __('更新') }}
        </button>
      </div>
    </div>
  </div>
</section>

@endsection