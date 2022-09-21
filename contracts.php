<?php
require_once "ketnoi.php";
class contract extends Connect{
  
    public function contractdelete($id){
        $query = "DELETE FROM `contract` where `db_id` = '$id'";
        return $this->Excute($query);
       
    }
    public function contractupdate($id,$room_id,$rent_time,$fullname,$sdt,$diachi,$cccd){
        $query = "UPDATE `rooms` SET `db_room_id`='$room_id',`db_rent_time`='$rent_time',`db_fullname`='$fullname',`db_sdt`='$sdt', `db_diachi` = '$diachi', `db_cccd` = '$cccd' WHERE `db_id`='$id'";
        return $this->Excute($query);
    }

    public function contractinsert($room_id,$rent_time, $gia, $fullname, $sdt, $diachi, $cccd){
        $query = "INSERT INTO `contract` (`db_room_id`, `db_rent_time`, `db_price`, `db_fullname`, `db_sdt`, `db_diachi`,`db_cccd`) VALUES ('$room_id','$rent_time', 
        '$gia', '$fullname','$sdt','$diachi', '$cccd')";
        return $this->Excute($query);
    }
    public function contractdone($id, $status) {
        $query = "UPDATE `contract` SET `db_status` = '$status' WHERE `db_id` = $id";
        return $this ->Excute($query);
    }
    public function roomsupdate($room_id,$trangthai) {
        $query = "UPDATE `rooms` SET `db_status` = '$trangthai' Where `db_id` = $room_id";
        return $this -> Excute($query);
    }
}
?>