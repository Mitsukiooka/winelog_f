@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wine Index</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--成功時のメッセージ--}}
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    {{-- エラーメッセージ --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    <form class="form-inline my-2 my-lg-0 ml-2">
                        <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ $name }}">
                        </div>
                        <input type="submit" value="検索" class="btn btn-info">
                    </form>
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('name')}}</th>
                                    <th>{{__('country')}}</th>
                                    <th>{{__('kind')}}</th>
                                    <th>{{__('type')}}</th>
                                    <th>{{__('area')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($wines))  
                                    @foreach ($wines as $wine)
                                        <tr>
                                            <td><a href="/wine/{{ $wine->id }}">{{ $wine->name }}</a></td>
                                            <td>{{ $wine->country }}</td>
                                            <td>{{ $wine->kind}}</td>
                                            <td>{{ $wine->type}}</td>
                                            <td>{{ $wine->area}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('wine.create') }}'">
                        {{ __('追加') }}
                    </button>
                </div>
                <section id="menu" class="menu section-bg">
                    <div class="container" data-aos="fade-up">
                        <div class="section-title">
                        <h2>Wine Index</h2>
                        <p>Check Your Wine Collection</p>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-starters">Starters</li>
                            <li data-filter=".filter-salads">Salads</li>
                            <li data-filter=".filter-specialty">Specialty</li>
                            </ul>
                        </div>
                        </div>
                        @foreach ($wines as $wine)
                            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                                <div class="col-lg-6 menu-item filter-starters">
                                    <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
                                    <div class="menu-content">
                                    <a href="#">{{ $wine->name }}</a><span>{{ $wine->country }}</span>
                                    </div>
                                    <div class="menu-ingredients">
                                    Lorem, deren, trataro, filede, nerada
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section><!-- End Menu Section -->
            </div>
        </div>
    </div>
</div>
@endsection