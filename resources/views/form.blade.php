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
    <h2>{{$title}}</h2>
    <form action="{{$url}}" method="post">
          @csrf
        <!-- Username -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" value="{{$update_data->username}}" class="form-control" id="username" name="username" >
            <span class="text-danger"> @error('username')
              {{$message}}
          @enderror </span>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email"value="{{$update_data->email}}" class="form-control" id="email" name="email" >
            <span class="text-danger"> @error('email')
              {{$message}}
          @enderror </span>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password"  class="form-control" id="password" name="password" >
            <span class="text-danger"> @error('password')
                {{$message}}
            @enderror </span>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password"  class="form-control" id="password_confirmation" name="password_confirmation" >
            <span class="text-danger"> @error('password_confirmation')
              {{$message}}
          @enderror </span>
        </div>
        <div class="form-group">
          <label>Gender:</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male"{{$update_data->gender=="male"?"checked":""}}>
              <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female"{{$update_data->gender=="female"?"checked":""}} >
              <label class="form-check-label" for="female">Female</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="other" value="other"{{$update_data->gender=="other"?"checked":""}} >
              <label class="form-check-label" for="other">Other</label>
          </div>
          <span class="text-danger"> @error('gender')
            {{$message}}
        @enderror </span>
      </div>
        <!-- Gender -->
        {{-- <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" >
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
                <span class="text-danger"> @error('gender')
                  {{$message}}
              @enderror </span>
            </select>
        </div> --}}

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>