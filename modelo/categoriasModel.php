<?php

class CategoriasModel
{
    private $listaCategorias;
    private $db;
    public function __construct()
    {
        $this->listaCategorias = array();
    }

  public function abrirConexion()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=huella', "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->db;
    }

    public function cerrarConexion(){
        $this->db=null;
    }

    public function getCategoriaById($idCategoria){
        $this->abrirConexion();
        $sql = "SELECT nombre FROM categoria WHERE idCategoria=$idCategoria";
        $categoria="";
        if (isset($this->db)) {
            try{
                $respuesta=$this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $categoria=$res["nombre"];
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }else{
            echo "La base de datos no está inicializada o no hay acceso a ella";
        }
        $this->cerrarConexion();
        return $categoria; 
    }
}
?>