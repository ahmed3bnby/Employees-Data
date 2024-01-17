@extends('layouts.app')

@section('content')

<x-app>
    <x-slot name='title'>Employees</x-slot>
    <div class="flex justify-center">
        <h1 class="mt-4 text-2xl" style="background-color: #337ab7; color: #fff;">All Employee Data</h1><br><br><br>
    </div>

   
        <div class="card-body d-flex justify-content-end">
            <form action="{{ route('employees') }}" method="GET">
                <div class="input-group">
                    <input value="{{ request('search', '') }}" name="search" placeholder="..." class="form-control" type="text">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('edited'))
            <div class="alert alert-primary">
                {{ session('edited') }}
            </div>
        @endif

        @if(session('deleted'))
            <div class="alert alert-danger">
                {{ session('deleted') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">First Name</th>
                    <th scope="col" class="text-center">Last Name</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Company</th>
                    <th scope="col" class="text-center">Street</th>
                    <th scope="col" class="text-center">Country</th>
                    <th scope="col" class="text-center">Age</th>
                    <th scope="col" class="text-center">Gender</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr data-toggle="tooltip" title="Click Here To view" onclick="window.location='{{ url('user/' .$employee->id) }}';" style="cursor: pointer;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->company }}</td>
                        <td>{{ $employee->street }}</td>
                        <td>{{ $employee->country }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>
                            <a href="{{ url('edit/' .$employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('delete/' .$employee->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No Data Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $employees->withQueryString()->links() }}
</x-app>
@endsection
