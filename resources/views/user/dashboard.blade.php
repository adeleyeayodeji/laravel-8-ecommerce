@extends('layouts.app')
@section('body')
<h1>Welcome {{auth()->user()->name}}</h1>
@endsection
