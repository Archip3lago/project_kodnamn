<?php
    if(isset($_SESSION["kundvagn"])){
        foreach ($_SESSION["kundvagn"] as $prod) {
            echo $prod[2];
            echo $prod[3];
            echo $prod[4];
            echo $prod[5];
        }
    }
  



if(isset($_GET["add_kundvagn"])){
    if(!isset($_SESSION["kundvagn"])){
        $_SESSION["kundvagn"];
    }
        $tmp_prodid = $_GET["id"];
        $cartArray[] = $tmp_prodkundvagn;
       
    }
