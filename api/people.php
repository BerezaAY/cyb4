<?php

//симуляция - обычно здесь программный код, извекающий данные из реального источника (база данных)
$people = [
    array("firstName" => "Yuri", "lastName" => "Andrienko", "salary" => 12345),
    array("firstName" => "Vasya", "lastName" => "Pupkin", "salary" => 7777777),
    array("firstName" => "Yulia", "lastName" => "Yulkina", "salary" => 300000),
    array("firstName" => "Andrey", "lastName" => "Andreev", "salary" => 400000),
];

$letters = strtolower($_REQUEST["letters"]);

$results = [];
foreach($people as $person) {
    if (str_starts_with(strtolower($person["lastName"]), $letters)) {
        array_push($results, $person);
    }
}

echo(json_encode($results));