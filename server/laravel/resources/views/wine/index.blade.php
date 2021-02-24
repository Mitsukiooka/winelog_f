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
            </div>
        </div>
    </div>
</div>
@endsection