@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Nilai')

@section('content_header')
<div class="row">
    <div class="col-md-12">

        <h1 class="m-0 text-dark">Data Nilai Siswa</h1>
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
                            <th>Nilai</th>
                            <th>Kompetensi</th>
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
                            <td class="text-center">

                                @php
                                $kelas = DB::table('class')
                                ->select('id', 'id_siswa', 'kelas', 'tinggal_kelas' , 'tahun_ajaran')
                                ->where('id_siswa', $isi->id)
                                ->orderBy('kelas', 'asc')
                                ->get();
                                @endphp

                                @foreach ($kelas as $item)
                                @if ($item->tinggal_kelas == 'false')
                                <a href="{{route('getNilai', [$isi->id,$item->kelas, $isi->nama_lengkap])}}"
                                    class="btn btn-info btn-kelas" data-id="{{$item->id}}"
                                    data-tahun="{{$item->tahun_ajaran}}">{{$item->kelas}}</a>

                                @else
                                <a href="{{route('getNilai', [$isi->id,$item->kelas, $isi->nama_lengkap])}}"
                                    class="btn btn-warning btn-kelas" data-id="{{$item->id}}"
                                    data-tahun="{{$item->tahun_ajaran}}">{{$item->kelas}}</a>
                                @endif
                                @endforeach
                                <a class="btn btn-success btn-tambah" data-id="{{$isi->id}}"><i
                                        class="fas fa-plus"></i></a>
                            </td>
                            @php
                                $kompetensi = DB::table('kompetensi')
                                ->select('id', 'id_siswa')
                                ->where('id_siswa', $isi->id)
                                ->first();
                            @endphp

                            @if (empty($kompetensi))
                            <td class="text-center">
                                <a href="{{route('kompetensi.create')}}" data-id="{{$isi->id}}"
                                    class="btn btn-dark btn-kompetensi" ><i class="fa fa-trophy"></i></a>
                            </td>
                            @else
                                <td class="text-center">
                                    <a href="{{route('kompetensi.edit',$kompetensi->id)}}"
                                        class="btn btn-dark" ><i class="fa fa-trophy"></i></a>
                                </td>
                            @endif
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>

            <div class="col-md-12 my-5">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <h6 class="font-weight-bold">Keterangan : </h6>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:40px">
                                <a class="btn btn-info w-100 h-100"></a>
                            </td>
                            <td>:</td>
                            <td>Kelas</td>
                        </tr>
                        <tr>
                            <td style="height:40px">
                                <a class="btn btn-warning w-100 h-100"></a>
                            </td>
                            <td>:</td>
                            <td>Tinggal Kelas</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-success"><i class="fas fa-plus"></i></a>
                            </td>
                            <td>:</td>
                            <td>Tambah Data Tinggal Kelas</td>
                        </tr>
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
    function add() {
        window.location = "{{ route('nilai.create') }}";
    }
    
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

  $(document).on('click', '.btn-tambah', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: 'Tambah Data Tinggal Kelas?',
        text: "Kelas Baru akan dibuat..",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
    if (result.isConfirmed) {
            Swal.fire({
            title: 'Pilih Kelas',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
                '4': '4',
                '5': '5',
                '6': '6'
            },
            inputPlaceholder: 'Pilih Kelas',
            showCancelButton: true,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    if (value > 0) {
                        $.ajax({
                            type: "GET",
                            url: "/setKelas/"+id+"/"+value,
                            data: {
                                'id'     :id,
                                'kelas' : value,
                                },
                            success: function (data) {   
                                
                                Swal.fire(
                                    'Berhasil!',
                                    'Data kelas berhasil dibuat!',
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
                    } else{
                        resolve();
                    }
                })
            }

            })
        }
    })
    
});
  $(document).on('click', '.btn-kelas', function (e) {
    
    var tahun = $(this).data('tahun');
    var id = $(this).data('id');
    var expiryDate = new Date();
    expiryDate.setTime(expiryDate.getTime() + (60000)); // 1 hour
    document.cookie = `tahun=${tahun}; expires=${expiryDate}`;
    expiryDate.setTime(expiryDate.getTime() + (60*60*1000)); // 1 hour
    document.cookie = `id_kelas=${id}; expires=${expiryDate}`;
    
});

  $(document).on('click', '.btn-kompetensi', function (e) {
    var id_kompetensi = $(this).data('id');
    var expiryDate = new Date();
    expiryDate.setTime(expiryDate.getTime() + (60000)); // 1 hour
    document.cookie = `id_kompetensi=${id_kompetensi}; expires=${expiryDate}`;
    
});
</script>
@stop