@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $event->name }} - Event Registration Index
                    </div>

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
                                        <th scope="col">Abstracts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($event->eventUsers() as $eventUser)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{ route('events.event_user.edit', [$event->id, $eventUser->id]) }}">Edit</a>
                                        </th>
                                        <th>{{ $eventUser->id }}</th>
                                        <td>{{ $eventUser->user->fullName() }}</td>
                                        <td>{{ $eventUser->registration_date }}</td>
                                        <td>
                                            @foreach ($eventUser->abstracts() as $abstract)
                                                <a href="{{ route('events.event_user.abstract.edit', [$event->id, $eventUser->id, $abstract->id]) }}">Abstract {{ $abstract->id }}</a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
