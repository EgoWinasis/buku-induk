@extends('adminlte::page')


@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('title', 'Data Ijazah Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Data Ijazah Siswa : {{$siswa->nama_lengkap}}</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <form method="POST" action="{{ route('ijazah.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <x-adminlte-card class="col-md-12" theme-mode="full">
                    <div class="row">

                        {{-- ijazah --}}
                        <x-adminlte-input-file name="ijazah" value="{{old('ijazah')}}" label="Ijazah"
                            placeholder="Pilih file PDF.." fgroup-class="col-md-12"  />
                            {{-- SKHUN --}}
                        <x-adminlte-input-file name="skhun" value="{{old('skhun')}}" label="SKHUN"
                                placeholder="Pilih file PDF.." fgroup-class="col-md-12"/>
                        {{-- SKL --}}
                        <x-adminlte-input-file name="skl" value="{{old('skl')}}" label="Surat Keterangan"
                            placeholder="Pilih file PDF.." fgroup-class="col-md-12"/>
                    </div>
                </x-adminlte-card>


                {{-- id --}}
                <input type="hidden" name="id_siswa" value="{{$siswa->id}}">

                <div class="d-flex justify-content-between col-md-12">

                    <x-adminlte-button class="btn-flat col-sm-1 " onclick="return back();" theme="danger"
                        icon="fas fa-lg fa-arrow-left" />

                    <x-adminlte-button class="btn-flat col-sm-1 " type="submit" theme="success"
                        icon="fas fa-lg fa-save" />

                </div>

            </div>
        </form>

        <br>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

{{-- footer --}}
@section('footer')
<div class="mt-2" id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa -
        Kampus Mengajar
        Angkatan 5 </div>
@stop


@section('js')
<script type="text/javascript">
    function back() {
        window.location = "{{ route('ijazah.index') }}";
    }

</script>
@stop