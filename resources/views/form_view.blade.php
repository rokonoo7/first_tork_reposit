<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  
    <div class="container mt-5">
        <h2>Users Table</h2>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>{{session('username')}}</th>
             
              <th>Email</th>
              <th>Gender</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample data, replace this with your actual data -->
            @php
             $id=1;   
            @endphp
            @foreach ($laravel_data as $item)
            <tr>
                <td>{{ $id++}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->gender}}</td>
                <td>
                 <a href="{{url('/form/edit/')}}/{{$item->id}}"> <button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                  <a href="{{url('/form/delete/')}}/{{$item->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
              </tr> 
            @endforeach
           
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>