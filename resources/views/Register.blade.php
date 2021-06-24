<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row mt-5">
                <div class="col-4">
                    <form action="{{route('register')}}" method="post">
                    @csrf 
                        <div class="form-group">
                          <label for=""><strong>User name</strong></label>
                          <input type="text" name="username" id="" value ="{{old('username')}}"
                            class="form-control" placeholder="User name" aria-describedby="helpId">
                            @error('username')
                                <p style="font-style: italic;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for=""><strong>Email</strong></label>
                          <input type="text" name="email" id="" 
                            class="form-control" placeholder="Email" aria-describedby="helpId">
                            @error('email')
                                <p style="font-style: italic;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for=""><strong>Password</strong></label>
                          <input type="text" name="pass" id="" 
                            class="form-control" placeholder="Password" aria-describedby="helpId">
                            @error('pass')
                                <p style="font-style: italic;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for=""><strong>Confirm Password</strong></label>
                          <input type="text" name="confirm_password" id="" 
                            class="form-control" placeholder="Confirm Password" aria-describedby="helpId">
                            @error('confirm_password')
                                <p style="font-style: italic;">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Register</button>
                    
                    </form>
                
                </div>    
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>