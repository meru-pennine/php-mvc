<?php
require_once 'models/News.php';

class NewsController {
    public function index() {
        $NewsModel = new News();
        $news = $NewsModel->getAll();
        require 'views/news/index.php';
    }

    public function topHeadline(){
    	$NewsModel = new News();
        $news = $NewsModel->topHeadline();
        require 'views/news/index.php';
    }
}
