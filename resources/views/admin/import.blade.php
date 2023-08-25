

@extends('layouts.app')

@section('content')
    <h1>Import Users</h1>

    <form  action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Select Excel File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name Excel Column Name</label>
            <input type="text" class="form-control" id="full_name" name="columns[full_name]" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Excel Column Name</label>
            <input type="text" class="form-control" id="phone" name="columns[phone]" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Email Excel Column Name</label>
            <input type="text" class="form-control" id="email" name="columns[email]" required>
        </div>
        <!-- Repeat similar blocks for other fields -->
        <button type="submit" class="btn btn-primary">Import</button>
    </form>

@endsection
