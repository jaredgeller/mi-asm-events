@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>

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

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_street_1" class="col-md-4 col-form-label text-md-right">Address Street 1</label>
                                <div class="col-md-6">
                                    <input id="address_street_1" type="text" class="form-control @error('address_street_1') is-invalid @enderror" name="address_street_1" value="{{ $user->address_street_1 }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_street_2" class="col-md-4 col-form-label text-md-right">Address Street 2</label>
                                <div class="col-md-6">
                                    <input id="address_street_2" type="text" class="form-control @error('address_street_2') is-invalid @enderror" name="address_street_2" value="{{ $user->address_street_2 }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_city" class="col-md-4 col-form-label text-md-right">Address City</label>
                                <div class="col-md-6">
                                    <input id="address_city" type="text" class="form-control @error('address_city') is-invalid @enderror" name="address_city" value="{{ $user->address_city }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_state" class="col-md-4 col-form-label text-md-right">Address State</label>
                                <div class="col-md-6">
                                    <input id="address_state" type="text" class="form-control @error('address_state') is-invalid @enderror" name="address_state" value="{{ $user->address_state }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_zip" class="col-md-4 col-form-label text-md-right">Address Zip</label>
                                <div class="col-md-6">
                                    <input id="address_zip" type="text" class="form-control @error('address_zip') is-invalid @enderror" name="address_zip" value="{{ $user->address_zip }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="administrator_ind" class="col-md-4 col-form-label text-md-right">Administrator Toggle</label>
                                <div class="col-md-6">
                                    <select id="administrator_ind" class="form-control" name="administrator_ind">
                                        <option value="0" {{ $user->administrator_ind == 0 ? "selected" : "" }}>Off</option>
                                        <option value="1" {{ $user->administrator_ind == 1 ? "selected" : "" }}>On</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mi_member_date" class="col-md-4 col-form-label text-md-right">MI-ASM Member Date</label>
                                <div class="col-md-6">
                                    <input id="mi_member_date" type="text" class="form-control @error('mi_member_date') is-invalid @enderror" name="mi_member_date" value="{{ $user->mi_member_date }}">
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
