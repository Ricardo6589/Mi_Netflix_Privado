<?php

class Like {
    //ATRIBUTOS
    private $id; 
    private $id_usuarios;
    private $id_carteleras;
      

    public function __construct($id, $id_usuarios, $id_carteleras) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->id_usuarios = $id_usuarios;
        $this->id_carteleras = $id_carteleras;         
        
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_usuarios
     */ 
    public function getId_usuarios()
    {
        return $this->id_usuarios;
    }

    /**
     * Set the value of id_usuarios
     *
     * @return  self
     */ 
    public function setId_usuarios($id_usuarios)
    {
        $this->id_usuarios = $id_usuarios;

        return $this;
    }

    /**
     * Get the value of id_carteleras
     */ 
    public function getId_carteleras()
    {
        return $this->id_carteleras;
    }

    /**
     * Set the value of id_carteleras
     *
     * @return  self
     */ 
    public function setId_carteleras($id_carteleras)
    {
        $this->id_carteleras = $id_carteleras;

        return $this;
    }

    public static function getLikes($correo, $id_carteleras){
        include "conexion.php";               
        $sql = "SELECT u.correo, l.id_carteleras FROM likes l INNER JOIN usuarios u ON u.id = l.id_usuarios WHERE u.correo = '$correo' and l.id_carteleras = $id_carteleras";       
        $listaLikes = mysqli_query($conexion, $sql);         
        return $listaLikes->fetch_all(MYSQLI_ASSOC);
    }
}