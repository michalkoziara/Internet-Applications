<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function drukuj_form() {
            ?>
            <form action="formularze.php" method="POST" >
                <table border= 0>
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
                <p><input name="tech[]" type="checkbox" value="PHP"/>PHP
                    <input name="tech[]" type="checkbox" value="C/C++"/>C/C++
                    <input name="tech[]" type="checkbox" value="Java"/>Java </p>
                <h4>Sposób zapłaty:</h4>
                <p><input name="zapłata[]" type="radio" value="eurocard" />eurocard
                    <input name="zapłata[]" type="radio" value= "visa" />visa
                    <input name="zapłata[]" type="radio" value= "przelew bankowy" />przelew
                    bankowy<br/>
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
                case "Dodaj":dodaj();
                    break;
                case "Pokaż":pokaz();
                    break;
                case "Wyczyść":wyczysc();
                    break;
                case "Statystyki": statystyki();
                    break;
            }
        }
        ?>

    </body>
</html>