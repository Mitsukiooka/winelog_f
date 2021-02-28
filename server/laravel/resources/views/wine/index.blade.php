@extends('layouts.app')

@section('content')
<main id="main">
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Wine Index</h2>
                <p>Check Your Wine Collection</p>
            </div>
            <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-starters">Starters</li>
                    <li data-filter=".filter-salads">Salads</li>
                    <li data-filter=".filter-specialty">Specialty</li>
                    </ul>
                </div>
            </div> -->
            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6 menu-item filter-starters">
                    @foreach ($wines as $wine)
                        <img src="asset/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
                        <div class="menu-content">
                        <a href="{{ route('wine.show', $wine->id) }}">{{ $wine->name }}</a><span>{{ $wine->country }}</span>
                        </div>
                        <div class="menu-ingredients">
                        <p>{{ $wine->kind }}</P>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection