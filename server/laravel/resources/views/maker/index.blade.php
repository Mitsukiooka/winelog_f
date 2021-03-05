@extends('layouts.app')


@section('content')
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Maker Index</h2>
            <p>Check Your Favorite Maker</p>
        </div>
        <div class="col-lg-4 col-md-6 footer-newsletter">
            <form>
                <input type="text" name="name" value="{{ $name }}">
                <input type="submit" value="検索">
            </form>
        </div>
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($makers as $maker)
                <div class="col-lg-6 menu-item">
                    @if (!empty($maker->image_file))
                        <img src="{{ $maker->image_file }}" class="menu-img" alt="">
                    @else
                        <img src="../../maker_images/default_maker.jpg" class="menu-img" alt="">
                    @endif
                    <div class="menu-content">
                        <a href="{{ route('maker.show', $maker->id) }}">{{ $maker->name }}</a><span>{{ $maker->country }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $makers->links('vendor.pagination.simple-default') }}
        </div>
        <button type="button" class="btn-index" onclick="location.href='{{ route('maker.create') }}'">
            {{ __('追加') }}
        </button>
    </div>
</section>
@endsection