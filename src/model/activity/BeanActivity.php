<?php

class BeanActivity
{
    private $idActividad;
    private $idInstructor;
    private $idTipo;
    private $nombre;
    private $duracion;
    private $horasPresencial;
    private $horasLinea;
    private $horasIndependiente;
    private $status;
    private $idClasificacion;
    private $idModalidad;
    private $dirigidoA;
    private $perfilIngreso;
    private $perfilEgreso;
    private $objetivo;
    private $temario;
    private $cupo;
    private $presentacion;

    public function __construct()
    {

    }

    public function constructSave($idTipo, $nombre, $duracion, $horasPresencial, $horasLinea, $horasIndependiente, $status, $idClasificacion, $idModalidad, $dirigidoA, $perfilIngreso, $perfilEgreso, $objetivo, $temario, $cupo, $presentacion)
    {
        $this->idTipo = $idTipo;
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->horasPresencial = $horasPresencial;
        $this->horasLinea = $horasLinea;
        $this->horasIndependiente = $horasIndependiente;
        $this->status = $status;
        $this->idClasificacion = $idClasificacion;
        $this->idModalidad = $idModalidad;
        $this->dirigidoA = $dirigidoA;
        $this->perfilIngreso = $perfilIngreso;
        $this->perfilEgreso = $perfilEgreso;
        $this->objetivo = $objetivo;
        $this->temario = $temario;
        $this->cupo = $cupo;
        $this->presentacion = $presentacion;
    }

    public function getIdActividad()
    {
        return $this->idActividad;
    }

    public function setIdActividad($idActividad)
    {
        $this->idActividad = $idActividad;
    }

    public function getIdInstructor()
    {
        return $this->idInstructor;
    }

    public function setIdInstructor($idInstructor)
    {
        $this->idInstructor = $idInstructor;
    }

    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function getHorasPresencial()
    {
        return $this->horasPresencial;
    }

    public function setHorasPresencial($horasPresencial)
    {
        $this->horasPresencial = $horasPresencial;
    }

    public function getHorasLinea()
    {
        return $this->horasLinea;
    }

    public function setHorasLinea($horasLinea)
    {
        $this->horasLinea = $horasLinea;
    }

    public function getHorasIndependiente()
    {
        return $this->horasIndependiente;
    }

    public function setHorasIndependiente($horasIndependiente)
    {
        $this->horasIndependiente = $horasIndependiente;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getIdClasificacion()
    {
        return $this->idClasificacion;
    }

    public function setIdClasificacion($idClasificacion)
    {
        $this->idClasificacion = $idClasificacion;
    }

    public function getIdModalidad()
    {
        return $this->idModalidad;
    }

    public function setIdModalidad($idModalidad)
    {
        $this->idModalidad = $idModalidad;
    }

    public function getDirigidoA()
    {
        return $this->dirigidoA;
    }

    public function setDirigidoA($dirigidoA)
    {
        $this->dirigidoA = $dirigidoA;
    }

    public function getPerfilIngreso()
    {
        return $this->perfilIngreso;
    }

    public function setperfilIngreso($perfilIngreso)
    {
        $this->perfilIngreso = $perfilIngreso;
    }

    public function getPerfilEgreso()
    {
        return $this->perfilEgreso;
    }

    public function setPerfilEgreso($perfilEgreso)
    {
        $this->perfilEgreso = $perfilEgreso;
    }

    public function getObjetivo()
    {
        return $this->objetivo;
    }

    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    }

    public function getTemario()
    {
        return $this->temario;
    }

    public function setTemario($temario)
    {
        $this->temario = $temario;
    }

    public function getCupo()
    {
        return $this->cupo;
    }

    public function setCupo($cupo)
    {
        $this->cupo = $cupo;
    }

    public function getPresentacion()
    {
        return $this->presentacion;
    }

    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;
    }
}
?>
