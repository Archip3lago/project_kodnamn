<?php

$sql = "SELECT * FROM nyheter WHERE 1";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $nyheter = $stmt->fetchAll();
                
                
                foreach($nyheter as $nyhet){
                    echo "<div class='nyhet'>";
                    echo "<img src=". $nyhet[1]." width='150' height='150'>";
                    echo "<h2>" . $nyhet[2] . "</h2>";
                    echo "<p>" . $nyhet[3] . "</p>";
                    echo "</div>";
                }