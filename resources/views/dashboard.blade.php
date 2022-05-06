<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="/logout" method="POST">
            @csrf
            @method("POST")
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    </div>
    <div class="container">
        <form action="/search" method="GET">
        @csrf
        <label for="search" class="form-group">Search</label>
        <input type="text" class="form-control" name="search">
        <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="container">
        <form action="/filter" method="GET">
        @csrf
        <label for="age" class="form-group">Filter</label>
        <select name="age" id="" onchange="this.form.submit()">
            <option value=""></option>
            <option value="0">Ukloni filter</option>
            <option value="5"> Do 5</option>
            <option value="10"> Do 10</option>
            <option value="15">Starije od 10</option>
        </select>
        </form>
    </div>
    <div class="container my-5">
        <div class="row">
             <table class="table">
                 <thead>
                     <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Naziv knjige</th>
                     <th scope="col">Autor</th>
                     <th scope="col">Izdavac</th>
                     <th scope="col">Godina izdanja</th>
                     </tr>
                 </thead>
                 <tbody>
                 @foreach ($books as $book)
                     <tr>
                         <th scope="row">{{ $book->id }}</th>
                         <td>{{ $book->naziv_knjige }}</td>
                         <td>{{ $book->autor }}</td>
                         <td>{{ $book->izdavac }}</td>
                         <td>{{ $book->godina_izdanja }}</td>
                     </tr>
                 @endforeach
                 </tbody>
             </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>