<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <button class="navbar-toggler d-lg-none me-3" type="button" id="toggleSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fw-bold" href="">
            <i class="fas fa-industry me-2"></i>PT Padma Soode
        </a>

        <div class="d-flex align-items-center ms-auto">
            <div class="dropdown user-info d-flex align-items-center">
                <div class="me-2 text-end d-none d-md-block">
                    <div class="fw-semibold">{{ $user->name }}</div>
                    <div class="small text-white-50">{{ strtoupper($user->role) }}</div>
                </div>

                <div class="online-indicator"></div>

                <button class="btn btn-sm btn-outline-light dropdown-toggle ms-2" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger w-100 text-start">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <button class="btn btn-sm btn-light ms-3" title="Toggle Theme" id="toggle_theme">
                <i class="fas fa-adjust"></i>
            </button>
        </div>
    </div>
</nav>
