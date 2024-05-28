@extends('home')
@section('content')

    <form action="" method="post">
        @csrf
        <input type="text" name="username" id="" placeholder="username">
        <input type="text" name="email" id="" placeholder="email">
        <input type="password" name="password" id="" placeholder="password">
        <input type="submit" value="register">
    </form>
@endsection