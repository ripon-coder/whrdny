<script>
    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}', 'Success!');
    @endif

    @if(Session::has('warning'))
    toastr.warning('{{ Session::get('warning') }}', 'Opps!');
    @endif

    @if(Session::has('error'))
    toastr.error('{{ Session::get('error') }}', 'Error!');
    @endif
</script>
