<?php
/**
 * Created by PhpStorm.
 * Band: lulka
 * Date: 05/03/2019
 * Time: 10:18
 */

namespace Project\Band;
use Project\Utils\ProjectDao;


class BandDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM BAND";
        return $this->dbConnection->fetchAll($sql);
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM BAND WHERE id =?";
        return $this->dbConnection->fetch($sql, array($id));
    }

}