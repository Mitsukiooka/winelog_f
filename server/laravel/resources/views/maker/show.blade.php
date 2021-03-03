@extends('layouts.app')

@section('content')
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="about-img">
                    @if (!empty($maker->image_file))
                        <img src="../../maker_images/{{ $maker->image_file }}" alt="">
                    @else
                        <img src="../../maker_images/default_maker.jpg" class="menu-img" alt="">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3>{{ $maker->name }}</h3>
                <ul>
                    <li><i class="icofont-world"></i>{{ $maker->country }}</li>
                </ul>
                <ul>
                @if (isset($maker->wines))
                    <div>
                        <i class="icofont-glass"></i><span>生産ワイン一覧</span>
                        @foreach ($maker->wines as $wine)
                            <li><a href="{{ route('wine.show', $wine->id) }}">{{ $wine->name }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 offset-md-4">
        <button type="button" class="btn-index" onclick="location.href='{{ route('maker.edit', $maker->id) }}'">
            {{ __('変更') }}
        </button>
        <form style="display:inline" action="{{ route('maker.destroy', $maker->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-index">
                {{ __('削除') }}
            </button>
        </form>
        <button type="button" class="btn-index" onclick="history.back()">
            {{ __('戻る') }}
        </button>
    </div>
</section><!-- End About Section -->
@endsection