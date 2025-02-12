@extends('layouts.app')

@section('content')
<div class="container mt-navbar">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.promote') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="admin_code" class="form-label">Admin Code</label>
            <input type="text" class="form-control" id="admin_code" name="admin_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection