@extends('layouts.main')

@section('title', 'Diventa Admin - Torbit')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
                <div class="card-header text-center">
                    <h4>{{ __('Diventa Admin') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.promote') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="admin_code" class="form-label">{{ __('Codice Admin') }}</label>
                            <input type="text" class="form-control @error('admin_code') is-invalid @enderror" id="admin_code" name="admin_code" required autofocus>

                            @error('admin_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom-pri btn-lg">
                                {{ __('Diventa Admin') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
