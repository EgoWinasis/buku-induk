@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Siswa</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row my-3">
            <x-adminlte-button onclick="return add();"  label="Tambah" theme="primary" icon="fas fa-plus"/>
        </div>
        <div class="row">
            {{-- Setup data for datatables --}}
            @php
            $heads = [
            'ID',
            'NISN',
            'No. Induk',
            'Nama',
            ['label' => 'Alamat', 'width' => 40],
            ['label' => 'Aksi', 'no-export' => true, 'width' => 5],
            ];

            $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                <i class="fa fa-lg fa-fw fa-trash"></i>
            </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                <i class="fa fa-lg fa-fw fa-eye"></i>
            </button>';

            $config = [
            'data' => [
            [22,"12312312","2123", 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>
            '],
            [19,"123213321","2132", 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'
            </nobr>'],
            [3,"213213","2312", 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            ],
            'order' => [[1, 'asc']],
            'columns' => [null, null,null,null, null, ['orderable' => false]],
            ];
            @endphp

            {{-- With buttons --}}
            <x-adminlte-datatable id="table7" :heads="$heads" theme="light" :config="$config" striped hoverable
                with-buttons />


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
        window.location = "{{url('/siswa/add')}}";
    }
</script>
@stop