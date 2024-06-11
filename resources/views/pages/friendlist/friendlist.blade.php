    @extends('home')

    @section('content')
        <div class="leaderboardContainer">
            <form action="/searchUser" method="get">
                <input type="search" name="searchUser" placeholder="search a user">
                <input type="submit" value="search">
            </form>
            @foreach ($friends as $friend)
                @if ($friend->user_id == session('loggedIn')->id)
                    <p>{{ $friend->friendUser->name }}</p>
                @else
                    <p>{{ $friend->user->name }}</p>
                @endif
                @endforeach
        </div>
    @endsection
