

@section('styles')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style>
    .bg-users {
        background-color: var(--bg-secondary);
    }
</style>
@endsection

@section('scripts')
    @include('datatable')
    @include('alerts')
@endsection