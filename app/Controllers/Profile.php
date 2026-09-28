<?php
namespace App\Controllers;
use App\Models\UserModel;
class Profile extends BaseController
{
    public function index()
    {
        return view('profile/index', ['title' => 'Profile', 'user' => (new UserModel())->first()]);
    }
}
