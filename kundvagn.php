

<?php

if (isset($_SESSION["kundvagn"])) {
    $totPris = 0;
    echo "<br> Antal:" . "\t" ."Produkt:" . "\t" . "Märke:" . "\t" . "Typ:" . "\t" . "Pris: <br>";
    foreach ($_SESSION["kundvagn"] as $prod) {
        echo $prod["antal"] . "\t" . $prod["namn"] . "\t" . $prod["marke"] . "\t" . $prod["typ"] . "\t" . $prod["pris"] . " :-<br><br>";
        $totPris += $prod["pris"] * $prod["antal"];
    }
    echo "Totalt: " . $totPris . " :- <br>";
} else {
    $_SESSION["kundvagn"] = array();
}
if (isset($_GET["add_kundvagn"]) and $_GET["id"]) {
    $prodid = $_GET["id"];
    $laggTill = true;

    for ($i = 0; $i < count($_SESSION["kundvagn"]); $i++) {
        if ($_SESSION["kundvagn"][$i]["id"] == $_GET["id"]) {
            $_SESSION["kundvagn"][$i]["antal"] ++;
            $laggTill = false;
            break;
        }
    }
    if ($laggTill) {
        $hamtadProd = fetchProd($prodid);
        if (!empty($hamtadProd)) {
            $hamtadProd["antal"] = 1;
            array_push($_SESSION["kundvagn"], $hamtadProd);
        }
    }
    header("Location:?");
}

function fetchProd($id) {
    $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
    $sql = "SELECT * FROM produktregister WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $tmpProd = $stmt->fetch(PDO::FETCH_ASSOC);
    //Finns det något i $users skapas sessionen "inloggad"

    return $tmpProd;
}
