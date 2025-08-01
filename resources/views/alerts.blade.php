@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

@if(session('errorQTY'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('errorQTY') }}',
        confirmButtonColor: '#3085d6',
    });
    document.getElementById('qty').classList.add('is-invalid');
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Validasi Gagal',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonColor: '#d33',
    });
</script>
@endif

<script>
    function confirmDelete(event, formId) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Data will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
