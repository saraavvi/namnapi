<?php
// SKAPA EGET NAMN_API

// steg 1 - ange lämpliga HTTP-headers------------------------------------------
//lär mer här: https://stackoverflow.com/questions/10636611/how-does-access-control-allow-origin-header-work
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");
header("Content-Type: application/json; charset=UTF-8");


// steg 2 - skapa arrayer -------------------------------------------------------
$firstNames =
    ["Sara", "Alex", "Glen", "Glennifer", "Molly", "F6", "F7", "F8", "F9", "F10"];
$lastNames =
    ["Öberg", "Viktorsson", "Glensson", "L4", "L5", "L6", "L7", "L8", "L9", "L10"];


//steg 3 - skapa 10 namn och sara i ny array ------------------------------------
$names = array();

for ($i = 0; $i < 10; $i++) {
    $name = array(
        "firstname" => $firstNames[rand(0, 9)],
        "lastname" => $lastNames[rand(0, 9)]
    );
    array_push($names, $name);
}
//testar. behöver ej använda <pre> eftersom headern säger att resultatet inte är html, utan json. 
// print_r($names); 


//steg 4 - konvertera PHP-arrayen ($names) till JSON -----------------------------
$json = json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); // första av dessa viktigast. (den löser problem med svenska tecken bland annat). prettyprint ger snyggare utskrift i responsen.


//steg 5 - Skicka JSON till klienten. --------------------------------------------
echo $json;
