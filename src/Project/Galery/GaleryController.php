<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Galery;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
class GaleryController
{
    private $dao;
    public function __construct(ContainerInterface $container)
    {
        $dbConnection = $container['dbConnection'];
        $this->dao = new GaleryDao($dbConnection);
    }
    function getAllImages(Request $request, Response $response, array $args)
    {

        $image = $this->dao->getAll();
        return $response->withJson($image);
    }
    function getImageById(Request $request, Response $response, array $args)
    {
        $image = $this->dao->getById($args['id']);
        return $response->withJson($image);
    }

    function updateImage(Request $request, Response $response, array $args)
    {
        $imageId = $args['id'];
        $body = $request->getParsedBody();
        $image = $this->dao->createImage($body);
        return $response->withJson($image);
    }
    function createImage(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $image = $this->dao->createImage($body);
        return $response->withJson($image);

    }

    function deleteImage(Request $request, Response $response, array $args)
    {
        $imageId = $args['id'];
        $this->dao->delete($imageId);
        return $response->withStatus(201);
    }
}