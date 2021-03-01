@extends('layouts.app')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="../../wine_images/{{ $wine->image_file }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>{{ $wine->name }}</h3>
                    <ul>
                        <li><i class="icofont-check-circled"></i>{{ $wine->country }}</li>
                        <li><i class="icofont-check-circled"></i>{{ $wine->type }}</li>
                        <li><i class="icofont-check-circled"></i>{{ $wine->kind }}</li>
                        <li><i class="icofont-check-circled"></i>{{ $wine->area }}</li>
                    </ul>
                    @if (isset($wine->maker))
                        <a href="{{ route('maker.show', $wine->maker->id) }}">{{ $wine->maker->name }}</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 offset-md-4">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('wine.edit', $wine->id) }}'">
                {{ __('変更') }}
            </button>
            <form style="display:inline" action="{{ route('wine.destroy', $wine->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    {{ __('削除') }}
                </button>
            </form>
            <button type="button" class="btn btn-primary" onclick="history.back()">
                {{ __('戻る') }}
            </button>
        </div>
    </section><!-- End About Section -->
</main>
@endsection