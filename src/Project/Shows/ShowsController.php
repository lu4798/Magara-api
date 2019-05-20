<?php
/**
 * Created by PhpStorm.
 * Shows: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Shows;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
class ShowsController
{
    private $dao;
    public function __construct(ContainerInterface $container)
    {
        $dbConnection = $container['dbConnection'];
        $this->dao = new ShowsDao($dbConnection);
    }
    function getAllShows(Request $request, Response $response, array $args)
    {

        $shows = $this->dao->getAll();
        return $response->withJson($shows);
    }
    function getShowById(Request $request, Response $response, array $args)
    {
        $show = $this->dao->getById($args['id']);
        return $response->withJson($show);
    }

    function updateShow(Request $request, Response $response, array $args)
    {
        $showId = $args['id'];
        $body = $request->getParsedBody();
        $show = $this->dao->updateShow($showId, $body);
        return $response->withJson($show);
    }

    function createShow(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $show = $this->dao->createShow($body);
        return $response->withJson($show);
    }

    function deleteShow(Request $request, Response $response, array $args)
    {
        $showId = $args['id'];
        $this->dao->delete($showId);
        return $response->withStatus(201);
    }
}