<?php
/**
 * Created by PhpStorm.
 * Band: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Band;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
class BandController
{
    private $dao;
    public function __construct(ContainerInterface $container)
    {
        $dbConnection = $container['dbConnection'];
        $this->dao = new BandDao($dbConnection);
    }
    function getAllMembers(Request $request, Response $response, array $args)
    {

        $member = $this->dao->getAll();
        return $response->withJson($member);
    }

}