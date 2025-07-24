<nav id="sidebar" class="col-md-2 d-none d-md-flex bg-dark text-white flex-column px-0 position-fixed position-md-relative vh-100">
    <h5 class="text-center text-white mt-4 mb-4">PT Padma Soode</h5>

    <ul class="nav flex-column px-2">
        @if ($user->role === 'admin')
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard*') ? 'active fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.users*') ? 'active fw-bold' : '' }}" href="{{ route('admin.users') }}">Users</a>
            </li>
        @endif

        @if ($user->role === 'supervisor')
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('supervisor.dashboard*') ? 'active fw-bold' : '' }}" href="{{ route('supervisor.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('supervisor.work-center*') ? 'active fw-bold' : '' }}" href="{{ route('supervisor.work-center') }}">Work Center</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('supervisor.lot*') ? 'active fw-bold' : '' }}" href="{{ route('supervisor.lot') }}">Lot</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('supervisor.report*') ? 'active fw-bold' : '' }}" href="{{ route('supervisor.report') }}">Report</a>
            </li>
        @endif

        @if ($user->role === 'operator')
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('operator.dashboard*') ? 'active fw-bold' : '' }}" href="{{ route('operator.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('operator.production*') ? 'active fw-bold' : '' }}" href="{{ route('operator.production.create') }}">Production</a>
            </li>
        @endif
    </ul>

    {{-- Logout --}}
    <div class="mt-auto px-3 pb-4">
        <a href="#" class="nav-link text-danger" id="logout-button">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</nav>

@section('footer')
<script>
    document.getElementById('logout-button').addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Logout?',
            text: "Are you sure you want to logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Logout',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>

@endsection