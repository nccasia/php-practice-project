<head>
    <meta charset="utf-8">
    <title>QUẢN LÝ WEBSITE TÌM ĐỒ THẤT LẠC</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @include('style.page-css')
</head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"></i>Quản lý Blog</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="" alt=""
                         style="width: 40px; height: 40px;">
                    <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0"></h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <div class="nav-item dropdown">
                </div>
            </div>
        </nav>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="width: 110%;">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4" action="">
                <input class="form-control border-0" Items="search" placeholder="Tìm kiếm" name="search">
            </form>
        </nav>

        @include('Modal.profile-user')
        @include('Modal.update-pass')
        @include('Modal.create-post')

        <h6 class="mb-4">Bài đăng</h6>
        <table class="table table-hover">
            @foreach($post as $list)
                <thead>
                <tr>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Người đăng</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Ngày đăng</th>
                    <th scope="col">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{ $list->title }}</th>
                    <th>{{ $list->content }}</th>
                    <th>3</th>
                    <th>
                        <img src="{{ url('anh/')}}/{{ $list->image }}" style="width:50px;height:60px;">
                    </th>

                    <th>{{ $list->created_at }}</th>
                    <th>
                        <button class="btn-warning"><a href="" style="color: white"> Chi tiết </a></button>
                        <button class="btn-primary"><a href="{{ url('/admin/update-post/'.$list->id) }}" style="color: white"> Chỉnh sửa </a></button>
{{--                        <button class="btn-primary"><a href="{{ route('edit_store') }}" style="color: white"> Chỉnh sửa </a></button>--}}
{{--                        @include('Modal.update-post')--}}
                        <button class="btn-danger"><a href="" style="color: white"> Xoá </a></button>
                    </th>
                </tr>
                </tbody>
            @endforeach
        </table>

        {{--        <h6 class="mb-4">Người dùng</h6>--}}
        {{--        <table class="table table-hover">--}}
        {{--            @foreach($user as $list)--}}
        {{--                <thead>--}}
        {{--                <tr>--}}
        {{--                    <th scope="col">Tên hiển thị</th>--}}
        {{--                    <th scope="col">Tên đăng nhập</th>--}}
        {{--                    <th scope="col">Email</th>--}}
        {{--                    <th scope="col">Phone</th>--}}
        {{--                    <th scope="col">Chức năng</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}
        {{--                <tbody>--}}
        {{--                <tr>--}}
        {{--                    <th>{{ $list->name }}</th>--}}
        {{--                    <th>{{ $list->username }}</th>--}}
        {{--                    <th>{{ $list->email }}</th>--}}
        {{--                    <th>{{ $list->phone }}</th>--}}
        {{--                    <th>--}}
        {{--                        <button class="btn-warning"><a href="" style="color: white"> Chi tiết </a></button>--}}
        {{--                        @include('Modal.update-post')--}}
        {{--                        <button class="btn-danger"><a href="" style="color: white"> Xoá </a></button>--}}
        {{--                    </th>--}}
        {{--                </tr>--}}
        {{--                </tbody>--}}
        {{--            @endforeach--}}
        {{--        </table>--}}
    </div>

</div>
</div>
@include('style.page-js')
</body>