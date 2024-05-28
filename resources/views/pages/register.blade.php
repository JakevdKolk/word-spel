@extends('home')
@section('content')

    <form class="inlogContainer" action="" method="post">
        @csrf
        <input class="register_input" type="text" name="username" id="" placeholder="username">
        <input class="register_input" type="text" name="email" id="" placeholder="email">
        <input class="register_input" type="password" name="password" id="" placeholder="password">
        <input class="inlogButton" type="submit" value="register">
    </form>
@endsection