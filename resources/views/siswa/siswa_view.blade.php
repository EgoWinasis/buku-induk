@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Data Siswa</h1>
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
            <x-adminlte-button onclick="return add();" label="Tambah" theme="primary" icon="fas fa-plus" />
        </div>
        <div class="row">
       
            <div class="col-md-12">

                <table id="table_siswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->nama_lengkap }}</td>
                            <td>{{ $student->jen_kel == "Laki-laki" ? "Laki-laki" : "Perempuan" }}</td>
                            <td class="text-center"><img src="{{$student->foto_siswa == "user_default_profil.png" ? asset('storage/images/user_default_profil.png') : asset('storage/images/foto-siswa/'.$student->foto_siswa);}}"
                                    width="50px" alt="Foto Siswa"></td>
                            <td>
                                <form action="{{ route('siswa.destroy',$student->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('siswa.show',$student->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('siswa.edit',$student->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>


                <div class="row text-center">
                    {!! $students->links() !!}
                </div>




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

  

</script>
@stop