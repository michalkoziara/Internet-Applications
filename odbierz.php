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
                echo 'Nazwisko: ' . $nazwisko . '<br />';
            } else {
                echo 'Nie wpisano nazwiska <br />';
            }

            if (isset($_REQUEST['wiek']) && ($_REQUEST['wiek'] != "")) {
                $wiek = htmlspecialchars(trim($_REQUEST['wiek']));
                echo 'Wiek: ' . $wiek . '<br />';
            } else {
                echo 'Nie wpisano wieku <br />';
            }


            if (isset($_REQUEST['wybor']) && ($_REQUEST['wybor'] != "")) {
                $wybor = htmlspecialchars(trim($_REQUEST['wybor']));
                echo 'Kraj: ' . $wybor . '<br />';
            } else {
                echo 'Nie wpisano kraju <br />';
            }

            if (isset($_REQUEST['email']) && ($_REQUEST['email'] != "")) {
                $email = htmlspecialchars(trim($_REQUEST['email']));
                echo 'Email: ' . $email . '<br />';
            } else {
                echo 'Nie wpisano emailu <br />';
            }

            if (isset($_REQUEST["tech"])) {
                $tech = $_REQUEST["tech"];
                echo 'Zamówiono tutoriale: ';
                for ($i = 0; $i < sizeof($tech); $i++) {
                    echo $tech[$i] . ' ';
                }
                echo '<br/>';
            } else {
                echo 'Nie wpisano tutoriali <br />';
            }

            if (isset($_REQUEST["zapłata"])) {
                $zapłata = $_REQUEST["zapłata"];
                echo 'Zapłata: ';
                for ($i = 0; $i < sizeof($zapłata); $i++) {
                    echo $zapłata[$i] . ' ';
                }
                echo '<br/>';
            } else {
                echo 'Nie wpisano zapłaty <br />';
            }
            ?>
        </div>

    </body>
</html>
