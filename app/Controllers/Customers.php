<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    private CustomerModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $this->customerModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('customers/form', ['title' => 'Add Customer', 'customer' => null, 'validation' => service('validation')]);
    }

    public function create()
    {
        $rules = ['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]', 'phone' => 'permit_empty|max_length[20]'];
        if (! $this->validate($rules)) {
            return view('customers/form', ['title' => 'Add Customer', 'customer' => null, 'validation' => $this->validator]);
        }
        $this->customerModel->insert(['full_name' => $this->request->getPost('full_name'), 'email' => $this->request->getPost('email'), 'phone' => $this->request->getPost('phone'), 'created_at' => date('Y-m-d H:i:s')]);
        return redirect()->to(site_url('customers'))->with('success', 'Customer account added.');
    }

    public function edit(int $id)
    {
        return view('customers/form', ['title' => 'Edit Customer', 'customer' => $this->findCustomer($id), 'validation' => service('validation')]);
    }

    public function update(int $id)
    {
        $customer = $this->findCustomer($id);
        $rules = ['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]', 'phone' => 'permit_empty|max_length[20]'];
        if (! $this->validate($rules)) {
            return view('customers/form', ['title' => 'Edit Customer', 'customer' => $customer, 'validation' => $this->validator]);
        }
        $this->customerModel->update($id, ['full_name' => $this->request->getPost('full_name'), 'email' => $this->request->getPost('email'), 'phone' => $this->request->getPost('phone')]);
        return redirect()->to(site_url('customers'))->with('success', 'Customer account updated.');
    }

    private function findCustomer(int $id): array
    {
        $customer = $this->customerModel->find($id);
        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }
        return $customer;
    }
}
