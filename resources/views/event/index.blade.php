@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Event Index</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Actions</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{ route('events.edit', $event->id) }}">Edit</a><br>
                                            <a href="{{ route('events.event_user.index', $event->id) }}">Registrations</a>
                                        </th>
                                        <th>{{ $event->id }}</th>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->event_date }}</td>
                                        <td>{{ $event->description }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-primary">Create Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
