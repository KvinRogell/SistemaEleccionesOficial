<?php

class RegistroMunicipal{
    private $id;
    private $depa;
    private $muni;
    private $tags;
    private $tipo;
    private $cargo;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function getDepa() {
        return $this->depa;
    }

    public function getMuni() {
        return $this->muni;
    }

     public function getTags() {
        return $this->tags;
    }
    
    public function getTipo() {
        return $this->tipo;
    }

    public function getCargo() {
        return $this->cargo;
    }
    


    public function setDepa($depa) {
        $this->depa = $depa;
    }

    public function setMuni($muni) {
        $this->muni = $muni;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

}