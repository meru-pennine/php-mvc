<?php
session_start();

require_once 'models/Book.php';

class BookController {
    
    public function list() { 
        $bookModel = new Book();
        $books = $bookModel->getAll();
        require 'views/books/list.php';
    }

    public function add() {
        require 'views/books/add.php';
    }

    public function create(){
        
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            
            $title = $_POST['title'];
            $author = $_POST['author'];
            $publisher = $_POST['publisher'];
            $published_year = $_POST['published_year'];
            $genre = $_POST['genre'];

            $bookModel = new Book();
            $result = $bookModel->add($title, $author, $publisher, $published_year, $genre);

            if( $result ){
                $_SESSION['flash_message'] = [
                    'type' => 'success',
                    'message' =>  "Book created."
                ];
            }
            else{
                $_SESSION['flash_message'] = [
                    'type' => 'error',
                    'message' =>  "Something want wrong, please try again"
                ];
            }

            header('Location: ' . BASE_URL.'/book/');
            exit;
        }
    }

    public function delete($id)
    {
        if (!is_numeric($id)) {
            http_response_code(400);

            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Invalid ID.'
            ];
            header('Location: ' . BASE_URL.'/book/');
            exit;
        }

        $bookModel = new Book();
        $success = $bookModel->deleteById($id);

        if ($success) {
             $_SESSION['flash_message'] = [
                'type' => 'success',
                'message' =>  "Book with ID $id has been successfully deleted."
            ];

        } else {
            http_response_code(404);
             $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' =>  "Book not found."
            ];
        }

        header('Location: ' . BASE_URL.'/book/');
        exit;
    }

    public function edit($id)
    {
         if (!is_numeric($id)) {
            http_response_code(400);
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Invalid ID.'
            ];
        }

        $bookModel = new Book();
        $record = $bookModel->getById($id);
        require 'views/books/edit.php';        
    }

    public function update(){

        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $publisher = $_POST['publisher'];
            $published_year = $_POST['published_year'];
            $genre = $_POST['genre'];

            $bookModel = new Book();
            $result = $bookModel->update($id, $title, $author, $publisher, $published_year, $genre);

            if( $result ){
                $_SESSION['flash_message'] = [
                    'type' => 'success',
                    'message' =>  "Book has been updated."
                ];
            }
            else {
                $_SESSION['flash_message'] = [
                    'type' => 'error',
                    'message' =>   $error[2]
                ];
            }

            header('Location: ' . BASE_URL.'/book/');
            exit;
        }
    }
}
