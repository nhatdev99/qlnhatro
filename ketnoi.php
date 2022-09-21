<?php
class Connect{
    var $con=null;
    public function __construct($host,$user,$pass,$database){
        $this->con= mysqli_connect($host,$user,$pass,$database);
    }
    public function Excute($sql){
       $result =  mysqli_query($this->con,$sql);
       return $result ;
    }
   
   }
?>