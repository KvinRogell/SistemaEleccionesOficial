<?php


class RegistroVotante {
    private $id;
    private $dui;
    private $nombre;
    private $apellido;
    private $foto;
    private $sexo;
    private $fecha;
    private $direccion;
    private $depa;
    private $muni;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function getDui() {
        return $this->dui;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getDepa() {
        return $this->depa;
    }

    public function getMuni() {
        return $this->muni;
    }
    
    /** Generando Get */

    public function setDui($dui) {
        $this->dui = $dui;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setDepa($depa) {
        $this->depa = $depa;
    }

    public function setMuni($muni) {
        $this->muni = $muni;
    }

}