<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;

class UserRepository implements IUserRepository
{

    public function all()
    {
        return User::all();
    }

    public function create(array $data)
    {
        $data = new User();
        $data->username = $data['username'];
        $data->name = $data['name'];
        $data->password = $data['password'];
        $data->phone = $data['phone'];
        $data->email = $data['email'];
        $data->provider = $data['provider'];
        $data->avatar = $data['avatar'];
        $data->save();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function update($id, array $data)
    {
        $result = User::find($id)->update([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'avatar' => $data['avatar']
        ]);
        return $result;
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        return $post->post()->delete();
    }
}
