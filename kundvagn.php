

<?php

if (isset($_SESSION["kundvagn"])) {
    foreach ($_SESSION["kundvagn"] as $prod) {
        echo "<br> Produkt:" . "\t" . "Märke:" . "\t" . "Typ:" . "\t" . "Pris: <br>";
        echo $prod[1] . "\t" . $prod[2] . "\t" . $prod[3] . "\t" . $prod[4];
    }
    
}

if (isset($_GET["add_kundvagn"]) and $_GET["id"]) {
    $prodid = $_GET["id"];
    $hamtadProd = fetchProd($prodid);
    if (!empty($hamtadProd)) {
       array_push($_SESSION["kundvagn"], $hamtadProd);
//       $_SESSION["kundvagn"] = $hamtadProd;
    }
    header("Location:?");
}

function fetchProd($id) {
    $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
    $sql = "SELECT * FROM produktregister WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $tmpProd = $stmt->fetchAll();
    //Finns det något i $users skapas sessionen "inloggad"
    if (empty($tmpProd)) {
        echo "din kod är fel, fuck you carl!";
    }
    return $tmpProd[0];
}
