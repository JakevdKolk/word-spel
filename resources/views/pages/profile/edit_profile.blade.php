@extends('home')

@section('content')
    <div>
        <h1>Edit Your Profile</h1>
        <h2>Hallo {{ session('loggedIn')->name }}</h2>
        <section>
            <h3>change avatar</h3>
            <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="submitNewAvatar" accept=".jpeg" id="">
                <input name="submit" type="submit" value="submit">
            </form>
        </section>
        <section>
            <h2>view your game results</h2>
            @foreach ($games as $game)
                <div>
                    game number: {{ $game->id }},
                    game word: {{ $game->word->word }},
                    game user: {{ $game->user->name }},
                    winner: @if ($game->winner === 1)
                        yes
                    @else
                        no
                    @endif

                </div>
            @endforeach
        </section>
    </div>
@endsection
