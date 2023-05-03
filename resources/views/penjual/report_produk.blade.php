@extends('layouts.app')


@section('content')


<div class="card-header text-center fw-bold col-md-11 mx-auto">PRODUK SAYA</div>
<div class="card-group border border-primary col-md-11 mx-auto" style="background-color: #F3DEBA;">
@php $no=1; @endphp
 @foreach($data_produk as $row)
<div class="card m-2 border border-secondary " style="width: 18rem;">
  <div class="card-body bg-light">
    <p class="fw-bold">No : {{ $no++ }}</p>
    <p align="center">
        <img class="img-fluid rounded shadow-sm"
            src="{{ asset('gambar/gambar_produk/'.$row->gambar_produk) }}"
            style="width: 90px; height:90px" alt="Gambar Produk">
    </p>
    <div class="text-dark">
        <p>Nama Produk : {{ $row->nama_produk }}</p>
          <div class="col-md-12">
            <textarea class="form-control"
                >{{ $row->deskripsi_produk }}
            </textarea>
    </div>
        <p class="py-4">Jumlh : {{ $row->stok }}
        </p>           
    </div>
        <p align="center" class="position-absolute bottom-0 end-0 px-2">
            <a id="edita" href="{{ url('/edit_produk/'.$row->id) }}" class="btn btn-sm btn-primary"> <i class="fa-regular fa-pen-to-square"></i> Edit</a>
            <a id="hapus" href="{{ url('/hapus_produk/'.$row->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-trash"></i> Delete</a>
        </p>
  </div>
</div>
@endforeach
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>


$(document).on('click', '#hapus', function(e) {
  e.preventDefault();
  var link = $(this).attr('href');

  Swal.fire({
  title: 'Apakah Anda Yakin?',
  text: "Data Akan Dihapus!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
       window.location = link;
       
       Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

})


</script>


@endsection