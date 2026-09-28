<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $this->userModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('users/form', ['title' => 'Add User', 'user' => null, 'validation' => service('validation')]);
    }

    public function create()
    {
        $rules = ['username' => 'required|max_length[50]|is_unique[users.username]', 'full_name' => 'required|max_length[100]'];
        if (! $this->validate($rules)) {
            return view('users/form', ['title' => 'Add User', 'user' => null, 'validation' => $this->validator]);
        }
        $this->userModel->insert(['username' => $this->request->getPost('username'), 'full_name' => $this->request->getPost('full_name'), 'created_at' => date('Y-m-d H:i:s')]);
        return redirect()->to(site_url('users'))->with('success', 'User account added.');
    }

    public function edit(int $id)
    {
        return view('users/form', ['title' => 'Edit User', 'user' => $this->findUser($id), 'validation' => service('validation')]);
    }

    public function update(int $id)
    {
        $user = $this->findUser($id);
        $rules = ['username' => "required|max_length[50]|is_unique[users.username,id,{$id}]", 'full_name' => 'required|max_length[100]'];
        $avatar = $this->request->getFile('avatar');
        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }
        if (! $this->validate($rules)) {
            return view('users/form', ['title' => 'Edit User', 'user' => $user, 'validation' => $this->validator]);
        }
        $data = ['username' => $this->request->getPost('username'), 'full_name' => $this->request->getPost('full_name')];
        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $uploadPath = FCPATH . 'uploads';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }
            $fileName = $avatar->getRandomName();
            service('image')->withFile($avatar->getTempName())->fit(200, 200, 'center')->save($uploadPath . DIRECTORY_SEPARATOR . $fileName, 85);
            $data['avatar'] = $fileName;
        }
        $this->userModel->update($id, $data);
        return redirect()->to(site_url('users'))->with('success', 'User account updated.');
    }

    private function findUser(int $id): array
    {
        $user = $this->userModel->find($id);
        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }
        return $user;
    }
}
