<?php


class BookManager
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
        $sql = 'SELECT * FROM books;';
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function add($book)
    {
        $name = $book->getName();
        $author = $book->getAuthor();
        $price = $book->getPrice();
        $categoryId = $book->getcategoryId();
        $image = $book->getImage();
        $status = $book->getStatus();
        $sql = 'insert into books (name,author,price,category_id,image,status) values (?,?,?,?,?,?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $categoryId);
        $stmt->bindParam(5, $image);
        $stmt->bindParam(6, $status);
        $stmt->execute();
    }

    function getAllIdCategory()
    {
        $sql = 'SELECT categories.id FROM categories LEFT JOIN books ON categories.id = books.category_id;';
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $arrayCategoryId = [];
        while ($row = $stmt->fetch()) {
            array_push($arrayCategoryId, $row['id']);
        }
        return $arrayCategoryId;
    }

    function delete($id)
    {
        $sql = 'DELETE FROM books WHERE id = :id;';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function getImageById($id)
    {
        $sql = 'SELECT image FROM books WHERE id = :id;';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getAllById($id)
    {
        $sql = 'SELECT * FROM books WHERE id = :id;';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function update($id, $name, $author, $price, $categoryId, $image, $status)
    {
        $sql = 'UPDATE books SET name = :name, author = :author, price = :price, category_id = :category_id, image = :image, status = :status WHERE id = :id;';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function searchByRow($row, $keyword)
    {
        $sql = 'SELECT * FROM books WHERE ' . $row . ' LIKE "%' . $keyword . '%";';
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}