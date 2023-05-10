<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Cover</title>
    <link rel="stylesheet" href="{{ asset('cetak.css') }}">
    <link rel="stylesheet" href="{{ asset('paper.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/images/cirlce.png') }}" type="image/x-icon">
</head>
<body>
    <table width='100%'>
        <tbody class="tagline">
            <tr>
               <td colspan='2' class=' text-left'>
                   <h2>MERDEKA</h2>
               </td> 
            </tr>
            <tr>
               <td colspan='2' class=' text-left'>
                   <h2>BELAJAR</h2>
               </td> 
            </tr>
            
            <tr>
               <td colspan='2' class=' text-center'>
               <img src='{{asset("storage/images/logo.jpg")}}' width='400px'>
               </td> 
            </tr>
            <tr >
                <td colspan='2' class=' text-center'>
                    <h1> BUKU INDUK REGISTER </h1>
                </td>
            </tr>
            <tr>
                <td colspan='2' class=' text-center'>
                    <h1> PESERTA DIDIK </h1>
                 </td>
            </tr>
            <tr>
                <td colspan='2' class=' text-center'>
                    <h1> KURIKULUM MERDEKA </h1>
                 </td>
            </tr>
            <tr>
                <td colspan='2' class=' text-center'>
                    <h1> SEKOLAH DASAR (SD) </h1>
                 </td>
            </tr>
            <tr>
                <td colspan='2' class=' text-center'>
                    <h1>  {{$tahunCetak}} </h1>
                 </td>
            </tr>
        </tbody>
    </table>

    <div class="siku" style="margin-top: 3cm">
        <table width='100%' class='table-border-out'>
            <tbody>
                <tr>
                <td  class=' text-left'>
                    <h4>NAMA SEKOLAH</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>:</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>SDN GETASKEREP 01</h4>
                </td> 
                </tr>
                <tr>
                <td  class=' text-left'>
                    <h4>ALAMAT SEKOLAH</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>:</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>JALAN PROJOSUMARTO 1</h4>
                </td> 
                </tr>
                <tr>
                <td  class=' text-left'>
                    <h4>DESA / KELURAHAN</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>:</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>DESA GETASKEREP</h4>
                </td> 
                </tr>
                <tr>
                <td  class=' text-left'>
                    <h4>KECAMATAN</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>:</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>TALANG</h4>
                </td> 
                </tr>
                <tr>
                <td  class=' text-left'>
                    <h4>KABUPATEN / KOTA</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>:</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>KABUPATEN TEGAL</h4>
                </td> 
                </tr>
                <tr>
                <td  class=' text-left'>
                    <h4>PROVINSI</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>:</h4>
                </td> 
                <td  class=' text-left'>
                    <h4>JAWA TENGAH</h4>
                </td> 
                </tr>
                
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>