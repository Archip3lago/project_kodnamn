<?php

if (!isset($_POST["sort"])) {
    $sql = "SELECT * FROM produktregister WHERE 1";
} else {
    if (isset($_POST["sort_pris"])) {
        $sql = "SELECT * FROM produktregister WHERE 1 ORDER BY " . $_POST["sort"] . "" . $_POST["sort_pris"] . " ";
    } else {
        $sql = "SELECT * FROM produktregister WHERE 1 ORDER BY ".$_POST["sort"].""; 
    }
}
echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $produktregister = $stmt->fetchAll();

    echo "<table border = '1'>";
    
    foreach ($produktregister as  $produkt) {

        echo "<tr>";
        echo "<td>" . $produkt[1] . "</td>"; //namn
        echo "<td>" . $produkt[2] . "</td>"; //märke
        echo "<td>" . $produkt[3] . "</td>"; //typ
        echo "<td>" . $produkt[4] . "</td>"; //pris
        echo "</tr>";
    }
    
    echo"</table>";
    
 

echo "<p id = 'sortby'>sort by:</p>";
echo "<form method = 'POST'>";
echo "<select name = 'sort'>";
echo "<option value = 'pris'>pris</option>";
echo "<option value = 'namn'>namn</option>";
echo "<option value = 'marke'>märke</option>";
echo "<option value = 'typ'>typ</option>";
echo "</select>";
echo "<input type = 'submit' value = 'sortby' name = 'submit'>";
echo "</form >";



if (isset($_POST["sort"]) and $_POST["sort"] === "pris") {
    echo "<p>sortera efter:</p>";
    echo "<form method = 'POST'>";
    echo "<select name = 'sort_pris'>";
    echo "<option value = 'ASC'>billigast</option>";
    echo "<option value = 'DESC'>dyrast</option>";
    echo "</select>";
    echo "<input type = 'submit' value = 'sortera'>";
    echo "</form>";
}
if (isset($_POST["sort_pris"])) {
    if ($_POST["sort_pris"] === "billigast") {
        $sql = "SELECT * FROM produktregister WHERE 1 ORDER BY pris ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $produktregister = $stmt->fetchAll();
    }
    if ($_POST["sort_pris"] === "dyrast") {
        $sql = "SELECT * FROM produktregister WHERE 1 ORDER BY pris DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $produktregister = $stmt->fetchAll();
    }
    echo "<table border = '1'>";
    foreach ($produktregister as  $produkt) {

        echo "<tr>";
        echo "<td>" . $produkt[1] . "</td>"; //namn
        echo "<td>" . $produkt[2] . "</td>"; //märke
        echo "<td>" . $produkt[3] . "</td>"; //typ
        echo "<td>" . $produkt[4] . "</td>"; //pris
    }
    echo"</table>";
}
if (isset($_POST["sort_namn"])) {
    
}

if (isset($_POST["sort_typ"])) {
    
}

if (isset($_POST["sort_marke"])) {
    
}
?>
