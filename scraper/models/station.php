<?php

class Station
{
    private $ext_id;
    private $lat;
    private $lon;
    private $bikes;
    private $frees;
    
    public function __construct($ext_id, $lat, $lon, $bikes, $frees)
    {
        $this->ext_id = $ext_id;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->bikes = $bikes;
        $this->frees = $frees;
    }
}