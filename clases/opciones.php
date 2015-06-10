

<?php


class Opciones {
    private $id;
    private $tipo;
    private $year;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getYear() {
        return $this->year;
    }

     
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setYear($year) {
        $this->year = $year;
    }


}
