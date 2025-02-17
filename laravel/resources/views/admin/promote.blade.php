@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Diventa Admin') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.promote') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="admin_code" class="form-label">{{ __('Codice Admin') }}</label>
                            <input type="text" class="form-control @error('admin_code') is-invalid @enderror" id="admin_code" name="admin_code" required autofocus>

                            @error('admin_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Diventa Admin') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection