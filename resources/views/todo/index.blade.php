<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Index Table</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h1>Facilities List</h1>
  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">Serial No</th>
        <th scope="col">Facilities</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- Table rows will be populated here -->
      {{
      $serial=1;
       }}
    @foreach ($todo as $row)
    <tr>
        <th scope="row">{{ $serial++ }}</th>
        <td>{{ $row->basic }}</td>
        <td>
          <a href="{{ route('todo.delete',$row->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a>
          <a href="{{ route('todo.edit',$row->id )}}"> <button class="btn btn-primary btn-sm">Edit</button></a>
        </td>
      </tr>
    @endforeach
      <!-- Additional rows can be added dynamically -->
    </tbody>
  </table>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
