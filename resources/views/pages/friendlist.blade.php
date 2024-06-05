    @extends('home')

    @section('content')
        <div class="leaderboardContainer">
            <form action="/searchUser" method="get">
                <input type="search" name="searchUser" placeholder="search a user">
                <input type="submit" value="search">
            </form>
            @foreach ($friends as $friend)
                <p>{{ $friend->friend_user_id }}</p>
            @endforeach
        </div>
    @endsection
