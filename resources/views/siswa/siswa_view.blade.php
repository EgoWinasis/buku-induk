@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Siswa')

@section('content_header')
<div class="row">
    <div class="col-md-12">

        <h1 class="m-0 text-dark">Data Siswa</h1>
    </div>
</div>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row my-3">
            <div class="col-md-12">

                <x-adminlte-button onclick="return add();" label="Tambah" theme="primary" icon="fas fa-plus" />
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">

                <table id="table_siswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td class="nama">{{ $student->nama_lengkap }}</td>
                            <td>{{ $student->jen_kel == "Laki-laki" ? "Laki-laki" : "Perempuan" }}</td>
                            <td class="text-center"><img
                                    src="{{$student->foto_siswa == "user_default_profil.png" ? asset('storage/images/user_default_profil.png') : asset('storage/images/foto-siswa/'.$student->foto_siswa);}}"
                                    width="50px" alt="Foto Siswa"></td>
                            <td>
                                {{-- <form action="{{ route('siswa.destroy',$student->id) }}" method="POST"> --}}

                                <a class="btn btn-info" href="{{ route('siswa.show',$student->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('siswa.edit',$student->id) }}">Edit</a>

                                {{-- 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-danger">Delete</button> --}}
                                <a class="btn btn-danger btn-delete" data-id="{{$student->id}}">Delete</a>
                                {{-- </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>


            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop
@section('footer')
<div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar
        Angkatan 5 </div>
@stop
{{-- @push('js')
<script src="asset('vendor/sweetalert2/sweetalert2.min.js')"></script>
@endpush --}}

@section('js')
<script type="text/javascript">
    function add() {
        window.location = "{{ route('siswa.create') }}";
    }
    
  $(function () {
    $("#table_siswa").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["excel", "pdf", "print"],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            }
        ]
    }).buttons().container().appendTo('#table_siswa_wrapper .col-md-6:eq(0)');
   
  });

  $(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var nama = $(this).parent().parent().find('.nama').text();
    var token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Hapus data siswa '+nama+' ?',
        text: "Semua data siswa akan hilang!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
             type: "DELETE",
             url: "/siswa/"+id,
             data: {
                 'id'     :id,
                 '_token' : token,
                 },
            success: function (data) {   
                Swal.fire(
                    'Deleted!',
                    'Data siswa '+nama+' berhasil dihapus!',
                    'success'
                    )
                    window.location.reload();
                 },
            error: function(xhr, status, error) {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error
                    })

                    

                 }      
            });
        
    }
    })
    
});

</script>
@stop