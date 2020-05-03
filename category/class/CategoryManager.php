<?php


class CategoryManager
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new ConnectDatabase();
    }

    function prepare($sql)
    {
        $stmt = $this->conn->connect();
        return $stmt->prepare($sql);
    }

    function getAllDatabase()
    {
        $sql = "select * from categories;";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAllDatabaseById($id)
    {
        $sql = "select * from categories where id = :id;";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function add($category)
    {
        $name = $category->getName();
        $sql = 'insert into categories (name) values (:name);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    function delete($id)
    {
        $sql = 'delete from categories where id = :id;';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function update($id, $name)
    {
        $sql = "update categories set name = :name where id = :id;";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function searchById($id)
    {
        $sql = 'select * from categories where id like "%'.$id.'%";';
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function searchByName($name)
    {
        $sql = 'select * from categories where name like "%'.$name.'%";';
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}