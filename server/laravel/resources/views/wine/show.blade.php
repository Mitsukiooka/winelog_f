@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wine</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $wine->id }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $wine->name }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $wine->country }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kind" class="col-md-4 col-form-label text-md-right">{{ __('Kind') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $wine->kind }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Types') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $wine->type }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $wine->area }}
                        </div>
                    </div>
                    @if (isset($wine->maker))
                    <div class="form-group row">
                        <label for="maker_id" class="col-md-4 col-form-label text-md-right">{{ __('Maker') }}</label>
                            <a href="/maker/{{ $wine->maker->id }}">{{ $wine->maker->name }}</a>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="image_file" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <img src="../../wine_images/{{ $wine->image_file }}" width="200px" height="200px">
                    </div>
                    <div class="form-group row mb-0">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection