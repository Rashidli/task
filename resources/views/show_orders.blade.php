@include('includes.header')

<div class="container">
    <div class="width">
        @if(Session::has('add'))
            <h2 class="text-success text-center">
                {{Session::get('add')}}
            </h2>
        @endif
        @if(Session::has('delete'))
            <h2 class="text-success text-center">
                {{Session::get('delete')}}
            </h2>
        @endif
            @if(Session::has('update'))
            <h2 class="text-success text-center">
                {{Session::get('update')}}
            </h2>
        @endif
        <h3 class="text-primary">Username: {{auth()->user()->username}}</h3>
        <form action="{{route('create_orders')}}" method="post">
            @csrf
            <div class="form-group">
                <input name="title" type="text" class="form-control" value="{{ old('title') }}"  aria-describedby="emailHelp" placeholder="Title">
                @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
            </div>
            <div class="form-group">
                <input name="description" type="text" class="form-control" value="{{ old('description') }}" aria-describedby="nameHelp" placeholder="Description">
                @if($errors->first('description')) <small class="form-text text-danger">{{$errors->first('description')}}</small> @endif
            </div>
            <div class="form-group">
                <input name="price" type="text" class="form-control" value="{{ old('price') }}"  placeholder="Price">
                @if($errors->first('price')) <small class="form-text text-danger">{{$errors->first('price')}}</small> @endif
            </div>
            <div class="form-group">
                <input name="order_date" type="date" class="form-control" value="{{ old('order_date') }}" placeholder="Order date">
                @if($errors->first('order_date')) <small class="form-text text-danger">{{$errors->first('order_date')}}</small> @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Order date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach($orders as $order)
                <form action="{{route('update_orders',$order->id)}}" method="post">
                    @csrf
                    <tr>
                        <td>
                            <input name="title" type="text" class="form-control" value="{{ $order->title }}"  aria-describedby="emailHelp" placeholder="Title">
                            @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
                        </td>
                        <td>
                            <input name="description" type="text" class="form-control" value="{{ $order->description }}" aria-describedby="nameHelp" placeholder="Description">
                            @if($errors->first('description')) <small class="form-text text-danger">{{$errors->first('description')}}</small> @endif
                        </td>
                        <td>
                            <input name="price" type="text" class="form-control" value="{{ $order->price }}"  placeholder="Price">
                            @if($errors->first('price')) <small class="form-text text-danger">{{$errors->first('price')}}</small> @endif
                        </td>
                        <td>

                            <input name="order_date" type="date" class="form-control" value="{{date('Y-m-d', strtotime($order->order_date))}}" placeholder="Order date">
                            @if($errors->first('order_date')) <small class="form-text text-danger">{{$errors->first('order_date')}}</small> @endif
                        </td>
                        <td><button type="submit" class="btn btn-primary">Update</button></td>
                        <td><a href="{{route('delete_orders', $order->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                </form>
            @endforeach

        </tbody>
    </table>
</div>
@include('includes.footer')
