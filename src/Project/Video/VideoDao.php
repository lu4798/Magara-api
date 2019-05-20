<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 05/03/2019
 * Time: 10:18
 */

namespace Project\Video;
use Project\Utils\ProjectDao;


class VideoDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM VIDEO ORDER BY ranking";
        return $this->dbConnection->fetchAll($sql);

    }

    public function getById($id)
    {
        $sql = "SELECT * FROM VIDEO WHERE id =?";
        return $this->dbConnection->fetch($sql, array($id));
    }
}

