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

        function galeria($rows, $cols)
        {
            print("<style>body{background:lightblue}</style>");
            print("<h2 style='text-align: center; color: blue'>Galeria zdjec</h1>");
            print("<table>");
            for ($i = 0; $i < $rows; $i++) {
                print("<tr>");
                for ($j = 0; $j < $cols; $j++) {
                    $nazwa = 'obraz' . (($i * $cols) + ($j + 1));
                    print("<td><img src='obrazki/$nazwa.jpg' alt='$nazwa' /></td>");
                }
                print("</tr>");
            }
            print("</table>");
        }

        galeria(2, 5);

        ?>
    </body>
</html>
