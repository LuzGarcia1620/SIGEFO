
<?php

class BeanInscripcion
{
    private $idInscripcion;
    private $idDocente;
    private $idActividad;
    private $fecha;
    private $hora;
    private $evaluacion;
    private $comentarios;
    private $cuentaMoodle;
    private $passMoodle;

    public function __construct()
    {

    }

    public function constructEditIns($evaluacion, $comentarios, $cuentaMoodle, $passMoodle)
    {
        $this->evaluacion = $evaluacion;
        $this->comentarios = $comentarios;
        $this->cuentaMoodle = $cuentaMoodle;
        $this->passMoodle = $passMoodle;
    }

    public function getIdInscripcion()
    {
        return $this->idInscripcion;
    }

    public function setIdInscripcion($idInscripcion)
    {
        $this->idInscripcion = $idInscripcion;
    }

    public function getIdDocente()
    {
        return $this->idDocente;
    }

    public function setIdDocente($idDocente)
    {
        $this->idDocente = $idDocente;
    }

    public function getIdActividad($idActividad)
    {
        return $this->idActividad;
    }

    public function setIdActividad($idActividad)
    {
        $this->idActividad = $idActividad;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getHora()
    {
        return $this->hora;
    }
    public function setHora($hora)
    {
        $this->hora = $hora;
    }
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }
    public function setEvaluacion($evaluacion)
    {
        $this->evaluacion = $evaluacion;
    }
    public function getComentarios()
    {
        return $this->comentarios;
    }
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }
    public function getCuentaMoodle()
    {
        return $this->cuentaMoodle;
    }
    public function setCuentaMoodle($cuentaMoodle)
    {
        $this->cuentaMoodle = $cuentaMoodle;
    }
    public function getPassMoodle()
    {
        return $this->passMoodle;
    }
    public function setPassMoodle($passMoodle)
    {
        $this->passMoodle = $passMoodle;
    }
}
