@extends('layouts.app')

@section('content')
<main id="main">
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Wine Index</h2>
                <p>Check Your Wine Collection</p>
            </div>
            <form class="form-inline my-2 my-lg-0 ml-2">
                <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $name }}">
                </div>
                <input type="submit" value="検索" class="btn btn-info">
            </form>
            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($wines as $wine)
                    <div class="col-lg-6 menu-item">
                            @if (Storage::exists('/path/to/your/directory'))
                                <img src="../../wine_images/{{ $wine->image_file }}" class="menu-img" alt="">
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
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('wine.create') }}'">
                {{ __('追加') }}
            </button>
        </div>
    </section>
</main>
@endsection