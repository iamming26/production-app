<nav class="navbar navbar-expand navbar-light navbar-custom px-4">
    <div class="container-fluid">
        {{-- Toggle button for sidebar (visible on small screens) --}}
        <button class="btn btn-outline-secondary d-md-none me-2" id="sidebarToggle">
            <i class="fas fa-bars"></i> {{-- Font Awesome icon --}}
        </button>

        <span class="ms-auto text-muted">
            {{ strtoupper($user->role) }} - <strong>{{ strtoupper($user->name) }}</strong>
        </span>
    </div>
</nav>
