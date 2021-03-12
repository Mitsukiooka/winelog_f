@extends('layouts.app')

@section('content')
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="about-img">
                    @if (!empty($wine->image_file))
                        <img src="{{ $wine->image_file }}" alt="">
                    @else
                        <img src="../img/default_wine.jpg" class="menu-img" alt="">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3>{{ $wine->name }}</h3>
                <ul>
                    <li><i class="icofont-world"></i><span>生産国：{{ $wine->country }}</span></li>
                    <li><i class="icofont-hill"></i><span>生産地：{{ $wine->area }}</span></li>
                    <li><i class="icofont-grapes"></i><span>ブドウの種類：{{ $wine->type }}</span></li>
                    <li><i class="icofont-glass"></i><span>ワインの種類：{{ $wine->kind }}ワイン</span></li>
                    @if (isset($wine->maker))
                        <li>
                            <i class="icofont-waiter"></i><span>生産者：</span>
                            <a href="{{ route('maker.show', $wine->maker->id) }}">{{ $wine->maker->name }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class='wine-comment'>
            <h4>コメント</h4>
            <i class="icofont-comment"></i>
            <p>{{ $wine->comment }}</p>
        </div>
    </div>
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Your Score</h2>
                <p>ワイン評価</p>
            </div>
            <div class="row">
                @if (!empty($wine->color))
                    <div class="col-lg-4">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <span>色味</span>
                        <h4>{{ $wine->color }} / 5</h4>
                        </div>
                    </div>
                @endif

                @if (!empty($wine->taste))
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                        <span>味</span>
                        <h4>{{ $wine->taste }} / 5</h4>
                        </div>
                    </div>
                @endif

                @if (!empty($wine->aroma))
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                        <span>香り</span>
                        <h4>{{ $wine->aroma }} / 5</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <div class="col-md-6 offset-md-4">
        <button type="button" class="btn-index" onclick="location.href='{{ route('wine.edit', $wine->id) }}'">
            {{ __('変更') }}
        </button>
        <form style="display:inline" action="{{ route('wine.destroy', $wine->id) }}" method="post">
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