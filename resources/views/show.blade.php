


@extends('layouts.app')

@section('content')

<x-app>
    <x-slot name='title'>Employees</x-slot>
    <div class="flex justify-center">
        <h1 class="mt-4 text-2xl text-blue-800">User Details</h1>
    </div>

    @if(session('success'))
    <div class="text-center font-weight-bold">
        <div class="alert alert-success">
        {{ session('success') }}
    </div>
    </div>

@endif

    <div class="container">
        <h1 class="my-4"></h1>

        <div class="table-responsive">
            <table class="table table-light">
                <table class="table">
                    <tr>
                        <th>First Name :</th>
                        <td>{{ $user->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name :</th>
                        <td>{{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Company: </th>
                        <td>{{ $user->company }}</td>
                    </tr>
                    <tr>
                        <th>Street :</th>
                        <td>{{ $user->street }}</td>
                    </tr>
                    <tr>
                        <th>Age :</th>
                        <td>{{ $user->age }}</td>
                    </tr>
                    <tr>
                        <th>Gender :</th>
                        <td>{{ $user->gender }}</td>
                    </tr>
                </table>
                <a href="{{ url('/employees') }}" class="btn btn-primary">Back to Users</a>
                <a href="{{ url('edit/' . $user->id) }}" class="btn btn-warning">Edit</a>

            </div>
        </div>
    </div>
</x-app>
@endsection
