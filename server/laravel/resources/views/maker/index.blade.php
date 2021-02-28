@extends('layouts.app')


@section('content')
<main id="main">
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Maker Index</h2>
                <p>Check Your Favorite Maker</p>
            </div>
            <form class="form-inline my-2 my-lg-0 ml-2">
                <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $name }}">
                </div>
                <input type="submit" value="検索" class="btn btn-info">
            </form>
            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($makers as $maker)
                    <div class="col-lg-6 menu-item">
                        <img src="../../maker_images/{{ $maker->image_file }}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="{{ route('maker.show', $maker->id) }}">{{ $maker->name }}</a><span>{{ $maker->country }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('maker.create') }}'">
                {{ __('追加') }}
            </button>
        </div>
    </section>
</main>
@endsection