<?php
/**
 * Created by PhpStorm.
 * Shows: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Shows;
class Shows
{
    public $id;
    public $date;
    public $city;
    public $venue;
    public $tickets;
    public $availability;
    public function __construct($id, $date, $city,$venue, $tickets,$availability)
    {
        $this->id = $id;
        $this->date = $date;
        $this->city = $city;
        $this->venue = $venue;
        $this->tickets = $tickets;
        $this ->availability = $availability;
    }
}