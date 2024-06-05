@extends('home')

@section('content')

@foreach($friends as $friend){
    <p>{{$friend->friend_user_id}}</p>
}
@endforeach
@endsection