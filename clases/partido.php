<?php


class Partido {
    private $id;
    private $nombre;
    private $filename;
    private $dui;
    private $representante;
    private $depa;
    private $muni;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDui() {
        return $this->dui;
    }

    public function getFileName() {
        return $this->filename;
    }

    public function getRepresentante() {
        return $this->representante;
    }

    public function getDepa() {
        return $this->depa;
    }

    public function getMuni() {
        return $this->muni;
    }

     
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFilename($filename) {
        $this->filename = $filename;
    }

    public function setDui($dui) {
        $this->dui = $dui;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }

    public function setDepa($depa) {
        $this->depa = $depa;
    }

    public function setMuni($muni) {
        $this->muni = $muni;
    }


}
