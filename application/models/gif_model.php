<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class gif_model extends CI_Model
{
public function create($image,$order)
{
$data=array("image" => $image,"order" => $order);
$query=$this->db->insert( "tingblog_gif", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("tingblog_gif")->row();
return $query;
}
function getsinglegif($id){
$this->db->where("id",$id);
$query=$this->db->get("tingblog_gif")->row();
return $query;
}
public function edit($id,$image,$order)
{
$data=array("order" => $order);
if($image != "")
  $data['image']=$image;
$this->db->where( "id", $id );
$query=$this->db->update( "tingblog_gif", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `tingblog_gif` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `tingblog_gif` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `tingblog_gif` ORDER BY `id`
                    ASC")->row();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}

public function getgif()
{
  $query = $this->db->query("SELECT * FROM `tingblog_gif` WHERE 1 ORDER BY `order` ASC")->result();
  return $query;
}
}
?>
