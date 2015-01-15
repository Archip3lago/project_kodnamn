<?php

echo "<form method='POST' id='text_nyhet'>";
echo "<p>Länk till bild:</p><input type='text' name='bild'>";
echo "<p>Titel: (Max 20 tecken)</p><input type='text' name='titel'>";
echo "<p>Text: (Max 500 tecken)";
echo "<input type='submit' name='laggTill_nyhet' value='Done'>";
echo "</form>";

echo "<textarea form='text_nyhet' name='nyhet_text' cols='50' rows='15' wrap='soft'></textarea>";
//no work
if(isset($_POST["laggTill_nyhet"])){
    $tmp_link = filter_input(INPUT_POST, 'bild', FILTER_SANITIZE_SPECIAL_CHARS);
    $tmp_titel = filter_input(INPUT_POST, 'titel', FILTER_SANITIZE_SPECIAL_CHARS);
    $tmp_text = filter_input(INPUT_POST, 'nyhet_text', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = 'INSERT INTO `nyheter` (`bild`, `titel`, `text`) VALUES (:bild, :titel, :text)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":bild", $tmp_link);
    $stmt->bindParam(":titel", $tmp_titel);
    $stmt->bindParam(":text", $tmp_text);
    $stmt->execute();
    
    header("Location:?");
}