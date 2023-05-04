@extends('adminlte::page')


@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('title', 'Capaian Kompetensi Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Capaian Kompetensi Siswa : {{$siswa->nama_lengkap}}</h1>
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
        <form method="POST" action="{{ route('kompetensi.store') }}">
            @csrf

            <div class="row">

                <x-adminlte-card  class="col-md-12" theme-mode="full" >
                    <div class="row">

                        <table width='100%' border="1px solid">
                            <thead>
                                <tr>
                                    <th class="w-30 text-center">Mata Pelajaran</th>
                                    <th class="w-5 text-center">Kelas</th>
                                    <th class="w-15 text-center">Semester</th>
                                    <th class="w-50 text-center">Capaian Kompetensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--  --}}
                                <tr>
                                    <td rowspan="2"><input type="text" class="form-control" value="{{old('mapel_1')}}" name="mapel_1"></td>
                                    <td rowspan="2" class="text-center">1</td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_1_1')}}" name="ck_1_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_1_2')}}" name="ck_1_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2"><input type="text" class="form-control" value="{{old('mapel_2')}}" name="mapel_2"></td>
                                    <td rowspan="2" class="text-center">2</td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_2_1')}}" name="ck_2_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_2_2')}}" name="ck_2_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2"><input type="text" class="form-control" value="{{old('mapel_3')}}" name="mapel_3"></td>
                                    <td rowspan="2" class="text-center">3</td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_3_1')}}" name="ck_3_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_3_2')}}" name="ck_3_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2"><input type="text" class="form-control" value="{{old('mapel_4')}}" name="mapel_4"></td>
                                    <td rowspan="2" class="text-center">4</td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_4_1')}}" name="ck_4_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_4_2')}}" name="ck_4_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2"><input type="text" class="form-control" value="{{old('mapel_5')}}" name="mapel_5"></td>
                                    <td rowspan="2" class="text-center">5</td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_5_1')}}" name="ck_5_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_5_2')}}" name="ck_5_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2"><input type="text" class="form-control" value="{{old('mapel_6')}}" name="mapel_6"></td>
                                    <td rowspan="2" class="text-center">6</td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_6_1')}}" name="ck_6_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_6_2')}}" name="ck_6_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2" class="text-center"><input type="text" class="form-control" value="{{old('mapel_7')}}" name="mapel_7"></td>
                                    <td rowspan="2">
                                         {{-- kelas naik --}}
                                        @php
                                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6'];
                                        if (!empty(old('kls'))) {
                                        $selected = [old('kls')];
                                        }else{
                                        $selected = ["1"];
                                        }
                                        @endphp
                                        <x-adminlte-select name="kls" value="{{old('kls')}}">
                                            <x-adminlte-options :options="$options" :selected="$selected" />
                                        </x-adminlte-select>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_7_1')}}" name="ck_7_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_7_2')}}" name="ck_7_2"></td>
                                </tr>
                                {{--  --}}
                                {{--  --}}
                                <tr>
                                    <td rowspan="2" class="text-center"><input type="text" class="form-control" value="{{old('mapel_8')}}" name="mapel_8"></td>
                                    <td rowspan="2">
                                         {{-- kelas naik --}}
                                        @php
                                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6'];
                                        if (!empty(old('kls'))) {
                                        $selected = [old('kls')];
                                        }else{
                                        $selected = ["1"];
                                        }
                                        @endphp
                                        <x-adminlte-select name="kls_2" value="{{old('kls_2')}}">
                                            <x-adminlte-options :options="$options" :selected="$selected" />
                                        </x-adminlte-select>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td ><input type="text" class="form-control" value="{{old('ck_8_1')}}" name="ck_8_1"></td>
                                </tr>
                                <tr>
                                   
                                    <td class="text-center">2</td>
                                    <td><input type="text" class="form-control" value="{{old('ck_8_2')}}" name="ck_8_2"></td>
                                </tr>
                                {{--  --}}
                            </tbody>
                        </table>
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
        window.location = "{{ route('nilai.index') }}";
    }

</script>
@stop