<?php
class model_Maq_Admin
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=martinezstaneck;charset=utf8', 'root', '');
  }

  public function listarMaquinas(){
  $maq_to_return =[];
  $select = $this->db->prepare("select * from maquina");
  $select->execute();
  $maquinas = $select->fetchAll(PDO::FETCH_ASSOC);
  foreach ($maquinas as $idMaq => $maquina) {
    $select = $this->db->prepare("select * from imagen where fk_id_maq=?");
    $select->execute(array($maquina['id_maq']));
    $images = $select->fetchAll(PDO::FETCH_ASSOC);
    $maquina['imagenes'] = $images;
    $maq_to_return[]=$maquina;
  }
  return $maq_to_return;
}


public function listarMaquina($id){
$maq_to_return =[];
$select = $this->db->prepare("select * from maquina where id_maq=?");
$select->execute(array($id));
$maq_return = $select->fetchAll(PDO::FETCH_ASSOC);
foreach ($maq_return as $idMaq => $maquina) {
  $select1 = $this->db->prepare("select * from datos_tecnicos where id_maq=?");
  $select1->execute(array($maquina['id_maq']));
  $datos = $select1->fetchAll(PDO::FETCH_ASSOC);
  $maquina['dat_tec'] = $datos;

  $select = $this->db->prepare("select * from imagen where fk_id_maq=?");
  $select->execute(array($maquina['id_maq']));
  $images = $select->fetchAll(PDO::FETCH_ASSOC);
  $maquina['imagenes'] = $images;
  $maq_to_return[]=$maquina;
}
return $maq_to_return;
}


 public function AgregarMaquina($nombre,$tipo,$precio,$images){
  $insert = $this->db->prepare("INSERT INTO maquina(nombre,tipo,precio,datos_tecnicos) VALUES(?,?,?,?)");
  $dat_Tec=0;
  $insert->execute(array($nombre,$tipo,$precio,$dat_Tec));
  $fk_id_maq = $this->db->lastInsertId();
  foreach ($images as $img => $image) {
  print_r($image);
    $path_image =  $this->copyImage($image);
    $insert = $this->db->prepare("INSERT INTO imagen(path, fk_id_maq) VALUES(?,?)");
    $insert->execute(array($path_image,$fk_id_maq));
   }
  return $this->listarMaquina($fk_id_maq);
}

public function agregarMaquinaAct($id_maq,$nombre,$tipo,$precio,$images){
 $insert = $this->db->prepare("update maquina set nombre=? where id_maq=?");
 $insert->execute(array($nombre,$id_maq));
 $insert = $this->db->prepare("update maquina set tipo=? where id_maq=?");
 $insert->execute(array($tipo,$id_maq));
 $insert = $this->db->prepare("update maquina set precio=? where id_maq=?");
 $insert->execute(array($precio,$id_maq));

 foreach ($images as $image) {
   $path_image =  $this->copyImage($image);
   $insert = $this->db->prepare("INSERT INTO imagen(path, fk_id_maq) VALUES(?,?)");
   $insert->execute(array($path_image,$id_maq));
  }
 return $this->listarMaquina($id_maq);
}


function copyImage($image){
    $path = 'images/'.uniqid().$image["name"];
    $path_upload='../'.$path;
    move_uploaded_file($image["tmp_name"], $path_upload);
    return $path;
  }

public function borrarMaquina($id_maq){
  $delete = $this->db->prepare("delete from maquina where id_maq=?");
  $delete->execute(array($id_maq));
  $return['status']= $delete->rowCount()==1 ? 'la tarea fue borrada con exito :)': 'ERROR!';
  return $return;

}



}

?>
