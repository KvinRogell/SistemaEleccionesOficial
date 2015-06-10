<?php

class RegistroCandidato {
    private $id;
    private $dui;
    private $apellido;
    private $nombre;
    private $depa;
    private $muni;
    private $opcion;
    private $partidario;
    private $depas;
    private $munis;
    private $cargo;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function getDui() {
        return $this->dui;
    }
    
    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }


    public function getDepa() {
        return $this->depa;
    }

    public function getMuni() {
        return $this->muni;
    }

   
    public function getOpcion() {
        return $this->opcion;
    }

    public function getPartidario() {
        return $this->partidario;
    }

    public function getDepas() {
        return $this->depas;
    }

    public function getMunis() {
        return $this->munis;
    }

    public function getCargo() {
        return $this->cargo;
    }
    
    /** Generando Get */

    public function setDui($dui) {
        $this->dui = $dui;
    }


    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDepa($depa) {
        $this->depa = $depa;
    }

    public function setMuni($muni) {
        $this->muni = $muni;
    }

    public function setOpcion($opcion) {
        $this->opcion = $opcion;
    }

    public function setPartidario($partidario) {
        $this->partidario = $partidario;
    }


    public function setDepas($depas) {
        $this->depas = $depas;
    }

    public function setMunis($munis) {
        $this->munis = $munis;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

}