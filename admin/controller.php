<?php

    if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
    $cmd=$_REQUEST['cmd'];
    switch($cmd)
{
	case 1:
		addstock();	
		break;
	case 2:
		getallproducts();
		break;
    case 3:
		getQuantity();
		break;
    case 4:
		getnameandprice();
		break;
    
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}

    function addstock(){
        require_once("stock.php");
        $barcode = $_REQUEST['barcode'];
        $name =$_REQUEST['name'];
        $price=$_REQUEST['price'];
        $quantity = $_REQUEST['quantity'];
        $obj = new stock();
        if($obj->addstock($barcode,$name,$price,$quantity)){
		echo '{"result":1,"message": "Record added succesfully"}';
	   }
        else{
		echo '{"result":0,"message": "Error adding record."}';
	   }
        
    }

    function getallproducts(){
        require_once("stock.php");
        $obj = new stock();
        if($obj->getallproducts()){
            $row = $obj->getallproducts();
            echo'{"result":1,"stock":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting products"}';
    
}
        }

function send_mesg( $phoneNo, $message )
{
    include_once 'Smsgh/Api.php';
    
    $auth = new BasicAuth("yralkzfn","znbzlsho");
    
    $apiHost = new ApiHost($auth);
    $messageApi = new MessagingApi($apiHost);
    
    try
    {
        $messageResponse = $messageApi->sendQuickMessage("Important", $phoneNo, $message);
        
        if($messageResponse instanceof MessageResponse)
        {
            echo "msg1:".$messageResponse->getStatus()."</br></br>";
        }
        elseif ($messageResponse instanceof HttpResponse)
        {
            echo "\nServer Response Status: ".$messageResponse->getStatus()."</br></br>";
        }
        
        echo "</br>success done";
    }
    catch (Exception $ex)
    {
        echo 'Exception', $ex->getMessage(), "\n";
    }
}

function getQuantity(){
    include("stock.php");
        $obj=new stock();
        $message = $_REQUEST['message'];
        $components = explode(" ", $message);
        $productname = $components[0];
          
        if ($obj->getQuantity( $productname))
        {
            $row = $obj->fetch();
            echo "Quantity for ".$productname." is: ".$row['quantity'];
        }
        else
        { 
            echo "Failed to check product quantity";
        }
}

function getnameandprice(){
    include("stock.php");
        $obj=new stock();
        $barcode= $_REQUEST['barcodereading'];
          
       if ($obj->getnameandprice($barcode))
        {
             $row=$obj->fetch();
        echo '{"result":1 ,"stock":[';
        while($row){
            echo json_encode($row);
            $row = $obj->fetch();
            if($row){
                echo ",";
            }
        }
    echo "]}";
    
        }
        else
        { 
            echo "Failed get name for barcode reading";
        }
}

?>