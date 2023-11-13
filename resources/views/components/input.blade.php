<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <div class="form-group">
        <label for="username">{{$label}}</label>
        <input type={{$type}} class="form-control" id="username" name={{$name}} placeholder="Enter your username">
        {{-- <span class="text-danger"> @error('username'){{$message}} @enderror</span> --}}
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
   