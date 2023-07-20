@include('includes.header')
    <div class="container">
        <br>
        <a href="{{route('new_post')}}" class="btn btn-primary">+</a>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->translate(Session::get('language'))->title ?? 'None'}}</h5>
                            <p class="card-text">{{$post->translate(Session::get('language'))->content ?? 'None'}}</p>
                            <a href="{{route('edit_data', $post->id)}}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@include('includes.footer')
