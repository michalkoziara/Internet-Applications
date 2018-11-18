<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ankieta</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php

        function drukuj_form()
        {

        ?>
            <form action="ankieta.php" method="POST" >
                <h2>Wybierz technologie, które znasz:</h2>

                <?php
                $tech = [
                    "C", "CPP", "Java", "C#", "Html", "CSS", "XML", "PHP", "JavaScript"
                ];
                foreach ($tech as $key => $value) {
                    echo '<input name="tech[]" type="checkbox" value="' . $value . '"/>' . $value . '<br/>';
                }
                ?>

                <input type="submit" value="Wyslij" name="submit" />
            </form>
            <?php
        }

        drukuj_form();
        
        ?>

    </body>
</html>
