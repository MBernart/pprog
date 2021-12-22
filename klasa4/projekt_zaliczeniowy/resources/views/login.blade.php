@extends('layouts.master')

@section('title', 'Zaloguj się!')

@section('content')
{{ $users }}
<form class="sign-form" action="login" method="post">
    @csrf
    <label for="username">login</label> <br>
    <input type="text" name="username"> <br><br>
    <label for="password">password</label> <br>
    <input type="password" name="password"> <br><br>
    <input type="submit" value="Zaloguj">

</form>
@endsection