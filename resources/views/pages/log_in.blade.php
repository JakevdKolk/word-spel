@extends('home')

@section('content')
<form action="" method="post">
    @csrf
    <input type="text" name="username" id="" placeholder="username">
    <input type="password" name="password" id="" placeholder="password">
    <input type="submit" value="log in">
</form>
<a href="register"><button>register</button></a>

@endsection