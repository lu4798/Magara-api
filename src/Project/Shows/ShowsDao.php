<?php
/**
 * Created by PhpStorm.
 * Shows: lulka
 * Date: 05/03/2019
 * Time: 10:18
 */

namespace Project\Shows;
use Project\Utils\ProjectDao;


class ShowsDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM SHOWS ORDER BY date";
        return $this->dbConnection->fetchAll($sql);
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM SHOWS WHERE id =?";
        return $this->dbConnection->fetch($sql, array($id));
    }
    public function createShow($show)
    {
        $sql = "INSERT INTO SHOWS (date, city, venue, tickets, availability) VALUES (?, ?, ?, ?, ?)";
        $id = $this-> dbConnection->insert($sql, array($show['date'], $show['city'], $show['venue'], $show['tickets'], $show['availability']));
        return $this->getById($id);
    }

    public function updateShow($id, $show)
    {
        $sql = "UPDATE SHOWS SET date = ?, city = ?, venue = ?, tickets = ?, availability = ? WHERE id = ?";
        $this->dbConnection->execute($sql, array($show['date'], $show['city'], $show['venue'], $show['tickets'], $show['availability'], $id));

        return $this->getById($id);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM SHOWS WHERE id = ?";
        $this->dbConnection->execute($sql, array($id));
    }

}
