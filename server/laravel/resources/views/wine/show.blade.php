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
                    <li><i class="icofont-hill"></i><span>生産地域：{{ $wine->area }}</span></li>
                    <li><i class="icofont-grapes"></i><span>ブドウの種類：{{ $wine->type }}</span></li>
                    <li><i class="icofont-glass"></i><span>ワインの種類：{{ $wine->kind }}ワイン</span></li>
                    @if (isset($wine->maker))
                        <li>
                            <i class="icofont-waiter"></i><span>生産者：</span>
                            <a href="{{ route('maker.show', $wine->maker->id) }}">{{ $wine->maker->name }}</a>
                        </li>
                    @endif
                </ul>
                <ul>
                    <li><i class="icofont-world"></i><span>色味：{{ $wine->color }}</span></li>
                    <li><i class="icofont-hill"></i><span>香り：{{ $wine->aroma }}</span></li>
                    <li><i class="icofont-grapes"></i><span>味：{{ $wine->taste }}</span></li>
                </ul>
                <div class='wine-comment'>
                    <h4>登録者によるコメント</h4>
                    <p>登録者：{{ $wine->user->name }}</p>
                    <p>{{ $wine->comment }}</p>
                </div>
                <div>
                    @if (Auth::user()->is_favorite($wine->id))
                        {!! Form::open(['route' => ['favorites.unfavorite', $wine->id], 'method' => 'delete']) !!}
                            {!! Form::submit('イイね！', ['class' => "btn-favorite-undo "]) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['favorites.favorite', $wine->id]]) !!}
                            {!! Form::submit('イイね！', ['class' => "btn-favorite "]) !!}
                        {!! Form::close() !!}
                    @endif
                    <div class="text-right mb-2 favorite-count">
                        <p>イイね！ {{ $count_favorite_users }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Wine Review</h2>
                <p>ワインレビュー</p>
            </div>
            <div class="row">
                @if (!empty($wine->reviews))
                    @foreach ($wine->reviews as $review)  
                        <div class="col-lg-4">
                            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                            <span>{{ $review->user->name }}</span>
                            <p>{{ $review->comment }}</p>
                            @if ($review->user->id == Auth::user()->id)
                                <a href="{{ route('wine.review.edit', [$wine->id, $review->id]) }}">編集する</a>
                            @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <div class="col-md-6 offset-md-4">
        @if ($wine->user->id == Auth::user()->id)
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
        @else
            @if (empty($wine->getReviewByUserId($wine, Auth::user()->id)->toArray()))
                <button type="button" class="btn-index" onclick="location.href='{{ route('wine.review.create', $wine->id) }}'">
                    {{ __('レビューを投稿する') }}
                </button>
            @endif
        @endif
        <button type="button" class="btn-index" onclick="history.back()">
            {{ __('戻る') }}
        </button>
    </div>
</section>
@endsection