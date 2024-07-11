
<?php

class BeanDocente
{
    private $idDocente;
    private $nombre;
    private $paterno;
    private $materno;
    private $sexo;
    private $edad;
    private $correo;
    private $grado;
    private $disciplina;
    private $idUnidadAcademica;
    private $idPerfil;

    public function __construct($nombre, $paterno, $materno, $sexo, $edad, $correo, $grado, $disciplina, $idUnidadAcademica, $idPerfil)
    {
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->sexo = $sexo;
        $this->edad = $edad;
        $this->correo = $correo;
        $this->grado = $grado;
        $this->disciplina = $disciplina;
        $this->idUnidadAcademica = $idUnidadAcademica;
        $this->idPerfil = $idPerfil;
    }

    public function getIdDocente()
    {
        return $this->idDocente;
    }

    public function setIdDocente($idDocente)
    {
        $this->idDocente = $idDocente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
