<header class="p-3 text-bg-dark">
    <div class="container-lg">
        <div class="d-flex "><a href="/" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
            </a>
            <ul class="pe-5 nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <div class="pe-4 h3 pt-2 text-light">Upwork</div>
                <li>
                    <a class="dropdown-item pt-3 pe-3 text-light " href="{{ route('v1.auth.dashboard') }}">
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
                            <a class="dropdown-item" href="{{ route('v1.auth.ipAddress.index') }}">
                                Ip Address
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.userAgents.index') }}">
                                User Agents
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.authAttempts.index') }}">
                                Auth Attempts
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.visitors.index') }}">
                                Visitors
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.verifications.index') }}">
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
                            <a class="dropdown-item" href="{{ route('v1.auth.admins.index') }}">
                                Admins
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.clients.index') }}">
                                Clients
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.freelancers.index') }}">
                                Freelancers
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.profiles.index') }}">
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
                            <a class="dropdown-item" href="{{ route('v1.auth.works.index') }}">
                                Works
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.proposals.index') }}">
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
                            <a class="dropdown-item" href="{{ route('v1.auth.skills.index') }}">
                                Skills
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.locations.index') }}">
                                Locations
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('v1.auth.reviews.index') }}">
                                Reviews
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>



            </ul>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" ></form>
            <div class="text-end">
                <a href=" {{ route('v1.admin.login') }}" type="submit" class="btn btn-outline-light me-2">Login</a>
                <button type="button" class="btn btn-warning">Sign-up</button>
            </div>
        </div>
    </div>
</header>
