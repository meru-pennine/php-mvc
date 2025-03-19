<?php
require_once 'CurlRequest.php';

class News {
    private $news = [];
    private $news_top_headline = [];
    public $news_endpoint = '';
    private $news_api_token = '';

    public function __construct() {

        $this->news_endpoint = 'https://newsapi.org/v2/';
        $this->news_api_token = NEWS_API_KEY;
    }

    public function getAll() {

        $url = $this->news_endpoint.'everything?q=bitcoin&page=1&apiKey='.$this->news_api_token;
        try {

            $curl = new CurlRequest($url);
            $response = $curl->get();

            $result = json_decode($response);
            if( isset($result->status) && $result->status == 'ok'){
                $this->news = $result->articles;
            } 

        } catch (Exception $e) {
            $this->news = $e->getMessage();
        }

        return $this->news;
    }

    public function topHeadline() {

        $url = $this->news_endpoint.'top-headlines?country=us&page=1&apiKey='.$this->news_api_token;
        
        //echo $url; die;
        try {

            $curl = new CurlRequest($url);
            $response = $curl->get();

            $result = json_decode($response);
            if( isset($result->status) && $result->status == 'ok'){
                $this->news_top_headline = $result->articles;
            } 

        } catch (Exception $e) {
            $this->news_top_headline = $e->getMessage();
        }


        return $this->news_top_headline;
    }
}
