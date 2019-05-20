<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Video;
class Video
{
    public $id;
    public $name;
    public $link;
    public $image;
    public function __construct($id, $name, $link, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
        $this->image = $image;

    }
}