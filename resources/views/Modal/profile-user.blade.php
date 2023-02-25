<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-proflie">
        Thông tin tài khoản
    </button>
</div>

<div class="modal fade" id="form-proflie" tabindex="-1" role="dialog" aria-labelledby="ProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="ProfileLabel">Thông tin tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label >Tên đăng nhập</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >Tên hiển thị</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ Email</label>
                        <input type="email" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >Mô tả</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

