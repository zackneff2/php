<?php

require('../vendor/autoload.php');
include('signin.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  render('signin.php');
});

$app->post('/signinProcess.php', function() use($app) {
	$app['monolog']->appDebug('loggin output.');
	
})

$app->run();

?>
<h1>Hello</h1>