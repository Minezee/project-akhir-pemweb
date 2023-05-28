<?php

class connectDB {
    public $mysqli;

    public function __construct() {
        // sesuaiin sama yg di local device kamu
        $this->mysqli = new mysqli('localhost', 'root', '', 'fp');
    }
}