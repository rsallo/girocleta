<?php

// require the boostraping script
require './../../bootstrap.php';

use Girocleta\Shared\Models\StationsParser as StationsParser;


// define base URL
$girocleta_stations_url = 'http://www.girocleta.cat/ESTACIONS.aspx';



/**
 * Let's go scrapping
 *

 */

// request the page with station data
try {
    $response = Requests::get($girocleta_stations_url);
}
catch (Exception $e) {
    // ups, there is an error, log and exit
    $msg = $e->getMessage();
    echo $msg;
    return;
}

// ups, there is an error, log and exit
if ($response->status_code !== 200) {
    $msg = 'Response status '. $response->status_code;
    echo $msg;
    return;
}

// get HTML
$html = $response->body;

$stations = StationsParser::getStations($html);
$htmls = StationsParser::getHtmls($html);

var_export($htmls);die();
//var_export($stations);

foreach ($stations as $station) {
    var_export($station);
}

