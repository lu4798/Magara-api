<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Galery;
class Galery
{
    public $id;
    public $name;
    public $description;
    public $image;
    public $location;
    public $date;
    public function __construct($id, $name, $image, $description, $location, $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->location = $location;
        $this->date = $date;
    }
}