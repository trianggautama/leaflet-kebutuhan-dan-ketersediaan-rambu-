@if (session('success'))
<script>
Swal.fire({
  position: 'top-end',
  type: 'success',
  title: '{{session('success')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

