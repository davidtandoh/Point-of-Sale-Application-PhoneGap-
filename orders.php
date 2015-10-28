<?php
	include_once("adb.php");
class orders extends adb
{	
    
    function orders(){}
    
    function addorder($barcode, $name,$price,$quantity){
        $insert_query = "insert into orders set barcodereading ='$barcode',name='$name', price='$price',quantity='$quantity'";
		return $this->query($insert_query);
    }
    
    function getallproducts(){
        $select_query = "select * from orders";
        return $this->query($select_query);
    }
    
    function getQuantityofOrder($name){
        $select_query = "select quantity from stock where name='$name'";
        return $this->query($select_query);
    }
    
    function getnameandpriceofOrder($barcode){
        $select_query = "select name,price from order where barcodereading='$barcode'";
        return $this->query($select_query);
    }
    
    function getpriceofOrder($barcode){
        $select_query = "select price from order where barcodereading='$barocde'";
        return $this->query($select_query);
    }
    
    

}
?>