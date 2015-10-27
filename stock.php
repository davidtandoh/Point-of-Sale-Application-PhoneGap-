<?php
	include_once("adb.php");
class stock extends adb
{	
    
    function stock(){}
    
    function addstock($barcode, $name,$price,$quantity){
        $insert_query = "insert into stock set barcodereading ='$barcode',name='$name', price='$price',quantity='$quantity'";
		return $this->query($insert_query);
    }
    
    function getallproducts(){
        $select_query = "select * from stock";
        return $this->query($select_query);
    }
    
    function getQuantity($name){
        $select_query = "select quantity from stock where name='$name'";
        return $this->query($select_query);
    }
    
    function getnameandprice($barcode){
        $select_query = "select name,price from stock where barcodereading='$barcode'";
        return $this->query($select_query);
    }
    
    function getprice($barcode){
        $select_query = "select price from stock where barcodereading='$barocde'";
        return $this->query($select_query);
    }
    
    

}
?>