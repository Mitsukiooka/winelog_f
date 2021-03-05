@extends('layouts.app')

@section('content')
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Wine Index</h2>
            <p>Check Your Wine Collection</p>
        </div>
        <div class="col-lg-4 col-md-6 footer-newsletter">
            <form>
                <input type="text" name="name" value="{{ $name }}">
                <input type="submit" value="検索">
            </form>
        </div>
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($wines as $wine)
                <div class="col-lg-6 menu-item">
                    @if (!empty($wine->image_file))
                        <img src="{{ $wine->image_file }}" class="menu-img" alt="">
                    @else
                        <img src="../../wine_images/default_wine.jpg" class="menu-img" alt="">
                    @endif
                    <div class="menu-content">
                        <a href="{{ route('wine.show', $wine->id) }}">{{ $wine->name }}</a><span>{{ $wine->country }}</span>
                    </div>
                    <div class="menu-ingredients">
                        <p>{{ $wine->kind }}</P>
                    </div>
                </div>
            @endforeach
        </div>
        <div class='pagination'>
        {{ $wines->links('vendor.pagination.simple-default') }}
        </div>
        <button type="button" class="btn-index" onclick="location.href='{{ route('wine.create') }}'">
            {{ __('追加') }}
        </button>
    </div>
</section>
@endsection