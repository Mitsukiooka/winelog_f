@extends('layouts.app')

@section('content')
<section id="book-a-table" class="book-a-table">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Edit Profile</h2>
    </div>

    <form action="{{ route('profile.update', $profile->id) }}" method="post" enctype='multipart/form-data' role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
    @csrf
    @method('PUT')
        <div class="form-row">
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" name="favoriteWine" class="form-control" id="favoriteWine" value="{{ $profile->favoriteWine }}">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" class="form-control" name="favoriteMaker" id="favoriteMaker" value="{{ $profile->favoriteMaker }}">
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $profile->twitter }}">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $profile->instagram }}">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $profile->facebook }}">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group">
            <input type="file" name="image_file" id="image_file">
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