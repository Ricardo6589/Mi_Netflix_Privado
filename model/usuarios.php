<?php

class Usuario {
    //ATRIBUTOS
    private $id; 
    private $tipo;
    private $nombre;
    private $apellido;
    private $correo;  
    private $password;
    private $dni; 
    private $telefono;
    private $validacion; 

    public function __construct($id, $tipo, $nombre,$apellido, $correo,$password,$dni,$telefono,$validacion) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->apellido = $apellido;       
        $this->correo = $correo;
        $this->password = $password;       
        $this->dni = $dni;  
        $this->telefono = $telefono;
        $this->validacion=$validacion;      
        
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
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of validacion
     */ 
    public function getValidacion()
    {
        return $this->validacion;
    }

    /**
     * Set the value of validacion
     *
     * @return  self
     */ 
    public function setValidacion($validacion)
    {
        $this->validacion = $validacion;

        return $this;
    }


        
    public static function getUsuarios($filtro){
        include "conexion.php";
        if(empty($filtro)){
            $sql="SELECT * FROM usuarios";  
            $listaUsuarios = mysqli_query($conexion, $sql);        
            return $listaUsuarios->fetch_all(MYSQLI_ASSOC);            
         }else{         
            $filtro=$_POST['filtro'];
            $sql ="SELECT * FROM usuarios WHERE id LIKE '%".$filtro."%' OR tipo LIKE '%".$filtro."%' OR nombre LIKE '%".$filtro."%' OR apellido LIKE '%".$filtro."%' OR correo LIKE '%".$filtro."%' OR dni LIKE '%".$filtro."%'OR telefono LIKE '%".$filtro."'";
            $listaUsuarios = mysqli_query($conexion, $sql);        
            return $listaUsuarios->fetch_all(MYSQLI_ASSOC);     
        }           
          
    }

    
    public static function getUsuarioId($id){
        include "conexion.php";       
        $sql = "SELECT * FROM usuarios WHERE id = $id";       
        $ListaUsuarios = mysqli_query($conexion, $sql);       
        $ListaUsuarios = mysqli_fetch_assoc($ListaUsuarios);
        echo json_encode($ListaUsuarios);
        return;
    }

    
    public static function getTipoUsuario($correo){
        include "conexion.php";
        $sql="SELECT * FROM usuarios WHERE `correo`='$correo'";       
        $listaUsuarios = mysqli_query($conexion, $sql);        
        return $listaUsuarios->fetch_all(MYSQLI_ASSOC);      
          
    }

    public static function crearUsuario($tipo,$nombre,$apellido, $correo,$password,$dni,$telefono,$validacion){
        include "conexion.php";
        $sql="INSERT INTO usuarios (tipo,nombre,apellido,correo,password,dni,telefono,validacion) VALUES (?,?,?,?,?,?,?,?);";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"ssssssss",$tipo,$nombre,$apellido,$correo,$password,$dni,$telefono,$validacion);
        mysqli_stmt_execute($stmt);
       
    }

    
    public static function Actualizar_Usuario($id, $tipo,$nombre,$apellido,$correo,$password,$dni,$telefono){
        
        include 'conexion.php';
        $sql = "UPDATE usuarios SET tipo = ?, nombre = ?, apellido = ?, correo = ?, password = ?, dni = ?, telefono = ? WHERE id = ?";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"sssssssi",$tipo,$nombre,$apellido,$correo,$password,$dni,$telefono,$id);
        mysqli_stmt_execute($stmt);       
        
    }

}