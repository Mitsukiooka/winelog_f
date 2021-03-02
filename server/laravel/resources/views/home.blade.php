@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Wine<span>Log</span></h1>
                <h2>In Our Wine Log, find your favorite</h2>

                <div class="btns">
                    <a href="{{ route('wine.index') }}" class="btn-menu animated fadeInUp scrollto">Wines</a>
                    <a href="{{ route('maker.index') }}"  class="btn-book animated fadeInUp scrollto">Makers</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

