@extends('layouts.app')

@section('content')

<x-app>
    <x-slot name='title'>Employees</x-slot>
    <div class="flex justify-center">
        <h1 class="mt-4 text-2xl text-blue-800">Edit Employee Data</h1>
    </div>

    <div class="container mt-4">
        <form action="{{ url('update-data/'.$employees->id) }}" method="POST">
            {{ csrf_field() }}
            @method('put')
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employees->first_name }}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employees->last_name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $employees->email }}">
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ $employees->company }}">
            </div>
            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ $employees->street }}">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $employees->country }}">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" value="{{ $employees->age }}">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male" {{ $employees->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $employees->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ url('employees/') }}" class="btn btn-secondary mr-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>
</x-app>
@endsection
