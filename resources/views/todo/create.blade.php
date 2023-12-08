<!-- resources/views/todos/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do App</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h1>To-Do App</h1>
    <form id="todoForm" action="{{ route('todo.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
     <input type="text" class="form-control" id="todoInput" name="todos[]" placeholder="Add a new to-do">
          <button class="btn btn-primary" type="submit">Add</button>
        </div>

      <ul id="todoList" class="list-group">
        <!-- To-do items will be dynamically added here -->
      </ul>
      <button id="submitAll" class="btn btn-success mt-3">Submit All To-Dos</button>
  </div>
</form>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Your jQuery code -->
  <script>
    $(document).ready(function() {
      let todosArray = []; // Array to store to-dos

      // Function to add new to-do item
      $('#todoForm').submit(function(event) {
        event.preventDefault();
        let todoText = $('#todoInput').val().trim();
        if (todoText !== '') {
          $('#todoList').append(`<li class="list-group-item">${todoText}<button class="btn btn-danger btn-sm float-end delete">Delete</button></li>`);
          todosArray.push(todoText); // Add to-do to the array
          $('#todoInput').val(''); // Clear input field after adding to-do
        }
      });

      // Function to remove a to-do item
      $('#todoList').on('click', '.delete', function() {
        let listItem = $(this).closest('li');
        let index = listItem.index();
        listItem.remove();
        todosArray.splice(index, 1); // Remove the to-do from the array
      });

      // Submit all to-dos
      $('#submitAll').click(function() {
        if (todosArray.length > 0) {
            var _token=$("input[name=_token]").val();
            var fd=new FormData();
            fd.append('todos',todosArray);
            fd.append('_token',_token);

            submitToServer("{{ route('todo.store') }}","POST",fd); // Submit all to-dos to the server
        } else {
          console.log('No to-dos to submit');
        }
      });

      // Function to submit all to-dos to the server
      function submitToServer(route,method,formData) {
        $.ajax({
        url:route,
        type:method,
        dataType:'json',
        data:formData,
        contentType:false,
        processData:false,
        success:function(data,status)
        {
                console.log(data);
                console.log(data.result);
                console.log(data.message);
                if(data.result)
                {
                    var url = "{{ route('todo.index') }}";
                    window.location.href = url;
                }


         }
          });
      }
    });

  </script>
  <!-- Bootstrap JavaScript and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
