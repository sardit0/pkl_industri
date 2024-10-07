<!DOCTYPE html>
<html>
<head>
    <title>Email Test</title>
</head>
<body>
    <h1>Your loan has been accepted by the admin!</h1>
    <p>Borrowed Name : {{$minjem->name}} </p>
    <p>Borrowed Books : {{$minjem->buku->judul}} </p>
    <p>Borrow Date : {{$minjem->tanggal_minjem}} </p>
    <p>Return limit : {{$minjem->batas_tgl}} </p>
</body>
</html>
