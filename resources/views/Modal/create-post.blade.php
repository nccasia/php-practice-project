<div class="container">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form-create-post">
        Tạo bài viết
    </button>
</div>

<div class="modal fade" id="form-create-post" tabindex="-1" role="dialog" aria-labelledby="CreatePostLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="CreatePostLabel">Thông tin tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('create_store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text" class="form-control" name="content">
                    </div>
                    <select class="form-control form-control-sm">
                        <option>Thẻ</option>
                    </select>
                    <p></p>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Thêm bài viết</button>
                </div>
            </form>
        </div>
    </div>
</div>

