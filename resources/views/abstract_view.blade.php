@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $eventUser->event->name }} - {{ $eventUser->user->fullName() }} - View Abstract - {{ $eventUserAbstract->title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Abstract Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $eventUserAbstract->title }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="authors" class="col-md-4 col-form-label text-md-right">Abstract Authors</label>
                            <div class="col-md-6">
                                <input id="authors" type="text" class="form-control" name="authors" value="{{ $eventUserAbstract->authors }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Abstract Body</label>
                            <div class="col-md-6">
                                <input id="body" type="text" class="form-control" name="body" value="{{ $eventUserAbstract->body }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="delivery_preference" class="col-md-4 col-form-label text-md-right">Abstract Delivery Preference</label>
                            <div class="col-md-6">
                                <select id="delivery_preference" class="form-control" name="delivery_preference" disabled="disabled">
                                    @foreach (\App\EventUserAbstract::DELIVERY_PREFERENCES as $k => $v)
                                        <option value="0" {{ $eventUserAbstract->delivery_preference == $k ? "selected" : "" }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
