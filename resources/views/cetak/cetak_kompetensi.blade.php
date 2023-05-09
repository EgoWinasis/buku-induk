<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kompetensi</title>
    <link rel="stylesheet" href="{{ asset('cetak.css') }}">
    <link rel="stylesheet" href="{{ asset('paper.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/images/cirlce.png') }}" type="image/x-icon">
</head>
<body>
    <h1 style="text-align: center;font-size:2rem">CAPAIAN KOMPETENSI</h1>
    <table width='100%' class='table-border kompetensi' style="margin-top: 20px">
        <thead>
            <tr>
                <th class='w-30 text-center table-border'>Mata Pelajaran</th>
                <th class='w-10 text-center table-border'>Kelas</th>
                <th class='w-15 text-center table-border'>Smt</th>
                <th class='w-45 text-center table-border'>Capaian Kompetensi</th>
            </tr>
        </thead>
        <tbody>
            {{--  --}}
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_1}}</td>
                <td rowspan='2' class='text-center table-border'>1</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_1_1}}</td>
            </tr>
            <tr>
               
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_1_2}}</td>
            </tr>
            {{--  --}}
            {{--  --}}
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_2}}</td>
                <td rowspan='2' class='text-center table-border'>2</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_2_1}}</td>
            </tr>
            <tr>
               
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_2_2}}</td>
            </tr>
          
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_3}}</td>
                <td rowspan='2' class='text-center table-border'>3</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_3_1}}</td>
            </tr>
            <tr>
               
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_3_2}}</td>
            </tr>
          
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_4}}</td>
                <td rowspan='2' class='text-center table-border'>4</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_4_1}}</td>
            </tr>
            <tr>
               
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_4_2}}</td>
            </tr>
          
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_5}}</td>
                <td rowspan='2' class='text-center table-border'>5</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_5_1}}</td>
            </tr>
            <tr>
               
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_5_2}}</td>
            </tr>
          
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_6}}</td>
                <td rowspan='2' class='text-center table-border'>6</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_6_1}}</td>
            </tr>
            <tr>
               
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_6_2}}</td>
            </tr>
            

            @if ($kompetensi->mapel_7 == null && $kompetensi->ck_7_1 == null)
                
            @else
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_7}}</td>
                <td rowspan='2' class='text-center table-border'>{{$kompetensi->kls}}</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_7_1}}</td>
            </tr>
            <tr>
            
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_7_2}}</td>
            </tr>
            @endif


            @if ($kompetensi->mapel_8 == null && $kompetensi->ck_8_1 == null)
                
            @else
            <tr>
                <td rowspan='2'  class='table-border'>{{$kompetensi->mapel_8}}</td>
                <td rowspan='2' class='text-center table-border'>{{$kompetensi->kls_2}}</td>
                <td class='text-center table-border'>1</td>
                <td  class='table-border'>{{$kompetensi->ck_8_1}}</td>
            </tr>
            <tr>
            
                <td class='text-center table-border'>2</td>
                <td  class='table-border'>{{$kompetensi->ck_8_2}}</td>
            </tr>
            @endif

        </tbody>
    </table>

    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>