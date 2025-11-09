<header class="p-2 text-bg-dark">
    <div class="container-fluid">
        <div class="d-flex "><a href="/" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
            </a>
            <ul class="pe-5 nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <div class="pe-4 h3 pt-2 text-light">Upwork</div>
                <li>
                    <a class="dropdown-item pt-3 pe-3 text-light " href="{{ route('auth.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                {{--SECURITY--}}
                <li class="nav-item dropdown pt-2">
                    <a class="nav-link dropdown-toggle text-warning" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Security
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.ipAddress.index') }}">
                                Ip Address
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.userAgents.index') }}">
                                User Agents
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.authAttempts.index') }}">
                                Auth Attempts
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.visitors.index') }}">
                                Visitors
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.verifications.index') }}">
                                Verifications
                            </a>
                        </li>
                    </ul>
                </li>

                {{--USERS--}}
                <li class="nav-item dropdown pt-2">
                    <a class="nav-link dropdown-toggle text-warning" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.admins.index') }}">
                                Admins
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.clients.index') }}">
                                Clients
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.freelancers.index') }}">
                                Freelancers
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.profiles.index') }}">
                                Profiles
                            </a>
                        </li>
                    </ul>
                </li>

                {{--WORKS--}}
                <li class="nav-item dropdown pt-2">
                    <a class="nav-link dropdown-toggle text-warning" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Works
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.works.index') }}">
                                Works
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.proposals.index') }}">
                                Proposals
                            </a>
                        </li>
                    </ul>
                </li>

                {{--CATALOGS--}}
                <li class="nav-item dropdown pt-2">
                    <a class="nav-link dropdown-toggle text-warning" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Catalogs
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.skills.index') }}">
                                Skills
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.locations.index') }}">
                                Locations
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.reviews.index') }}">
                                Reviews
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                @auth
                    {{-- Logout --}}
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                @else
                    {{-- Login --}}
                    <a href="{{ route('admin.login') }}" class="btn btn-outline-light">Login</a>
                @endauth
            </div>

        </div>
    </div>
</header>
