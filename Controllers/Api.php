<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;

class Api extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
        $this->productoModel = new ProductoModel();
    }

    public function categorias()
    {
        $data = $this->categoriaModel->getAll();
        return $this->respond($data);
    }

    public function categoria($id)
    {
        $data = $this->categoriaModel->getById($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('Categoría no encontrada');
    }

    public function productos()
    {
        $data = $this->productoModel->getAllWithCategory();
        return $this->respond($data);
    }

    public function producto($id)
    {
        $data = $this->productoModel->getByIdWithCategory($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('Producto no encontrado');
    }

    public function productos_por_categoria($categoria_id)
    {
        $data = $this->productoModel->getByCategoria($categoria_id);
        return $this->respond($data);
    }
}
