<?php
// SKAPA EGET NAMN_API

// steg 1 - ange lämpliga HTTP-headers------------------------------------------
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");
header("Content-Type: application/json; charset=UTF-8");

// steg 2 - skapa arrayer -------------------------------------------------------
$firstNames =
    ["Sara" => "female", "Alex" => "male", "Glen" => "male", "Glennifer" => "female", "Molly" => "female", "Göran" => "male"];
$lastNames =
    ["Eriksson", "Viktorsson", "Glensson", "Kattsson", "Svensson"];


//steg 3 - skapa 10 namn och sara i ny array ------------------------------------
function replaceChar($string)
{
    return preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
}

function createEmail($first, $last)
{
    $updated_first = replaceChar($first);
    $updated_last = replaceChar($last);
    $email = substr($updated_first, 0, 2) . strtolower(substr($updated_last, 0, 3)) . "@email.com";
    return $email;
}

$names = array();
for ($i = 0; $i < 10; $i++) {

    $first = array_rand($firstNames);
    $last = $lastNames[rand(0, 4)];
    $gender = $firstNames[$first];
    $age = rand(1, 100);
    $email = createEmail($first, $last);

    $name = array(
        "firstname" => $first,
        "lastame" => $last,
        "gender" => $gender,
        "age" => $age,
        "email" => $email
    );
    array_push($names, $name);
}
// print_r($names);

//steg 4 - konvertera PHP-arrayen ($names) till JSON -----------------------------
$json = json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


//steg 5 - Skicka JSON till klienten. --------------------------------------------
echo $json;
