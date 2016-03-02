<?php
namespace models;

class ProductModel extends \libs\DBModel
{
    public function selectAllProduct($param)
    {
       return $this->select('products','*' ,"WHERE name LIKE '%$param%'LIMIT 5");
    }
    public function selectMatchProduct($param)
    {
        return $this->select('products','*' ,"WHERE name=:nameOfProduct LIMIT 1",[':nameOfProduct'=>$param]);
    }


}