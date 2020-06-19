@extends('layouts.app')

@section('content')
<h3>
    profile page for {{$user->name}}
</h3>
@include('_timeline', ['tweets' => $user->tweets])
@endsection