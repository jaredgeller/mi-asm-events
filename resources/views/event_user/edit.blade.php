@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $event->name }} - {{ $eventUser->user->fullName() }} - Edit Event Registration</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('events.event_user.update', [$event->id, $eventUser->id]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="registration_date" class="col-md-4 col-form-label text-md-right">Registration Date</label>
                                <div class="col-md-6">
                                    <input id="registration_date" type="text" class="form-control @error('registration_date') is-invalid @enderror" name="registration_date" value="{{ $eventUser->registration_date }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
