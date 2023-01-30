<?php

class Cartelera {
    //ATRIBUTOS
    private $id; 
    private $titulo;
    private $descripcion;
    private $img;   

    public function __construct($id, $titulo, $descripcion,$img) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->img = $img;    
        
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
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }


public static function getCarteleras($filtro){
    include "conexion.php";
    if(empty($filtro)){
        $sql="SELECT * FROM carteleras";  
        $listaCarteleras = mysqli_query($conexion, $sql);        
        return $listaCarteleras->fetch_all(MYSQLI_ASSOC);            
     }else{         
        $filtro=$_POST['filtro'];
        $sql ="SELECT * FROM carteleras WHERE id LIKE '%".$filtro."%' OR titulo LIKE '%".$filtro."'";
        $listaCarteleras = mysqli_query($conexion, $sql);        
        return $listaCarteleras->fetch_all(MYSQLI_ASSOC);     
    }           
      
}


public static function getCartelerasId($id){
    include "conexion.php";       
    $sql = "SELECT * FROM carteleras WHERE id = $id";       
    $listaCarteleras = mysqli_query($conexion, $sql);          
    $listaCarteleras = mysqli_fetch_assoc($listaCarteleras);
    echo json_encode($listaCarteleras);
    return;
}

public static function crearCartelera($titulo, $descripcion,$img){
    include "conexion.php";
    $sql="INSERT INTO carteleras (titulo, descripcion,img) VALUES (?,?,?);";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"sss",$titulo, $descripcion,$img);
    mysqli_stmt_execute($stmt);
   
}

public static function Actualizar_Cartelera($id, $titulo, $descripcion,$img){
        
    include 'conexion.php';
    $sql = "UPDATE carteleras SET titulo = ?, descripcion = ?, img = ? WHERE id = ?";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"sssi",$titulo, $descripcion,$img,$id);
    mysqli_stmt_execute($stmt);       
    
}


public static function top5(){
    include "conexion.php";
    $sql="SELECT carteleras.*, count(likes.id_carteleras) as likes_carteleras
    FROM carteleras LEFT JOIN likes
    ON likes.id_carteleras = carteleras.id
    GROUP BY id
    ORDER BY likes_carteleras DESC LIMIT 5";

    $listaCarteleras = mysqli_query($conexion, $sql);        
    return $listaCarteleras->fetch_all(MYSQLI_ASSOC);

}

public static function CartelerasDisponibles(){
    include "conexion.php";
    $sql="SELECT carteleras.*, count(likes.id_carteleras) as likes_carteleras
    FROM carteleras LEFT JOIN likes
    ON likes.id_carteleras = carteleras.id
    GROUP BY id
    ORDER BY likes_carteleras DESC";

    $listaCarteleras = mysqli_query($conexion, $sql);        
    return $listaCarteleras->fetch_all(MYSQLI_ASSOC);

}

public static function TodasLasCarteleras($filtro2){    
    include "conexion.php";
    if(empty($filtro2)){
        $sql="SELECT * FROM carteleras";  
        $ListaCarteleras = mysqli_query($conexion, $sql);        
        return $ListaCarteleras->fetch_all(MYSQLI_ASSOC);            
     }else{         
        $filtro2=$_POST['filtro2'];
        $sql ="SELECT * FROM carteleras WHERE id LIKE '%".$filtro2."%' OR titulo LIKE '%".$filtro2."'";
        $ListaCarteleras = mysqli_query($conexion, $sql);        
        return $ListaCarteleras->fetch_all(MYSQLI_ASSOC);     
    }   

}


public static function getCartelerasLikesUsuario($user){
    include "conexion.php";
    $sql="SELECT img FROM carteleras c INNER JOIN likes l ON c.id = l.id_carteleras INNER JOIN usuarios u ON l.id_usuarios = u.id WHERE u.correo='$user'";
    $listaCarteleras = mysqli_query($conexion, $sql);        
    return $listaCarteleras->fetch_all(MYSQLI_ASSOC); 
   
}

}
