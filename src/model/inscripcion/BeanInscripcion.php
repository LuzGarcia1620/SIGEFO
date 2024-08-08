
<?php

class BeanInscripcion
{
    private $idInscripcion;
    private $idDocente;
    private $idActividad;
    private $fecha;
    private $idPerfil;
    private $tresanios;
    private $status;

    public function __construct($idInscripcion, $idDocente, $idActividad, $fecha, $idPerfil, $tresanios, $status)
    {
        $this->idInscripcion = $idInscripcion;
        $this->idDocente = $idDocente;
        $this->idActividad = $idActividad;
        $this->fecha = $fecha;
        $this->idPerfil = $idPerfil;
        $this->tresanios = $tresanios;
        $this->status = $status;
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

    public function getFecha($Fecha)
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
    }
    public function getTresanios($tresanios)
    {
        return $this->tresanios;
    }

    public function setTresanios($resanios)
    {
        $this->tresanios = $sexoTresanios;
    }

    public function getStatus($status)
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }


}
?>
