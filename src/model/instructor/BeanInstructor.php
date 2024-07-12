<?php

class BeanInstructor
{
    private $idInstructor;
    private $idUsuario;
    private $grado;
    private $idArea;
    private $institucion;
    private $telefono;
    private $idPerfil;
    private $semblanza;
    private $tiempoDocencia;

    public function __construct()
    {

    }

    public function constructSave($idUsuario, $grado, $institucion, $telefono, $idPerfil, $semblanza, $tiempoDocencia)
    {
        $this->idUsuario = $idUsuario;
        $this->grado = $grado;
        $this->institucion = $institucion;
        $this->telefono = $telefono;
        $this->idPerfil = $idPerfil;
        $this->semblanza = $semblanza;
        $this->tiempoDocencia = $tiempoDocencia;

    }

    public function getIdInstructor()
    {
        return $this->idInstructor;
    }

    public function setIdInstructor($idInstructor)
    {
        $this->idInstructor = $idInstructor;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getGrado()
    {
        return $this->grado;
    }

    public function setGrado($grado)
    {
        $this->grado = $grado;
    }

    public function getIdArea()
    {
        return $this->idArea;
    }

    public function setIdArea($idArea)
    {
        $this->idArea = $idArea;
    }

    public function getInstitucion()
    {
        return $this->institucion;
    }

    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
    }

    public function getSemblanza()
    {
        return $this->semblanza;
    }

    public function setSemblanza($semblanza)
    {
        $this->semblanza = $semblanza;
    }

    public function getTiempoDocencia()
    {
        return $this->tiempoDocencia;
    }

    public function setTiempoDocencia($tiempoDocencia)
    {
        $this->tiempoDocencia = $tiempoDocencia;
    }
}