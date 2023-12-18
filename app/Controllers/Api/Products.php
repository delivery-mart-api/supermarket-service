<?php namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    protected $modelName = 'App\Models\ProductsModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index($seg1 = null, $seg2 = null)
    {
        $user = $this->model->getUserByUsername($seg1);

        if ($user && $this->verifyPassword($seg2, $user['password'])) {
            // Jika username ditemukan dan password cocok
            return $this->respond($this->model->getApiProducts($seg1));
        } else {
            // Jika username tidak ditemukan atau password tidak cocok
            return $this->respond('Wrong Authentication', 401);
        }
    }

    protected function verifyPassword($inputPassword, $hashedPassword)
    {
        $inputPasswordHash = sha1($inputPassword);

        return $inputPasswordHash === $hashedPassword;
    }

    // public function create()
    // {
    //     $data = $this->request->getPost();
    //     $validate = $this->validation->run($data, 'add_product');
    //     $errors = $this->validation->getErrors();

    //     if($errors){
    //         return $this->fail($errors);
    //     }

    //     $product = new \App\Entities\Products();
    //     $product->fill($data);
    //     $product->created_by = 0;
    //     $product->created_at = date("Y-m-d H:i:s");

    //     if($this->model->save($product))
    //     {
    //         return $this->respondCreated($product, 'product added');
    //     }
    // }

    // public function update($id = null)
    // {
    //     $data = $this->request->getRawInput();
    //     if(!$this->model->findById($id))
    //     {
    //         return $this->fail('id tidak ditemukan');
    //     }
    //     $data['id'] = $id;
    //     $validate = $this->validation->run($data, 'update_product');
    //     $errors = $this->validation->getErrors();

    //     if($errors)
    //     {
    //         return $this->fail($errors);
    //     }

    //     $product = new \App\Entities\Products();
    //     $product->fill($data);
    //     $product->updated_by = 99;
    //     $product->updated_at = date("Y-m-d H:i:s");

    //     if($this->model->save($product))
    //     {
    //         return $this->respondUpdated($product, 'product updated');
    //     }
    // }

    // public function delete($id = null)
    // {
    //     if(!$this->model->findById($id))
    //     {
    //         return $this->fail('id tidak ditemukan');
    //     }

    //     if($this->model->delete($id)){
    //         return $this->respondDeleted(['id'=>$id,'message'=>'successfully deleted']);
    //     }
    // }

    // public function show($id = null)
    // {
    //     $data = $this->model->findById($id);
    //     if($data)
    //     {
    //         return $this->respond($data);
    //     }
    //     return $this->fail('id tidak ditemukan');
//     }
}

?>