<?php

class BeanRecurso
{
    private $id;
    private $recurso;

    public function __construct()
    {

    }

    public function constructSave($recurso)
    {
        $this->recurso = $recurso;
    }

    public function constructUpdate($recurso)
    {
        $this->recurso = $recurso;
    }

    public function getRecurso()
    {
        return $this->recurso;
    }

    public function setRecurso($recurso)
    {
        $this->recurso = $recurso;
    }

}