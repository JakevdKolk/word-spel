@extends('home')

@section('content')
    <div class="leaderboardContainer">

        @if ($users)
            @foreach ($users as $user)
                <div class="foundUserRow">
                    <a href="/profile-view"><p>{{ $user->name }}</p></a>
                    <a href=""><button class="inlogButton">add friend</button></a>
                </div>
            @endforeach
        @else{
            <p>no user found</p>
            }
        @endif
    </div>
@endsection
