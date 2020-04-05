@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $eventUser->event->name }} - {{ $eventUser->user->fullName() }} - New Event Abstract</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('abstractPost', $eventUser->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Abstract Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="authors" class="col-md-4 col-form-label text-md-right">Abstract Authors</label>
                                <div class="col-md-6">
                                    <input id="authors" type="text" class="form-control @error('authors') is-invalid @enderror" name="authors" value="{{ old('authors') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">Abstract Body</label>
                                <div class="col-md-6">
                                    <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery_preference" class="col-md-4 col-form-label text-md-right">Abstract Delivery Preference</label>
                                <div class="col-md-6">
                                    <select id="delivery_preference" class="form-control" name="delivery_preference">
                                        <option value="-1">Select One</option>
                                        @foreach (\App\EventUserAbstract::DELIVERY_PREFERENCES as $k => $v)
                                            <option value="{{ $k }}" {{ old('delivery_preference') == $k ? "selected" : "" }}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
