<?php

class BeanUser
{
    private $idUsuario;
    private $usuario;
    private $password;
    private $nombre;
    private $paterno;
    private $materno;
    private $correo;
    private $idRol;

    public function __construct()
    {

    }

    public function constructSave($usuario, $password, $nombre, $paterno, $materno, $correo, $idRol)
    {
        $this->usuario = $usuario;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->correo = $correo;
        $this->idRol = $idRol;
    }

    public function constructUpdate($usuario, $nombre, $paterno, $materno, $correo)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->correo = $correo;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }


}