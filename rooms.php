<?php
require_once "ketnoi.php";
class rooms extends Connect{
  
    public function roomdelete($id){
        $query = "DELETE FROM `rooms` where `db_id` = '$id'";
        return $this->Excute($query);
       
    }
    public function roomupdate($id,$kv_id,$gia,$trangthai){
        $query = "UPDATE `rooms` SET `db_kv_id`='$kv_id',`db_price`='$gia',`db_status`='$trangthai' WHERE `db_id`='$id'";
        return $this->Excute($query);
    }

    public function roominsert($sophong, $dc_id,$gia,$trangthai){
        $query = "INSERT INTO `rooms` (`db_sophong`, `db_dc_id`, `db_price`, `db_status`) VALUES ('$sophong', '$dc_id','$gia',$trangthai)";
        return $this->Excute($query);
    }
    public function kvdelete($id){
        $query = "DELETE FROM `khuvuc` where `db_id` = '$id'";
        return $this->Excute($query);
       
    }
    public function kvupdate($khuvuc){
        $query = "UPDATE `khuvuc` SET `db_khuvuc` = '$khuvuc'";
        return $this->Excute($query);
    }

    public function kvinsert($khuvuc){
        $query = parent::Excute("INSERT INTO `khuvuc` (`db_khuvuc`) VALUES ('$khuvuc')");
        return $query;
    }
    public function diachiinsert($kv_id, $diachi) {
        $query = "INSERT INTO `diachi` (`db_kv`, `db_diachi`) VALUES ('$kv_id', '$diachi')";
        return $this -> Excute($query);
    }
    public function dcdelete($id){
        $query = "DELETE FROM `diachi` where `db_id` = '$id'";
        return $this->Excute($query);
       
    }
}
?>