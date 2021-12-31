@extends("layouts.master")
@section("content")
User: 
{{ Illuminate\Support\Facades\Auth::user()->username }}
@endsection