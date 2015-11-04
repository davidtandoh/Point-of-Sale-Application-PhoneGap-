<?php
	include_once("adb.php");
class sales extends adb
{	
    
    function sales(){}
    
    function addsale($transactionid,$expenditure,$phone){
        $insert_query = "insert into sales set transactionid ='$transactionid', expenditure='$expenditure', customerphone='$phone'";
		return $this->query($insert_query);
    }
    
?>