<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Backend\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

//use imageUpload;

/**
 * @property User $user
 */
class UserController extends Controller
{
//    use imageUpload;
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function getAllUser()
    {
        $data = $this->user->index();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $data['avatar'] = $this->uploadImage($request);
        $user = $this->user->update($id, $data);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật tài khoản thành công'
        ]);
    }

    public function updatePass($token, Request $request)
    {
        $user = Auth::user();
        //Kiểm tra đã nhập mật khẩu cũ và kiểm tra xem mật khẩu mới giống với xác nhận mật khẩu
        if ($request->password_old != null && $request->password == $request->password_confirmation) {
            //Kiểm tra Mật khẩu cũ có giống với mật khẩu đã đăng ký
            if (Hash::check($request->password_old, $user->password)) {

                DB::beginTransaction();

                try {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    DB::commit();

                    return response()->json([
                        'status' => true,
                        'messsage' => 'Cập nhật mật khẩu thành công'
                    ]);

                } catch (Exception $e) {
                    DB::rollBack();
                    return response()->json([
                        'status' => false,
                        'messsage' => throw $e
                    ]);
                }
            }
            return response()->json([
                'status' => false,
                'message' => 'Xác nhận mật khẩu cũ sai'
            ]);
        }
    }

    public function forgotPass(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = Str::random(6);
        $user->token = $token;
        $user->save();
        if ($this->checkToken($user, $token)) {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::login($user);
        }
        abort(403, 'Lỗi');
    }

    public function show($id)
    {
        $user = $this->user->show($id);
        if (empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    function uploadImage($request)
    {
        $data['avatar'] = $request->image;
        $nameImage = Str::random(6);
        if ($request->has("image") != null) {
            $fileName = "{$nameImage}.jpg";
            $request->file('image')->storeAs('anh', $fileName, 'public');
            $data['avatar'] = "$fileName";
            return $data['avatar'];
        }
    }

    public function delete($id)
    {
        $user = $this->user->show($id);
        if (empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Xoá không thành công'
            ]);
        }
        $user = $this->user->delete($id);
        return response()->json([
            'status' => true,
            'message' => 'Đã xoá thành công',
        ]);
    }

    function checkToken(User $user, $token)
    {
        if ($user->token == $token) {
            return true;
        }
        return false;
    }
}
