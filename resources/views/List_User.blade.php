<!doctype html>
<html lang="en">

<head>
    <title>List User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row mb-5 ml-5 mt-3 mx-0">
        <div class="col-2">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ngôn ngữ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="http://baitest.test/AdidasNgoIch/Home/lang=vn">Việt Nam</a>
                    <a class="dropdown-item" href="http://baitest.test/AdidasNgoIch/Home/lang=en">English</a>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <a href="http://baitest.test/AdidasNgoIch/Home">{{__('Home')}}</a>
            <a href="{{route('logout')}}" class="ml-2">{{__('LogOut')}}</a>
        </div>

    </div>
    <div class="p-5 bg-white rounded shadow mb-5">
        <!-- Rounded tabs -->
        <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
            <li class="nav-item flex-sm-fill">
                <a id="user-tab" data-toggle="tab" href="#adduser" role="tab" aria-controls="user" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">{{__('List User')}}</a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">{{__('List Contact')}}</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div id="adduser" role="tabpanel" aria-labelledby="user-tab" class="tab-pane fade px-4 py-5">
                <div class="row">
                    @if(empty($First_Name_Edit_Account))
                    <form action="{{route('AdidasAddAccountUser')}}" method="post">
                        @else
                        <form action="{{$request->url()}}/Perform" method="post">
                            @endif
                            @csrf
                            <div class="input-group mb-3">
                                <label for="first_name" class="mt-2">{{__('First Name')}}: </label>
                                <input type="text" name="first_name" @if(!empty($First_Name_Edit_Account)) value="{{$First_Name_Edit_Account}}" @endif class="form-control col-2 ml-1" placeholder="First name" aria-label="Firstname" aria-describedby="basic-addon1">
                                <label for="last_name" class="mt-2 ml-1">{{__('Last Name')}}: </label>
                                <input type="text" name="last_name" @if(!empty($Last_Name_Edit_Account)) value="{{$Last_Name_Edit_Account}}" @endif class="form-control col-2 ml-1" placeholder="Last name" aria-label="Lastname" aria-describedby="basic-addon1">
                                <label for="email" class="ml-2 mt-2">{{__('Email')}}: </label>
                                <input type="text" name="email" @if(!empty($Email_Edit_Account)) value="{{$Email_Edit_Account}}" @endif class="form-control col-2 ml-1 mr-1" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                <label for="phone" class="ml-2 mt-2">{{__('Phone')}}: </label>
                                <input type="text" name="phone" @if(!empty($Email_Edit_Account)) value="{{$Phone}}" @endif class="form-control col-2 ml-1 mr-1" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon1">
                                <label for="password" class="ml-2 mt-2">{{__('Password')}}: </label>
                                <input type="password" name="password" class="form-control col-2 ml-1 mr-1" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                <div class="form-group">
                                    <input type="submit" @if(!empty($Email_Edit_Account)) value="{{__('Update')}}" @else value="{{__('Add User')}}" @endif class="btn btn-warning float-right login_btn">
                                </div>
                            </div>
                        </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listUser as $index=>$listUser)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$listUser->name}}</td>
                            <td>{{$listUser->email}}</td>
                            <td>
                                <form action="Home" method="get">
                                    @if(!empty($status))
                                    <a href="Edit_Account={{$listUser->id}}">Edit</a>
                                    <a href="Delete_Account={{$listUser->id}}">Delete</a>
                                    @else
                                    <a href="{{$request->url()}}/Edit_Account={{$listUser->id}}">{{__('Edit')}}</a>
                                    <a href="{{$request->url()}}/Delete_Account={{$listUser->id}}">{{__('Delete')}}</a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listContact as $index=>$listContact)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$listContact['name']}}</td>
                            <td>{{$listContact->contacts[0]['phone']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End rounded tabs -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>