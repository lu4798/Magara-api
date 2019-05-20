<?php

use Project\Band\BandController;
use Project\Contact\ContactController;
use Project\Galery\GaleryController;
use Project\Shows\ShowsController;
use Project\Users\UsersController;
use Project\Video\VideoController;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$authentication = $app->getContainer()->get('authentication');

$app->get('/users', UsersController::class . ':getAll');

$app->get('/user/{id}', UsersController::class .':getUsById');
$app->post('/user', UsersController::class .':createUser');

$app->put('/user/{id}',  UsersController::class .':updateUser')->add($authentication);
$app->delete('/user/{id}', UsersController::class .':deleteUser');
$app->post('/register',UsersController::class .':createUser');
$app->post('/login',UsersController::class .':loginUser');



$app->post('/contacto',ContactController::class .':sendMail');

$app->get('/galeria',GaleryController::class .':getAllImages');


$app->get('/conciertos',ShowsController::class .':getAllShows');
$app->get('/concierto/{id}', ShowsController::class .':getShowById');
$app->post('/conciertos',ShowsController::class .':createShow');
$app->delete('/concierto/{id}',ShowsController::class .':deleteShow');
$app->put('/concierto/{id}',ShowsController::class .':updateShow');

$app->get('/videos',VideoController::class .':getAllVideos');
$app->get('/grupo',BandController::class .':getAllMembers');





