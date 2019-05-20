<?php
/**
 * Created by PhpStorm.
 * Galery: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Video;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
class VideoController
{
    private $dao;
    public function __construct(ContainerInterface $container)
    {
        $dbConnection = $container['dbConnection'];
        $this->dao = new VideoDao($dbConnection);
    }
    function getAllVideos(Request $request, Response $response, array $args)
    {

        $videos = $this->dao->getAll();
        return $response->withJson($videos);
    }
    function getVideoById(Request $request, Response $response, array $args)
    {
        $video = $this->dao->getById($args['id']);
        return $response->withJson($video);
    }

}
