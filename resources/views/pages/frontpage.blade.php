@extends('home')

@section('content')
    <section class="frontpageContainer">
        <div class="frontpageButtonsContainerMain">
            <h2 class="frontpageTitle" style="color: blue">Word<span style="color:yellow;">-</span><span
                    style="color: green">Spel</span></h2>
            <div class="frontpageButtonsContainer">
                @if (session('loggedIn'))
                    <a href="log-out"><button>Log out</button></a>
                @else
                    <a href="log-in"><button>Log in</button></a>
                @endif

                <button>Play</button>
                <a href="leaderboard"><button>View the leaderboard</button></a>
            </div>

        </div>

    </section>
@endsection
