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
        echo "_GET<br/>";
        foreach ($_GET as $key => $value) {
            echo "$key - $value<br/>";
        }
        echo "<br/>print_r<br/>";
        print_r($_GET);
        echo "<br/>var_dump<br/>";
        var_dump($_GET);
        
        echo "<br/>_POST<br/>";
        foreach ($_POST as $key => $value) {
            echo "$key - $value<br/>";
        }
        echo "<br/>print_r<br/>";
        print_r($_POST);
        echo "<br/>var_dump<br/>";
        var_dump($_POST);
        ?>
    </body>
</html>
