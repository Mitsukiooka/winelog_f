@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wine Edit</div>
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
                    <form action="{{ route('wine.update', $wine->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" class="form-control" type="text" name="name" value="{{ $wine->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ $wine->country }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kind" class="col-md-4 col-form-label text-md-right">{{ __('Kind') }}</label>
                            <div class="col-md-6">
                                <input id="kind" type="text" class="form-control" name="kind" value="{{ $wine->kind }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type" value="{{ $wine->type }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_file" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <img src="../../wine_images/{{ $wine->image_file }}" width="200px" height="200px">
                                <input id="image_file" type="file" name="image_file">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name='action' value='edit'>
                                    {{ __('変更') }}
                                </button>
                                <button type="submit" class="btn btn-primary" name='action' value='back'>
                                    {{ __('戻る') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection