<header>
    <nav>
        <div style="position: fixed; top: 8px; left: 21px; font-family: shlop; font-size: 3rem; color: #ffb300;">30keys</div>

        @if (session('status'))
            <div style="position: fixed; top: 0; width: 100%;">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('keyboards.index') }}">Keyboard Layouts</a></li>
            <li><a href="{{ route('keyboards.create') }}">Add Keyboard</a></li>
            <!-- Authentication links -->

            @auth
                <li><a href="{{ route('logout') }}">User {{ auth()->user()->user_alias }}</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('signup') }}">Signup</a></li>
            @endauth
        </ul>
    </nav>
</header>