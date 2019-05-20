<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 19/03/2019
 * Time: 9:13
 */
namespace Project\Utils;

interface ProjectDao
{
    public function fetchAll($sql, $params = null);
    public function fetch ($sql, $params = null);
    public function execute ($sql, $params = null);
    public function insert($sql, $params = null);
}