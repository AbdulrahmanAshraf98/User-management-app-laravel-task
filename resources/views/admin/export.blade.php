@extends('layouts.app')

@section('content')
    <h1>Export Users</h1>

    <form action="{{ route('admin.export-excel') }}" method="GET">
        <div class="mb-3">
            <label for="columns" class="form-label">Select Columns to Export</label>
            <div>
                <input type="checkbox" id="full_name" name="columns[]" value="name">
                <label for="full_name">Full Name</label>
            </div>
            <div>
                <input type="checkbox" id="phone" name="columns[]" value="phone">
                <label for="phone">Phone Number</label>
            </div>
            <div>
                <input type="checkbox" id="email" name="columns[]" value="email">
                <label for="email">Email</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Export</button>
    </form>

@endsection
