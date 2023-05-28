<?php

require_once(__DIR__ . "/../model/connectDB.php");

class DestinasiWisata {
    private $database;
    protected $tableName = "destinasiwisata1";

    public function __construct() {
        $this->database = new connectDB();
        $this->database = $this->database->mysqli;
    }

    public function addDestinasiWisata($nama, $deskripsi, $galeri, $lokasi) {
        $galeriJSON = json_encode($galeri);

        // id auto increment jadi diisi ''
        // default komentar json kosong
        $queryString = "INSERT INTO $this->tableName VALUES(
            '',
            '$nama',
            '$deskripsi',
            '$galeriJSON',
            '$lokasi',
            '{}'
        )";
        return $this->database->query($queryString);
    }

    public function addKomentar($idDestinasiWisata, $komentar) {
        $idDestinasiWisata = (int)$idDestinasiWisata;
        $listKomentar = $this->database->query("SELECT komen FROM $this->tableName WHERE id = $idDestinasiWisata")->fetch_assoc();
        $listKomentar = json_decode($listKomentar['komen'], true);
        // print_r($listKomentar);
        $sekarang = date("Y-m-d H:i:s");
        $listKomentar[$sekarang] = $komentar;
        $listKomentar = json_encode($listKomentar);
    
        $queryString = "UPDATE $this->tableName
            SET komen = '" . $this->database->real_escape_string($listKomentar) . "'
            WHERE id = $idDestinasiWisata
        ";
        // echo "<pre>";
        // echo $queryString;
        // echo "<pre>";
        return $this->database->query($queryString);
    }

    public function getSingle($id) {
        $id = (int)$id;
        $queryString = "SELECT * FROM $this->tableName WHERE id = $id";
        $destinasiWisata = $this->database->query($queryString)->fetch_assoc();
        return $destinasiWisata;
    }

    public function getAll() {
        $destinasiWisata = $this->database->query("SELECT * FROM $this->tableName");

        $rows = array();
        while ($row = $destinasiWisata->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function getMany($name) {
        $destinasiWisata = $this->database->query("SELECT * FROM $this->tableName WHERE nama REGEXP '$name'");

        $rows = array();
        while ($row = $destinasiWisata->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    
}