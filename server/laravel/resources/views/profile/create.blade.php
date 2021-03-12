@extends('layouts.app')

@section('content')
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Create Profile</h2>
        </div>

        <form action="{{ route('profile.store') }}" method="post" enctype='multipart/form-data' role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        @csrf
            <div class="form-row">
                <label for="favoriteWine">お気に入りのワイン</label>
                <div class="col-lg-4 col-md-6 wine-maker select-box">
                    <select id="favoriteWine" name="favoriteWine">
                        @foreach($wines as $wine)
                        <option value="{{ $wine->name }}">{{ $wine->name }}</option>
                        @endforeach
                    </select>
                    <div class="validate"></div>
                </div>
                <label for="favoriteMaker">お気に入りの生産者</label>
                <div class="col-lg-4 col-md-6 wine-maker select-box">
                    <select id="favoriteMaker" name="favoriteMaker">
                        @foreach($makers as $maker)
                        <option value="{{ $maker->name }}">{{ $maker->name }}</option>
                        @endforeach
                    </select>
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Twitter">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook">
                    <div class="validate"></div>
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