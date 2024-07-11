<?php

class BeanType
{
    private $id;
    private $nombre;

    public function __construct()
    {

    }

    public function constructSave($tipo)
    {
        $this->tipo = $tipo;
    }

    public function constructUpdate($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

}