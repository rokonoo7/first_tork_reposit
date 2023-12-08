<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h1>Update Form</h1>
  <form action="{{ route('todo.update',$todo->id) }}" method="POST">
    @csrf <!-- CSRF protection in Laravel -->

    <div class="form-group">
      <label for="textInput">Text Input:</label>
      <input type="text" class="form-control" id="textInput" name="basic" value="{{ $todo->basic }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
