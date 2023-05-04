@extends('adminlte::page')


@section('title', 'About Us')

@section('content_header')
<h1 class="m-0 text-dark">About Us</h1>
@stop

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('/storage/images/about/fotbar2.jpg')}}" alt="Foto Bersama FKKS">
      <div class="carousel-caption d-none d-md-block">
        <h5>TIM KAMPUS MENGAJAR ANGKATAN 5</h5>
        <p>SDN GETASKEREP 01</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('/storage/images/about/Ego.png')}}" alt="Foto Ego">
      <div class="carousel-caption d-none d-md-block">
        <h5>Ego Winasis</h5>
        <p>Politeknik Harapan Bersama Tegal</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('/storage/images/about/Dona.png')}}" alt="Foto Dona">
      <div class="carousel-caption d-none d-md-block">
      <h5>Dona Safitri</h5>
      <p>Universitas Negeri Semarang</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('/storage/images/about/Sip.png')}}" alt="Foto Syifa">
      <div class="carousel-caption d-none d-md-block">
      <h5>Fatih Azhar Syifani</h5>
      <p>Universitas Negeri Semarang</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('/storage/images/about/Winda.png')}}" alt="Foto Winda">
      <div class="carousel-caption d-none d-md-block">
      <h5>Winda Mirtasya Utami</h5>
      <p>Universitas Negeri Semarang</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('/storage/images/about/Wina.png')}}" alt="Foto Wina">
      <div class="carousel-caption d-none d-md-block">
      <h5>Wina Sabita Al Jauziah</h5>
      <p>Universitas Singaperbangsa Karawang</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@stop

@section('js')
<script type="text/javascript">
  var myCarousel = document.querySelector('#carouselExampleCaptions')
  var carousel = new bootstrap.Carousel(myCarousel)
</script>
@endsection
@section('footer')
<div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar
    Angkatan 5 </div>
@stop