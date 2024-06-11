@extends('home')

@section('content')
    <div class="leaderboardContainer">
        @if (session('loggedIn'))
            <div>
            </div>
        @else
            <div>not logged in</div>
        @endif

        @foreach ($wins as $item)
            <div class="leaderboardRowItem">
                <p>{{ $item->name }}:</p>
                <p>{{ $item->wins }} wins</p>

            </div>
        @endforeach
    </div>
@endsection
