@extends('layouts.app')

@section('content')
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Edit Wine</h2>
        </div>

        <form action="{{ route('wine.update', $wine->id) }}" method="post" enctype='multipart/form-data' role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        @csrf
        @method('PUT')
            <div class="form-row">
                <div class="col-lg-12 col-md-6 form-group">
                <label for="name">ワインの名前</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $wine->name }}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                <label for="country">生産国</label>
                    <input type="text" class="form-control" name="country" id="country" value="{{ $wine->country }}">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                <label for="area">生産地域</label>
                    <input type="text" class="form-control" name="area" id="area" value="{{ $wine->area }}">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                <label for="kind">ワインの種類</label>
                    <input type="text" class="form-control" name="kind" id="kind" value="{{ $wine->kind }}">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                <label for="type">ブドウ品種</label>
                    <input type="text" name="type" class="form-control" id="type" value="{{ $wine->type }}">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                <label for="color">色味</label>
                    <input type="number" class="form-control" name="color" id="color" min="1" max="5" value="{{ $wine->color }}">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                <label for="taste">味</label>
                    <input type="number" class="form-control" name="taste" id="taste" min="1" max="5" value="{{ $wine->taste }}">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                <label for="aroma">香り</label>
                    <input type="number" class="form-control" name="aroma" id="aroma" min="1" max="5" value="{{ $wine->aroma }}">
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" name="comment" id="comment" rows="5">{{ $wine->comment }}</textarea>
                <div class="validate"></div>
            </div>
            <label class='file' for="maker_id">生産者を選んでください</label>
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