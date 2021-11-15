<?php

class library
{
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=tesfurniture", "root", "");
    }

    public function createData($name, $description, $category, $price, $quantity, $photo)
    {   $sql = "INSERT INTO products(name,description,category,price,quantity,photo) VALUES ('$name','$description','$category','$price','$quantity','$photo')";
        //try{
        $query = $this->con->prepare($sql);

        $query->execute();
        //}catch(Exception $e){
            //$str= filter_var($e->getMessage(), FILTER_SANITIZE_STRING);      
          //  echo $str;
        //}
    }

    public function editData($id)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE id = :id");
        $query->execute(array(':id' => $id));
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateData($id, $name, $description, $category, $price, $quantity, $photo)
    {
        $query = $this->con->prepare("UPDATE products SET name = '$name', description = '$description', category = '$category', price = '$price', photo = '$photo', quantity = '$quantity' WHERE id = '$id'");
        $query->execute();
    }

    public function readData()
    {
        $query = $this->con->prepare("SELECT * FROM products");
        $query->execute();
        return $query;
    }

    public function deleteData($id)
    {
        $query = $this->con->prepare("DELETE FROM products WHERE id = '$id'");
        $query->execute();
    }

    public function readDatabyCategory($category)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE category = '$category'");
        $query->execute();
        return $query;
    }

    public function countData()
    {
        $sql = "SELECT COUNT(*) FROM products";
        $res = $this->con->query($sql);
        $count = $res->fetchColumn();
        return $count;
    }

    public function readDataP($awaldata, $JumlahDataPerHalaman)
    {
        
        $query = $this->con->prepare("SELECT * FROM products LIMIT $awaldata, $JumlahDataPerHalaman");
        $query->execute();
        return $query;
    }   

    public function search($keyword)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE name LIKE '%$keyword%'" );
        $query->execute();
        return $query;
    }

    public function detailP($id)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE id = '$id'");
        $query->execute();
        return $query;
    }

}


