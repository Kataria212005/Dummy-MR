<header>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo me-3">
            <a class="navbar-brand" href="{{ url('/') }}">MUSKURATE RAHO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}">About us</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('opportunities') ? 'active' : '' }}"
                            href="/opportunities">Opportunities</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('ourteam') ? 'active' : '' }}"
                            href="/team">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('ourteam') ? 'active' : '' }}"
                            href="/contact">Contact</a>
                    </li>
                </ul>
                <a href="/donatenow" class="donate-btn text-decoration-none">Donate</a>
                @php
                use Illuminate\Support\Facades\Auth;
                @endphp

                @auth
                @php
                $role = Auth::user()->role;
                $dashboardRoute = match ($role) {
                'superadmin' => '/superadmin',
                'admin' => '/admin',
                default => '/dashboard',
                };
                @endphp
                <a href="{{ url($dashboardRoute) }}" class="ms-3">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggZD0iTTEyIDJDNi40NzcgMiAyIDYuNDc3IDIgMTJzNC40NzcgMTAgMTAgMTBzMTAtNC40NzcgMTAtMTBTMTcuNTIzIDIgMTIgMiIvPjxwYXRoIGQ9Ik00LjI3MSAxOC4zNDZTNi41IDE1LjUgMTIgMTUuNXM3LjczIDIuODQ2IDcuNzMgMi44NDZNMTIgMTJhMyAzIDAgMSAwIDAtNmEzIDMgMCAwIDAgMCA2Ii8+PC9nPjwvc3ZnPg=="
                        alt="Dashboard" class="rounded-circle">
                </a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline ms-3">
                    @csrf
                    <a href="/logout" class="donate-btn text-decoration-none p-2">Logout</a>
                </form>
                @else
                <a href="{{ route('login') }}" class="ms-3">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggZD0iTTEyIDJDNi40NzcgMiAyIDYuNDc3IDIgMTJzNC40NzcgMTAgMTAgMTBzMTAtNC40NzcgMTAtMTBTMTcuNTIzIDIgMTIgMiIvPjxwYXRoIGQ9Ik00LjI3MSAxOC4zNDZTNi41IDE1LjUgMTIgMTUuNXM3LjczIDIuODQ2IDcuNzMgMi44NDZNMTIgMTJhMyAzIDAgMSAwIDAtNmEzIDMgMCAwIDAgMCA2Ii8+PC9nPjwvc3ZnPg=="
                        alt="Login" class="rounded-circle">
                </a>
                @endauth
            </div>
        </div>
    </nav>
</header>