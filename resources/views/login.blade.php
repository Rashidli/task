@include('includes.header')
<div class="container">
    <dic class="all_center">
        <div class="width">
            @if(Session::has('message'))
                <h2 class="text-success text-center">
                    {{Session::get('message')}}
                </h2>
            @endif
            <h3 class="text-center">Log in</h3>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @if($errors->first('password')) <small class="form-text text-danger">{{$errors->first('password')}}</small> @endif
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
                <br>
                <a href="{{route('welcome')}}" class="link-primary">Go to registration page</a>
        </div>
    </dic>
</div>
@include('includes.footer')
