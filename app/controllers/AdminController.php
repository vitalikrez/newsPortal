<?php

class AdminController
{

    private $model;

    public function __construct()
    {
        try {
            // create db connection driver instance
            $dbh = Dbconn::getMySQL(
                MYSQL_DSN,
                MYSQL_USER,
                MYSQL_PASS
            );
        } catch (PDOException $e) {
            $error = 'Could not connect to database: ' . $e->getMessage();
            require_once VIEWS_DIR . '/error.php';
            exit;
        }

        // 1. create a model class instance
        $this->model = new News();

        // 2. set low level driver
        $this->model->setDriver($dbh);
    }

    public function home()
    {
        $index = null;
        $array = $this->model->getPageParam('post');
        $limit = $array['limit'];
        $page = $array['curPage'];

        if ($page > 0)
            $page--;
        if ($limit != null && ($page != null || $page >= 0)) {
            $posts = array_slice($array['dataTable'], $page * $limit, $limit);
            /*$arr = $posts;
            if (count($arr) > 0) {
                echo "<pre>";
                foreach ($arr as $value) {
                    print_r($value);
                    print_r(PHP_EOL);
                }
                echo "</pre>";
                
                    exit;
            }*/

            $index = count($posts) - 1 >= 0;
        }
        if ($index) {
            require_once VIEWS_DIR . '/homeAdmin.php';
        } else {
            $error = array();
            $error[] = 'База даних порожня!';
            require_once VIEWS_DIR . '/error.php';
        }
    }

    public function editPost()
    {
        $id = null;
        if (isset($_GET['id']))
            $id = $_GET['id'];
        else
        {
            $error = array();
            $error[] = 'Id не задане!';
        }
    }

    public function save()
    {
        require_once VIEWS_DIR . '/rezult.php';
    }
}
