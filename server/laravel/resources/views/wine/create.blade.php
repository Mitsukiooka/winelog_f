@extends('layouts.app')

@section('content')
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>New Wine</h2>
        </div>

        <form action="{{ route('wine.store') }}" method="post" enctype='multipart/form-data' role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        @csrf
            <div class="form-row">
                <div class="col-lg-12 col-md-6 form-group">
                    <label for="name">ワインの名前</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ワイン名" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                    <label for="country">生産国</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="ワイン生産国">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                    <label for="area">生産地域</label>
                    <input type="text" class="form-control" name="area" id="area" placeholder="生産地">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                    <label for="kind">ワインの種類</label>
                    <input type="text" class="form-control" name="kind" id="kind" placeholder="種類">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                    <label for="type">ブドウ品種</label>
                    <input type="text" name="type" class="form-control" id="type" placeholder="ブドウ品種">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="color">色味</label>
                    <input type="number" class="form-control" name="color" id="color" min="1" max="5" placeholder="色味">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="taste">味</label>
                    <input type="number" class="form-control" name="taste" id="taste" min="1" max="5" placeholder="味">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="aroma">香り</label>
                    <input type="number" class="form-control" name="aroma" id="aroma" min="1" max="5" placeholder="香り">
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="評価"></textarea>
                <div class="validate"></div>
            </div>
            <label for="maker_id">生産者を選んでください</label>
            <div class="col-lg-4 col-md-6 wine-maker select-box">
                <select id="maker_id" name="maker_id">
                    @foreach($makers as $maker)
                    <option value="{{ $maker->id }}">{{ $maker->name }}</option>
                    @endforeach
                </select>
                <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group-file">
                <label>
                    <input type="file" name="image_file" id="image_file">画像をアップロード
                </label>
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