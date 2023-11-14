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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <div class="container mt-4">
                
               
              </div>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>         
  <div class="container mt-5">
    <h2>Register</h2>
    <form action="{{url('/register')}}" method="post">
          @csrf
        <!-- Username -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text"  class="form-control" id="username" name="username" >
            <span class="text-danger"> @error('username')
              {{$message}}
          @enderror </span>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" placeholder="insert your email" class="form-control" id="email" name="email" >
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
            <label for="categorySelect">Choose a category:</label>
            <select name="category_id" class="form-control" id="categorySelect">
              <option value="">Select a category...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                
              <!-- Add more options as needed -->
            </select>
            <span class="text-danger"> @error('category_id')
                {{$message}}
            @enderror</span>
          </div>
        <div class="form-group">
          <label>Gender:</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male">
              <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
              <label class="form-check-label" for="female">Female</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="other" value="other" >
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