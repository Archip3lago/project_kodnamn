<?php

$sql = "SELECT * FROM produktregister WHERE 1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$produktregister = $stmt->fetchAll();


echo "<table border='1'>";

foreach ($produktregister as $produkt) {

    echo "<tr>";
    echo "<td>" . $produkt[0] . "</td>"; //id
    echo "<td>" . $produkt[1] . "</td>"; //namn
    echo "<td>" . $produkt[2] . "</td>"; //märke
    echo "<td>" . $produkt[3] . "</td>"; //typ
    echo "<td>" . $produkt[4] . "</td>"; //pris

    echo" <td>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='delete_prod' value='$produkt[0]'>";
    echo "<input type='submit' value='ta bort'>";
    echo "</form>";
    echo "</td>";

    echo" <td>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='edit_prod' value='$produkt[0]'>";
    echo "<input type='submit' value='redigera'>";
    echo "</form>";
    echo "</td>";

    echo "</tr>";
}
echo"</table>";

echo "<h1>Registrera produkter</h1>";
echo "<form method='POST'>";
echo "<p>Namn</p>";
echo "<input type='text' name='prod_namn'>";
echo "<p>Märke</p>";
echo "<input type='text' name='prod_marke'>";
echo "<p>Typ</p>";
echo "<input type='text' name='prod_typ'>";
echo "<p>Pris</p>";
echo "<input type='number' name='prod_pris'>";
echo "<input type='submit' value='registrera' name='registrera'>";
echo "</form>";

if (isset($_POST["registrera"])) {
    $tmp_produktnamn = filter_input(INPUT_POST, 'prod_namn', FILTER_SANITIZE_SPECIAL_CHARS);
    $tmp_produktmarke = filter_input(INPUT_POST, 'prod_marke', FILTER_SANITIZE_SPECIAL_CHARS);
    $tmp_produkttyp = filter_input(INPUT_POST, 'prod_typ', FILTER_SANITIZE_SPECIAL_CHARS);
    $tmp_produktpris = filter_input(INPUT_POST, 'prod_pris', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = 'INSERT INTO `produktregister` (`namn`, `marke`, `typ`, `pris`) VALUES (:prod_namn, :prod_marke, :prod_typ, :prod_pris)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":prod_namn", $tmp_produktnamn);
    $stmt->bindParam(":prod_marke", $tmp_produktmarke);
    $stmt->bindParam(":prod_typ", $tmp_produkttyp);
    $stmt->bindParam(":prod_pris", $tmp_produktpris);
    $stmt->execute();
}

if (isset($_POST["delete_prod"])) {

    $tmp_produktid = $_POST["delete_prod"];
    $sql = 'DELETE FROM `produktregister` WHERE id ="' . $tmp_produktid . '"';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    echo "Produkten: " . $tmp_produktid . " har tagits bort ur produktregistret.";
    header("Location:?");
}

if (isset($_POST["edit_prod"])) {
    $tmp_produktid = $_POST["edit_prod"];
    $sql = 'SELECT FROM `produktregister` WHERE id ="' . $tmp_produktid . '"';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    echo "<h1>Redigera produkt</h1>";
    echo "<form method='POST'>";
    echo "<p>Produktnamn</p>";
    echo "<input type='text' name='prod_namn' value='$produkt[1]'>";
    echo "<p>Märke</p>";
    echo "<input type='text' name='prod_marke' value='$produkt[2]'>";
    echo "<p>Typ</p>";
    echo "<input type='text' name='prod_typ' value='$produkt[3]'>";
    echo "<p>Pris</p>";
    echo "<input type='number' name='prod_pris' value='$produkt[4]'>";
    echo "<input type='hidden' name='id' value='$tmp_produktid'>";
    echo "<input type='submit' value='redigera' name='redigera'>";
    echo "</form>";

   
}
 if (isset($_POST["redigera"])) {
        $upd_produktnamn = filter_input(INPUT_POST, 'prod_namn', FILTER_SANITIZE_SPECIAL_CHARS);
        $upd_produktmarke = filter_input(INPUT_POST, 'prod_marke', FILTER_SANITIZE_SPECIAL_CHARS);
        $upd_produkttyp = filter_input(INPUT_POST, 'prod_typ', FILTER_SANITIZE_SPECIAL_CHARS);
        $upd_produktpris = filter_input(INPUT_POST, 'prod_pris', FILTER_SANITIZE_SPECIAL_CHARS);
        $upd_produktid = $_POST["id"];
        $sql = 'UPDATE `produktregister` SET `namn`=:prod_namn,`marke`=:prod_marke,`typ`=:prod_typ,`pris`=:prod_pris WHERE id="'. $upd_produktid .'"';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":prod_namn", $upd_produktnamn);
        $stmt->bindParam(":prod_marke", $upd_produktmarke);
        $stmt->bindParam(":prod_typ", $upd_produkttyp);
        $stmt->bindParam(":prod_pris", $upd_produktpris);
        $stmt->execute();
        header("Location:?");
    }
