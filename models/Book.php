<?php

require_once 'Database.php';


class Book {
    private $books = [];
    private $db;

    public function __construct() {
       $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM books");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($title, $author, $publisher, $published_year, $genre) {
        $stmt = $this->db->prepare("INSERT INTO books (title, author, publisher, published_year, genre) VALUES (:title, :author, :publisher, :published_year, :genre)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':publisher', $publisher);
        $stmt->bindParam(':published_year', $published_year);
        $stmt->bindParam(':genre', $genre);
        return $stmt->execute();
    }


    public function deleteById( $id)
    {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function getById( $id )
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Bind the :id parameter
        $stmt->execute();
        
        // Fetch and return the record
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

     public function update($id, $title, $author, $publisher, $published_year, $genre) {
        $stmt = $this->db->prepare("UPDATE books SET title = :title, author = :author, publisher = :publisher, published_year = :published_year, genre = :genre WHERE id = :id");

        // Bind the parameters to the placeholders
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':publisher', $publisher, PDO::PARAM_STR);
        $stmt->bindParam(':published_year', $published_year, PDO::PARAM_STR);
        $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Return the number of affected rows
        return $stmt->execute();
    }
}
