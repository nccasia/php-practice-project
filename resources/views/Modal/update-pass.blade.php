<div class="container">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form-password">
        Cập nhật
    </button>
</div>

<div class="modal fade" id="form-password" tabindex="-1" role="dialog" aria-labelledby="PasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="PasswordLabel">Đặt lại mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password1">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="password1">
                    </div>
                    <div class="form-group">
                        <label for="password1">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="password2">
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

