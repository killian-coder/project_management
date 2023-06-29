@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create Projects</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('create Project') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeProject') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Project Name ') }}</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text"
                                    class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                    value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>

                                @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="start_date"
                                class="col-md-4 col-form-label text-md-end">{{ __('Start Date ') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date"
                                    class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('End Date ') }}</label>

                            <div class="col-md-6">
                                <input id="end_date" type="date"
                                    class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                    value="{{ old('end_date') }}" required autocomplete="project_name" autofocus>

                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __(' Description ') }}</label>

                            <div class="col-md-6">

                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" value="{{ old('description') }}" required autocomplete="project_name" autofocus>
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
