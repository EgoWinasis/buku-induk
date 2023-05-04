<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <embed src="{{asset('storage/pdf/ijazah/'.$file->ijazah)}}" width="100%" height="800px" />
    <embed src="{{asset('storage/pdf/ijazah/'.$file->skhun)}}" width="100%" height="800px" /> --}}
    <iframe src="{{asset('storage/pdf/ijazah/'.$file->ijazah)}}"
        frameBorder="0" scrolling="auto" height="1000px" width="100%"></iframe>
   
</body>

</html>