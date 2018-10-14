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
        <div>
            <?php
            echo '<h2>Dane odebrane z formularza:</h2>';
            if (isset($_REQUEST['nazwisko']) && ($_REQUEST['nazwisko'] != "")) {
                $nazwisko = htmlspecialchars(trim($_REQUEST['nazwisko']));
                echo 'Nazwisko:' . $nazwisko . '<br />';
            } else
                echo 'Nie wpisano nazwiska <br />';
            //pozostałe instrukcje zbierające dane wysłane
            //z formularza w postaci parametrów żądania
            //...
            ?>
        </div>

    </body>
</html>
