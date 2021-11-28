<div class="btn-group btn-group-md">
    <a href="{{-- {{ route('laporan.edit') }} --}}" class="btn btn-warning btn-sm"><i class="fa fa-1x fa-edit text-white"></a> 
    <a href="{{ route('laporan.show',$laporan) }}" class="btn btn-secondary btn-sm"><i class="fa fa-1x fa-info-circle text-white"></a> 
    <button href="{{-- {{ route('laporan.destroy') }} --}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-1x fa-trash text-white"></button>
</div>

<script src="{{asset('/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<script>
    $('button#delete').on('click',function(e){
        e.preventDefault();
        var href = $(this).attr('href');
            Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Perhatian data yang sudah di hapus tidak bisa di kembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText : 'Batal!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                'Terhapus!',
                'Data sudah terhapus.',
                'success'
                )
            }
            })
        });
</script>