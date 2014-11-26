<?php

namespace Girocleta\Shared\Models;

class StationsParser
{

    public static function getStations($html)
    {
        /*
        Inside the HTML javascript code, each station has two lines:
            1. html[6]='<div style=\"width:210px; padding-right:10px;\"><div style=\"font-weight:bold;font-size:14px;\">07- Plaça Pere Calders</div><div>Plaça Pere Calders</div><div>Bicis lliures: 12</div><div>Aparcaments lliures: 6</div></div>';
            2. addMarker(6,41.973303,2.807035,12,6);
        */

        $html_stations = static::getHtmls($html);
        $marker_stations = static::getMarkers($html);


        if (count($html_stations) != count($marker_stations)) {
            // log but carry on
        }


        return $markers;
    }


    public static function getHtmls($html)
    {
        // $html = "</div></div>';addMarker(2,41.979468,2.817462,7,39);html[3]='<div style= lliures: 0</div></div>';addMarker(4,41.970731,2.819105,26,0);html[5]='<div style=";
        $regex = '/html\[([0-9]*)\].*">([0-9]+)- ([^<]+)<\/div><div>/';
        preg_match_all($regex, $html, $htmls_data, PREG_SET_ORDER);

        foreach ($htmls_data as $html_data) {
            $html_id = $html_data[1];

            $stations[$html_id] = array(
                'ext_id' => $html_data[2],
                'name' => $html_data[3]
            );
        }

        return $stations;
    }

    private static function getMarkers($html)
    {
        $stations = array();
        /*
        preg_match_all will set $markers to an array like this (2 matches):

        array(
            0 =>
                array(
                    0 => 'addMarker(2,41.979468,2.817462,7,39)',
                    1 => '2',
                    2 => '41.979468',
                    3 => '2.817462',
                    4 => '7',
                    5 => '39',
                ),
            1 =>
                array(
                    0 => 'addMarker(4,41.970731,2.819105,26,0)',
                    1 => '4',
                    2 => '41.970731',
                    3 => '2.819105',
                    4 => '26',
                    5 => '0',
                ),
        )
        */

        // $html = "</div></div>';addMarker(2,41.979468,2.817462,7,39);html[3]='<div style= lliures: 0</div></div>';addMarker(4,41.970731,2.819105,26,0);html[5]='<div style=";
        $regex = '/addMarker\(([0-9]+),([0-9\.]+),([0-9\.]+),([0-9]+),([0-9]+)\)/';
        preg_match_all($regex, $html, $markers_data, PREG_SET_ORDER);

        foreach ($markers_data as $marker_data) {
            $html_id = $marker_data[1];

            $stations[$html_id] = array(
                'lat' => $marker_data[2],
                'lon' => $marker_data[3],
                'bikes' => $marker_data[4],
                'frees' => $marker_data[5]
            );
        }

        return $stations;
    }
}