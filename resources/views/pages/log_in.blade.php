@extends('home')

@section('content')
    <div class="inlogContainer">
        <form class="register_form" action="" method="post">
            @csrf
            <input class="register_input" type="text" name="username" id="" placeholder="username">
            <input  class="register_input" type="password" name="password" id="" placeholder="password">
            <input class="inlogButton" type="submit" value="log in">
        </form>
        <a href="register"><button class="inlogButton">register</button></a>
    </div>
@endsection
