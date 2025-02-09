@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-left">
    @if(isset($user))
    <h1>Benvenuto, {{ $user->name }}!</h1>
    @else
        <h1>Benvenuto, ospite!</h1>
    @endif
    <div>
</div>
@endsection
