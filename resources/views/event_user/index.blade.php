@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $event->name }} - Event Registration Index {{$event->id}} {{dump($event->registrations())}}
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
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($event->registrations() as $registration)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{ route('event_user.edit', $event->id, $registration->id) }}">Edit</a>
                                        </th>
                                        <th>{{ $registration->id }}</th>
                                        <td>{{ $registration->user->fullName() }}</td>
                                        <td>{{ $registration->registration_date }}</td>
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
