@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($user))
    <h1>Benvenuto, {{ $user->name }}!</h1>
@else
    <h1>Benvenuto, ospite!</h1>
@endif
</div>
@endsection
