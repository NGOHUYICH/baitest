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
  <h1 class="ml-5">Hay hoan thanh trang thai Dang nhap nhe</h1>
  <div class="row mb-5 ml-5">
    <div class="col-2">
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ngôn ngữ...
        </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/Dangnhap/lang=vn">Việt Nam</a>
        <a class="dropdown-item" href="/Dangnhap/lang=en">English</a>
        <a class="dropdown-item" href="/Dangnhap/lang=fr">France</a>
      </div>
    </div>
       
    </div>
  </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="/Dangnhap" method="post">
                    @csrf 
                    <div class="form-group">
                      <label for="">{{__('name')}}</label>
                      <input type="text"
                        class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Name">
                      
                    </div>
                    
                    <div class="form-group">
                    @error('name')
                   <p class="form-text text-muted">
                     {{$message}}
                   </p>
                    @enderror
                      <label for="">{{__('address')}}</label>
                      <input type="text"
                        class="form-control" name="address" id="" aria-describedby="helpId" placeholder="Address">
                        
                    </div>
                    <div class="form-group">
                      <label for="">{{__('email')}}</label>
                      <input type="text"
                        class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Email">
                        
                    </div>
                    <div class="form-group">
                      <label for="">{{__('content')}}</label>
                      <input type="text"
                        class="form-control" name="content" id="" aria-describedby="helpId" placeholder="Content">
                        
                    </div>
                    <button type="submit" class="btn btn-danger" name="send">{{__('send')}}</button>
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