<?php

require_once './db/AccesoDatos.php';

class Producto{
    public $id;
    public $nombre;
    public $descripcion;
    public $sector;
    public $precio;
    public $stock;

    static function GetArrayObj(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from producto");
        return $consulta->execute()? $consulta->fetchAll(PDO::FETCH_CLASS, "Producto"):null;		
    }
    function GuardarBD(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("
        INSERT INTO producto(nombre,descripcion,sector,precio,stock) 
        VALUES (:nombre,:descripcion,:sector,:precio,:stock)");
        $consulta->bindValue(':nombre',$this->nombre,PDO::PARAM_STR);
        $consulta->bindValue(':descripcion',$this->descripcion,PDO::PARAM_STR);
        $consulta->bindValue(':sector',$this->sector,PDO::PARAM_STR);
        $consulta->bindValue(':precio',$this->precio,PDO::PARAM_STR);
        $consulta->bindValue(':stock',$this->stock,PDO::PARAM_INT);
        return $consulta->execute();
    }
    static function ObtenerPorID(int $id){
        if($id <= 0)
            return null;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("select * from producto where id=:id");
        $consulta->bindValue(':id',$id,PDO::PARAM_INT);
        return $consulta->execute()? $consulta->fetchObject("Producto"):null;		
    }
    static function ObtenerPorNombre(string $nombre){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("select * from producto where nombre=:nombre");
        $consulta->bindValue(':nombre',$nombre,PDO::PARAM_STR);
        return $consulta->execute()? $consulta->fetchObject("Producto"):null;		
    }
}
?>