
<?php

class BeanInscripcion
{
    private $idInscripcion;
    private $idDocente;
    private $idActividad;
    private $fecha;
    private $idPerfil;
    private $trabajos;
    private $status;

    public function __construct($idInscripcion, $idDocente, $idActividad, $fecha, $idPerfil, $trabajos, $status)
    {
        $this->idInscripcion = $idInscripcion;
        $this->idDocente = $idDocente;
        $this->idActividad = $idActividad;
        $this->fecha = $fecha;
        $this->idPerfil = $idPerfil;
        $this->trabajos = $trabajos;
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

    public function getPaterno()
    {
        return $this->paterno;
    }

    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;
    }

    public function getMaterno()
    {
        return $this->materno;
    }

    public function setMaterno($materno)
    {
        $this->materno = $materno;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getGrado()
    {
        return $this->grado;
    }

    public function setGrado($grado)
    {
        $this->grado = $grado;
    }

    public function getDisciplina()
    {
        return $this->disciplina;
    }

    public function setDisciplina($disciplina)
    {
        $this->disciplina = $disciplina;
    }

    public function getIdUnidadAcademica()
    {
        return $this->idUnidadAcademica;
    }

    public function setIdUnidadAcademica($idUnidadAcademica)
    {
        $this->idUnidadAcademica = $idUnidadAcademica;
    }

    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
    }
}
?>
