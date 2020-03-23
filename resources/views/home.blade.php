@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                                <th scope="col">Abstracts</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <th scope="row">
                                        @if (Auth::user()->isRegisteredForEvent($event->id))
                                            <a href="{{ route('abstractGet', Auth::user()->eventUser()->id) }}">Submit Abstract</a>
                                        @else
                                            <a href="{{ route('registerGet', $event->id) }}">Register</a>
                                        @endif
                                    </th>
                                    <th>{{ $event->id }}</th>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->event_date }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>
                                        @foreach (Auth::user()->abstracts() as $abstract)
                                            <a href="{{ route('abstractView', $abstract->id) }}">Abstract {{ $abstract->id }}</a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('membershipGet') }}" class="btn btn-primary">Submit MI-ASM Member Registration</a> {{ Auth::user()->mi_member_date }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
