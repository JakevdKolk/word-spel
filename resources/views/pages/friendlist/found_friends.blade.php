@extends('home')

@section('content')
    <div class="leaderboardContainer">
        @if ($users)
            @foreach ($users as $user)
                <div class="foundUserRow">
                    <a href="/profile-view?id={{$user->id}}">
                        <p>{{ $user->name }}</p>
                    </a>
                    <form action="{{ route('friend.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="add_friend" value="{{ $user->id }}">
                        <button type="submit" class="inlogButton">Add Friend</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>No user found</p>
        @endif
    </div>
@endsection
