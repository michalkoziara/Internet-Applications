<?php

function statystyki() {
     $file = "osoby.txt";
    $linecount = 0;
    $handle = fopen($file, "r");
    while (!feof($handle)) {
        $line = fgets($handle);
        $linecount++;
    }
    fclose($handle);
    $linecount -= 1;

    echo "<p>Liczba zamówień: <br /> $linecount </p>";
    
    $csv = array_map('str_getcsv', file($file));
    array_walk($csv, function(&$a) use ($csv) {
      $nazwy = array(
          'nazwisko',
          'wiek',
          'kraj',
          'email',
          'tech',
          'zaplata'
      );
      $a = array_combine($nazwy, $a);
    });
    
   $under18 = 0;
   $above50 = 0;
    foreach($csv as $value) {
        if($value['wiek']<18){
            $under18++;
        }     
        if($value['wiek']>50){
            $above50++;
        }
    }
    $linecount -= 1;
    echo "<p>Liczba zamówień: <br /> $linecount </p>";
    echo "<p>Liczba zamówień poniżej 18 roku życia: <br /> $under18 </p>";
    echo "<p>Liczba zamówień powyżej 18 roku życia: <br /> $above50 </p>";
}

function dodaj() {
    walidacja();
}

function pokaz() {
    $nazwa_pliku = "osoby.txt";
    if (is_file($nazwa_pliku) || is_readable($nazwa_pliku)) {
        $handle = fopen($nazwa_pliku, "r");
        while (!feof($handle)) {
            $line = fgets($handle);
            echo "$line <br/>";
        }
        fclose($handle);
    } else {
        print "Nie masz prawa do odczytu pliku lub plik $nazwa_pliku nie istnieje!";
    }
}

function wyczysc() {
    $nazwa_pliku = "osoby.txt";
    $myfile = fopen($nazwa_pliku, "w") or die("Nie mozna otworzyc!");
    fwrite($myfile, '');
    fclose($myfile);
}

function dopliku($plik, $tablicaDanych) {
    $dane = "";

    $dane .= $tablicaDanych['nazw'] . ", ";
    $dane .= $tablicaDanych['wiek'] . ", ";
    $dane .= $tablicaDanych['kraj'] . ", ";
    $dane .= $tablicaDanych['email'] . ", ";

    $tech = $tablicaDanych["tech"];
    for ($i = 0; $i < sizeof($tech); $i++) {
        $dane .= $tech[$i] . ' ';
    }
    $dane .= ", ";

    $zapłata = $tablicaDanych["zapłata"];
    for ($i = 0; $i < sizeof($zapłata); $i++) {
        $dane .= $zapłata[$i] . ' ';
    }

    $dane .= PHP_EOL;
    $myfile = fopen($plik, "a") or die("Nie mozna otworzyc!");
    fwrite($myfile, $dane);
    fclose($myfile);

    echo "<p>Zapisano: <br /> $dane</p>";
}

function walidacja() {
    $args = array(
        'nazw' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']
        ],
        'wiek' => ['filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1,
                'max_range' => 100]
        ],
        'email' => ['filter' => FILTER_VALIDATE_EMAIL
        ],
        'kraj' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'tech' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'zapłata' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ]
    );
    $dane = filter_input_array(INPUT_POST, $args);
    $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }
    if ($errors === "") {
        dopliku("osoby.txt", $dane);
    } else {
        echo "<br>Nie poprawnie dane: " . $errors;
    }
}
