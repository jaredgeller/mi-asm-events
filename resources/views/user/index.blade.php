@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Index</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Street 1</th>
                                    <th scope="col">Street 2</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Zip</th>
                                    <th scope="col">MI-ASM Member</th>
                                    <th scope="col">Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address_street_1 }}</td>
                                    <td>{{ $user->address_street_2 }}</td>
                                    <td>{{ $user->address_city }}</td>
                                    <td>{{ $user->address_state }}</td>
                                    <td>{{ $user->address_zip }}</td>
                                    <td>{{ $user->administrator_ind ? 'Y' : '' }}</td>
                                    <td>{{ $user->mi_member_date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
