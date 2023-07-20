@include('includes/header')

<div class="container">
    <div class="row">

        <form action="{{route('post_data')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title En</label>
                <input type="text" name="en_title" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Content En</label>
                <input type="text" name="en_content" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title Az</label>
                <input type="text" name="az_title" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Content Az</label>
                <input type="text" name="az_content" class="form-control" id="exampleInputEmail1">
            </div>
            <button type="submit">Submit</button>
        </form>

    </div>
</div>

@include('includes/footer')
