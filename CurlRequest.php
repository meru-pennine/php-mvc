<?php

class CurlRequest {
    private $url;
    private $headers;
    private $response;

    public function __construct($url, $headers = []) {
        $this->url = $url;
        $this->headers = $headers;
    }

    private function sendRequest($method, $data = null) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if (!empty($this->headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        }

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $this->response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }

        curl_close($ch);
    }

    public function get() {
        $this->sendRequest('GET');
        return $this->response;
    }

    public function post($data) {
        $this->sendRequest('POST', $data);
        return $this->response;
    }

    public function put($data) {
        $this->sendRequest('PUT', $data);
        return $this->response;
    }

    public function delete($data = null) {
        $this->sendRequest('DELETE', $data);
        return $this->response;
    }
}
