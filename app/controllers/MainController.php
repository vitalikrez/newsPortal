<?php

class MainController
{

    private $model;

    public function __construct()
    {
        try {
           //create db connection driver instance
            $dbh = Dbconn::getMySQL(
                MYSQL_DSN,
                MYSQL_USER,
                MYSQL_PASS
            );
        } catch (PDOException $e) {
            $error = 'Could not connect to database: ' . $e->getMessage();
           // require_once VIEWS_DIR . '/error.php';
           $page = 'error';
           require_once VIEWS_PATH."/master.php";
            exit;
         }

        // 1. create a model class instance
        $this->model = new News();

        // 2. set low level driver
        $this->model->setDriver($dbh);
    }

    public function home()
    {
        $index = true;
        if ($index) {
           // require_once VIEWS_DIR . '/home.php';
           $page = 'home';
           require_once VIEWS_PATH."/master.php";
        } else {
            $error = array();
            $error[] = 'База даних порожня!';
            //require_once VIEWS_DIR . '/error.php';
            $page = 'error';
           require_once VIEWS_PATH."/master.php";
        }
    }

    public function about()
    {
       // require_once VIEWS_DIR . '/about.php';
        $page = 'about';
        require_once VIEWS_PATH."/master.php";

    }

    public function news()
    {
       // require_once VIEWS_DIR . '/news.php';
       $page = 'news';
       require_once VIEWS_PATH."/master.php";
    }


}
