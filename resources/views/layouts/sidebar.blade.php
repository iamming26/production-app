<div class="sidebar d-none d-lg-block">

    @if ($user->role === 'admin')
    <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users*') ? 'active' : '' }}"><i class="fas fa-users me-2"></i>Users</a>
    @endif

    @if ($user->role === 'supervisor')
    <a href="{{ route('supervisor.dashboard') }}" class="{{ Route::is('supervisor.dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ route('supervisor.work-centers') }}" class="{{ Route::is('supervisor.workcenters*') ? 'active' : '' }}"><i class="fas fa-cogs me-2"></i>Work Centers</a>
    <a href="{{ route('supervisor.lots') }}" class="{{ Route::is('supervisor.lots*') ? 'active' : '' }}"><i class="fas fa-boxes me-2"></i>Lots</a>
    <a href="{{ route('supervisor.reports') }}" class="{{ Route::is('supervisor.report*') ? 'active' : '' }}"><i class="fas fa-chart-line me-2"></i>Report</a>
    @endif

    @if ($user->role === 'operator')
    <a href="{{ route('operator.dashboard') }}" class="{{ Route::is('operator.dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ route('operator.productions') }}" class="{{ Route::is('operator.productions*') ? 'active' : '' }}"><i class="fas fa-industry me-2"></i>Productions</a>
    @endif

</div>