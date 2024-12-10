<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['categoria_id','nombre','precio'];

    public function getAllWithCategory()
    {
        $builder = $this->db->table($this->table.' p');
        $builder->select('p.id, p.nombre, p.precio, c.nombre AS categoria');
        $builder->join('categorias c', 'p.categoria_id = c.id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getByIdWithCategory($id)
    {
        $builder = $this->db->table($this->table.' p');
        $builder->select('p.id, p.nombre, p.precio, c.nombre AS categoria');
        $builder->join('categorias c', 'p.categoria_id = c.id');
        $builder->where('p.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getByCategoria($categoria_id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('id, nombre, precio');
        $builder->where('categoria_id', $categoria_id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
