<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>
<body>

<form action="{{ route('update_post', ['id' => $post-> id ])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Tiêu đề</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
               placeholder="{{ $post->title }}">
    </div>
    {{--    <div class="form-group">--}}
    {{--        <label for="exampleFormControlSelect1">Example select</label>--}}
    {{--        <select class="form-control" id="exampleFormControlSelect1">--}}
    {{--            <option>1</option>--}}
    {{--            <option>2</option>--}}
    {{--            <option>3</option>--}}
    {{--            <option>4</option>--}}
    {{--            <option>5</option>--}}
    {{--        </select>--}}
    {{--    </div>--}}
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Nội dung</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  placeholder="{{ $post->content }}"></textarea>
    </div>
    <div class="form-group">
        <label>Ảnh</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="modal-footer border-top-0 d-flex justify-content-center">
        <button type="submit" class="btn btn-success"> Chỉnh sửa bài viết</button>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>