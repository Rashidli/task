<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            .width{
                width: 450px;
                margin-right: auto;
                margin-left:  auto;
            }
            .all_center{
                width: 100%;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .form-group{
                margin-bottom: 25px;
                margin-top: 25px;
            }
            label{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <dic class="all_center">
                <div class="width">
                    @if(Session::has('confirm_email'))
                        <h2 class="text-success">
                            {{Session::get('confirm_email')}}
                        </h2>
                    @endif
                    <h3 class="text-center">Register</h3>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter username">
                            @if($errors->first('username')) <small class="form-text text-danger">{{$errors->first('username')}}</small> @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            @if($errors->first('password')) <small class="form-text text-danger">{{$errors->first('password')}}</small> @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                        <br>
                        <a href="{{route('login_page')}}" class="link-primary">Go to log in page</a>
                </div>
            </dic>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
