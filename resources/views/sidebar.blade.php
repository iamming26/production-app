<nav class="col-md-2 d-none d-md-flex sidebar flex-column px-0">
    <h5 class="text-center text-white mb-4">PT Padma Soode</h5>
    <ul class="nav flex-column">

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
        @endif

        @if (Auth::user()->role === 'supervisor')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supervisor.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supervisor.work-center') }}">Work Center</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supervisor.lot') }}">Lot</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supervisor.report') }}">Report</a>
            </li>
        @endif

        @if (Auth::user()->role === 'operator')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('operator.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('operator.production.create') }}">Production</a>
            </li>
        @endif
    </ul>

    <!-- Logout at bottom -->
    <div class="logout px-3">
    <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
    </div>
</nav>