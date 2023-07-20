@include('includes.header')

<div class="container">
    <div class="row">
        <form action="{{route('update_data', $post->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title En</label>
                <input value="{{$post->translate('en')->title}}" type="text" name="en_title" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Content En</label>
                <input value="{{$post->translate('en')->content}}" type="text" name="en_content" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title Az</label>
                <input value="{{$post->translate('az')->title}}" type="text" name="az_title" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Content Az</label>
                <input value="{{$post->translate('az')->content}}" type="text" name="az_content" class="form-control" id="exampleInputEmail1">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@include('includes.footer')
