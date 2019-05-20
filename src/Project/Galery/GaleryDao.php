<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 05/03/2019
 * Time: 10:18
 */

namespace Project\Galery;
use Project\Utils\ProjectDao;
class GaleryDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql= "SELECT * FROM GALERY";
        return $this->dbConnection->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM GALERY WHERE id =?";

        return $this->dbConnection->fetch($sql, array($id));
    }

    public function updateImage($imageId, $image)
    {
        $sql = "UPDATE GALERY SET name = ?, image = ?, description = ?, location =?, date =? WHERE id = ?";
        $this->dbConnection->execute($sql, array($image['name'], $image['image'], $image['description'],$image['location'],$image['date'], $imageId));

        return $this->getById($imageId);
    }

    public function createImage($image)
    {
        $sql = "INSERT INTO GALERY (name, image, description, location, date) VALUES (?, ?, ?, ?,?)";
        $id = $this-> dbConnection->insert($sql, array($image['name'], $image['image'], $image['description'],$image['location'],$image['date']));

       return $this->getById($id);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM GALERY WHERE id = ?";
        $this->dbConnection->execute($sql, array($id));
    }
}