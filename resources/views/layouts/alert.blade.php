<script>
        @if (session('success'))
        swal({
           position: 'top-end',
           type: 'success',
           title: '{{session('success')}}',
           customClass: 'swal-wide',
           showConfirmButton: false,
           timer: 2000
        })
        @endif
s </script>
