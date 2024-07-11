<?php

class BeanArea
{
    private $id;
    private $nombre;

    public function __construct()
    {

    }

    public function constructSave($nombre)
    {
        $this->nombre = $nombre;
    }

    public function constructUpdate($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

}