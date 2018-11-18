<?php
function wynik($plik, $tablicaDanych)
{
    $ankieta = [
        "C" => 0,
        "CPP" => 0,
        "Java" => 0,
        "C#" => 0,
        "Html" => 0,
        "CSS" => 0,
        "XML" => 0,
        "PHP" => 0,
        "JavaScript" => 0
    ];

    if (file_exists($plik)) {
        $csv = array_map(
            function ($v) {
                return str_getcsv($v, "\t");
            },
            file($plik)
        );
        array_walk(
            $csv,
            function (&$a) use ($csv) {
                $a = array_combine($csv[0], $a);
            }
        );
        array_shift($csv);

        foreach ($csv as $value) {
            $ankieta = [
                "C" => $value['C'],
                "CPP" => $value['CPP'],
                "Java" => $value['Java'],
                "C#" => $value['C#'],
                "Html" => $value['Html'],
                "CSS" => $value['CSS'],
                "XML" => $value['XML'],
                "PHP" => $value['PHP'],
                "JavaScript" => $value['JavaScript']
            ];
        }
    }

    $tech = $tablicaDanych["tech"];

    foreach ($tech as $key => $value) {
        $ankieta[$value]++;
    }

    echo '<h2>Wyniki:</h2><table><tr>';
    $naglowki = "";
    foreach ($ankieta as $key => $value) {
        $naglowki .= $key . "\t";
        echo '<th>' . $key . '</th>';
    }
    $naglowki .= PHP_EOL;

    echo '</tr><tr>';
    $dane = "";
    foreach ($ankieta as $key => $value) {
        $dane .= $value . "\t";
        echo '<td>' . $value . '</td>';
    }
    echo '</tr></table>';
    $dane .= PHP_EOL;

    $myfile = fopen($plik, "w+") or die("Nie mozna otworzyc!");
    fwrite($myfile, $naglowki . $dane);
    fclose($myfile);
}

function waliduj_glos()
{
    $args = array(
        'tech' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ]
    );

    $dane = filter_input_array(INPUT_POST, $args);
    $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false or $val === null) {
            $errors .= $key . " ";
        }
    }
    if ($errors === "") {
        wynik("ankieta.txt", $dane);
        return 1;
    } else {
        echo "<br>Nie poprawnie dane: " . $errors;
        return 0;
    }
}