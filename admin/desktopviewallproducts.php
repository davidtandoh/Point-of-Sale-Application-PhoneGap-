<!DOCTYPE html>

<html>
	<head>
		<title>Add To Stock</title>
        <script src="jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
           
	</head>
		<body>
            

            
         <?php

                require_once("stock.php");
                $obj = new stock( );
                $obj->getallproducts();
                //$row = $obj->fetch();

                
                echo "<table class='reportTable' width='100%' border ='1' align ='center'>";
                echo "<tr style= 'background-color:red; color: white; text-align: center'>
                <td>Product id</td><td>Barcode reading</td><td>Product name</td><td>Price</td><td>Quantity</td><td></td><td></td></tr>";

                $i = 0;
                while ( $row = $obj->fetch()){
                    $id = $row['productid'];
                    
                    if($i%2 == 0){
                    $style = "style ='background-color:pink'";
                    }
                    else
                    {
                    $style="style ='background-color: floralwhite' ";
                    }
                    echo "<tr $style>";
                    echo "<td>";
                    echo $row["productid"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["barcodereading"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["name"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["price"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["quantity"];
                    echo "</td>";


            echo "<tr>";
            $i++;
        //echo "<br>";
        }

			?>
    </script>
		</body>
</html>