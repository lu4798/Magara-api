<?php
/**
 * Created by PhpStorm.
 * Band: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Band;
class Band
{
    public $id;
    public $name;
    public $instrument;
    public $image;
    public $link;
    public $description;
    public function __construct($id, $name, $instrument,$image, $link,$description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->instrument = $instrument;
        $this->image = $image;
        $this->link = $link;
        $this ->description = $description;
    }
}