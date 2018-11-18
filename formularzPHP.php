<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <style>body{background:lightblue}</style>
        <h3>Przykładowy formularz HTML</h3>
        <form method="get" action="odbierz.php" enctype="text/plain">
            <table border= 0>
                <tbody>
                    <tr> <td>Nazwisko: </td>
                        <td><input name="nazwisko" size="30"/> </td>
                    </tr>
                    <tr> <td>Wiek: </td>
                        <td><input name="wiek" size ="30"/></td>
                    </tr>
                    <tr> <td>Państwo: </td>
                        <td>
                            <select name="wybor">
                                <option value="polska">Polska</option>
                                <option value="uganda">Uganda</option>
                            </select>
                        </td>
                    </tr>
                    <tr> <td>Adres e-mail: </td>
                        <td><input name="email" size ="30"/></td>
                    </tr>
                </tbody>
            </table> 
            <h4>Zamawiam tutorial z języka:</h4>
            <p><?php
                $tech = [
                    "C", "CPP", "Java", "C#", "Html", "CSS", "XML", "PHP",
                    "JavaScript"
                ];
                foreach ($tech as $key => $value) {
                    echo '<input name="tech[]" type="checkbox" value="' . $value . '"/>' . $value . '';
                }
                ?></p>
            <h4>Sposób zapłaty:</h4>
            <p><input name="zapłata[]" type="radio" value="euro" />eurocard
                <input name="zapłata[]" type="radio" value= "visa" />visa
                <input name="zapłata[]" type="radio" value= "przelew" />przelew
                bankowy<br/>
                <input type="submit" value="Wyślij" />
                <input type="reset" value="Anuluj" /></p>
        </form>

    </body>
</html>
