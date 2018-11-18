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
        $student = array(
            '1234' => array(2, 2, 3), '1235' => array(5, 2, 3), '1236' => array(4, 2, 3), '1237' => array(5, 5, 5)
        );

        foreach ($student as $key => $value) {
            $suma = 0;
            foreach ($value as $ocena => $wartosc) {
                $suma = $suma + $wartosc;
            }
            echo 'student o indeksie ' . $key . ' ma średnią: ' . $suma / sizeof($value) . '<br/>';
        }
        ?>
    </body>
</html>
