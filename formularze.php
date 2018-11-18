<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lab4</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php

        function drukuj_form()
        {
            ?>
            <form action="formularze.php" method="POST" >
                <table>
                    <tbody>
                        <tr> <td>Nazwisko: </td>
                            <td><input name="nazw" size="30"/> </td>
                        </tr>
                        <tr> <td>Wiek: </td>
                            <td><input name="wiek" size ="30"/></td>
                        </tr>
                        <tr> <td>Państwo: </td>
                            <td>
                                <select name="kraj">
                                    <option value="Polska">Polska</option>
                                    <option value="Uganda">Uganda</option>
                                </select>
                            </td>
                        </tr>
                        <tr> <td>Adres e-mail: </td>
                            <td><input name="email" size ="30"/></td>
                        </tr>
                    </tbody>
                </table> 
                <h4>Zamawiam tutorial z języka:</h4>
                <p>
                    <?php
                    $tech = [
                        "PHP", "C/C++", "Java"
                    ];
                    foreach ($tech as $key => $value) {
                        echo '<input name="tech[]" type="checkbox" value="' . $value . '"/>' . $value . '';
                    }
                    ?>
                </p>
                <h4>Sposób zapłaty:</h4>
                <p>
                    <?php
                    $zaplata = [
                        "eurocard", "visa", "przelew bankowy"
                    ];
                    foreach ($zaplata as $key => $value) {
                        echo '<input name="zapłata" type="radio" value="' . $value . '"/>' . $value . '';
                    }
                    ?>
                <p>
                <input type="submit" value="Wyczyść" name="submit" />
                <input type="submit" value="Dodaj" name="submit" />
                <input type="submit" value="Pokaż" name="submit" />
                <input type="submit" value="Statystyki" name="submit" />
            </form>
            <?php

        }

        include_once("funkcje.php");
        drukuj_form();
        if (filter_input(INPUT_POST, "submit")) {
            $akcja = filter_input(INPUT_POST, "submit");
            switch ($akcja) {
                case "Dodaj":
                    dodaj();
                    break;
                case "Pokaż":
                    pokaz();
                    break;
                case "Wyczyść":
                    wyczysc();
                    break;
                case "Statystyki":
                    statystyki();
                    break;
            }
        }
        ?>

    </body>
</html>
