<?php

namespace Girocleta\Shared\Models;

class Station
{
    public $ext_id;
    public $lat;
    public $lon;
    public $bikes;
    public $frees;
    
    public function __construct($ext_id, $lat, $lon, $bikes, $frees)
    {
        $this->ext_id = $ext_id;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->bikes = $bikes;
        $this->frees = $frees;
    }
}