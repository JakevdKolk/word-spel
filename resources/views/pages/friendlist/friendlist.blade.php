    @extends('home')

    @section('content')
        <div class="leaderboardContainer">
            <form action="/searchUser" method="get">
                <input type="search" name="searchUser" placeholder="search a user">
                <input type="submit" value="search">
            </form>
            @foreach ($friends as $friend)
                @if ($friend->user_id == session('loggedIn')->id)
                    <a href="/profile-view?id={{$friend->friendUser->id}}">{{ $friend->friendUser->name }}</a>
                @else
                    <a href="/profile-view?id={{$friend->user->id}}">{{ $friend->user->name }}</a>
                @endif
                @endforeach
        </div>
    @endsection
