@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                <h3>{{$siswa}}</h3>
  
                  <p>Siswa</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users text-white"></i>
                </div>
                <a href="{{route('siswa.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
           
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$nilai}}</h3>
  
                  <p>Nilai</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book text-white"></i>
                </div>
                <a href="{{route('nilai.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                <h3>{{$file}}</h3>
  
                  <p>Kompetensi</p>
                </div>
                <div class="icon">
                  <i class="fas fa-trophy text-white"></i>
                </div>
                <a href="{{route('nilai.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                <h3>{{$file}}</h3>
  
                  <p>Ijazah</p>
                </div>
                <div class="icon">
                  <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <a href="{{route('ijazah.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
           
          </div>
          <!-- /.row -->
         
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@stop
@section('footer')
      <div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar Angkatan 5  </div>
@stop