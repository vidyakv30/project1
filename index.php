<?php

//set the error reporting On

ini_set('display_errors', 'On');

error_reporting(E_ALL);

//Class to auto-load ther classes
class Manage
{
    public static function autoload($class)
    {
        include 'class/'.$class . '.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

//instantiate the program object
$obj = new main();

class main
{

    public function __construct()
    {
        //set to default page
        $pageRequest = 'homePage';
        //check for parameters
        if (isset($_REQUEST['page'])) {
            $pageRequest = $_REQUEST['page'];
        }
        //instantiate the class that is being requested
        $page = new $pageRequest;

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            $page->post();
        }

    }
}
?>
