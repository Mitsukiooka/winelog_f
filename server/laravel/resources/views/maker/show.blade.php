@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maker</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $maker->id }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $maker->name }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $maker->country }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image_file" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <img src="../../maker_images/{{ $maker->image_file }}" width="200px" height="200px">
                    </div>
                    @if (isset($maker->wines))
                    @foreach ($maker->wines as $wine)
                    <div class="form-group row">
                        <label for="wine" class="col-md-4 col-form-label text-md-right">{{ __('Wines') }}</label>
                        <div class="col-md-6 input-group-text">
                            <a href="/wine/{{ $wine->id }}">{{ $wine->name }}</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('maker.edit', $maker->id) }}'">
                                {{ __('変更') }}
                            </button>
                            <form style="display:inline" action="{{ route('maker.destroy', $maker->id) }}" method="post">
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