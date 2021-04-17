<?php
namespace App;
use Core\Router;


Router::GET('/','IndexController@auth');
Router::GET('/get/receiver/all','ReceiverController@get_receivers');
