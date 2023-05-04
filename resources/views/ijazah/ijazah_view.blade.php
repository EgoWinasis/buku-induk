@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Ijazah')

@section('content_header')
<div class="row">
    <div class="col-md-12">

        <h1 class="m-0 text-dark">Data Ijazah Siswa</h1>
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
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row">

            <div class="col-md-12">

                <table id="table_kelas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($siswa as $isi)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $isi->nis }}</td>
                            <td>{{ $isi->nama_lengkap }}</td>
                            @php
                            $ijazah = DB::table('ijazah')
                            ->select('id', 'id_siswa')
                            ->where('id_siswa', $isi->id)
                            ->first();
                            @endphp


                            @if (empty($ijazah))
                            <td class="text-center">
                                <a href="{{route('ijazah.create')}}" data-id="{{$isi->id}}"
                                    class="btn btn-success btn-ijazah"><i class="fa fa-book" aria-hidden="true"></i></a>
                            </td>
                            @else
                            <td class="text-center">
                                <a href="{{route('ijazah.edit',$ijazah->id)}}" class="btn btn-success"><i
                                        class="fa fa-book" aria-hidden="true"></i></a>
                            </td>
                            @endif
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

@section('js')
<script type="text/javascript">
    $(function () {
    $("#table_kelas").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["excel", "pdf", "print"],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
    }).buttons().container().appendTo('#table_kelas_wrapper .col-md-6:eq(0)');
   
  });

  $(document).on('click', '.btn-ijazah', function (e) {
    var id_ijazah = $(this).data('id');
    var expiryDate = new Date();
    expiryDate.setTime(expiryDate.getTime() + (60000)); // 1 hour
    document.cookie = `id_ijazah=${id_ijazah}; expires=${expiryDate}`;
    
});

</script>
@stop