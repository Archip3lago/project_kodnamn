<?php

if (!isset($_POST["sort"])) {
    $sql = "SELECT * FROM produktregister WHERE 1";
} else {
    if (isset($_POST["sort_pris"])) {
        $sql = "SELECT * FROM produktregister WHERE 1 ORDER BY " . $_POST["sort"] . " " . $_POST["sort_pris"] . " ";
    } else {
        $sql = "SELECT * FROM produktregister WHERE 1 ORDER BY ".$_POST["sort"].""; 
    }
}

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
        echo "<form method='GET'>";
        echo "<td> <input type='submit' value='add' name='add_kundvagn'></td>";
        echo "<input type='hidden' value='". $produkt[0] ."' name='id'>";
        echo "</form>";
        echo "</tr>";
    }
    
    echo"</table>";
   
echo "<p id = 'sortby'>sort by:</p>";
echo "<form method = 'POST'>";

//sortera eftewr
echo "<select name = 'sort'>";
echo "<option value = 'pris'>pris</option>";
echo "<option value = 'namn'>namn</option>";
echo "<option value = 'marke'>märke</option>";
echo "<option value = 'typ'>typ</option>";
echo "</select>";
//sorteringsordning
    echo "<select name = 'sort_pris'>";
    echo "<option value = 'ASC'>stigande</option>";
    echo "<option value = 'DESC'>fallande</option>";
    echo "</select>";

echo "<input type = 'submit' value = 'sortby' name = 'submit'>";
echo "</form >";

include 'kundvagn.php';

?>
