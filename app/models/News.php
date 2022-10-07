<?php

class News
{
    private $dbh;

    public function setDriver(PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * Get info from database with limit from $_GET
     * @param mixed $objectName name table to fetch ('posts', 'comments', etc)
     * @return $arr info about max and min pages, current page, data and limits from database
     */
    public function getPageParam($objectName /*, PDO $dbh*/ /*$connect_Path = MYSQL_DSN, $connect_User = MYSQL_USER, $connect_Password = MYSQL_PASS*/)
    {
        $limitAll = 100000;   //Ліміт всіх виймаючих значень
        //якщо є такий параметр і він ціле - врахувати, в іншому випадку по замовчуванню
        try {
            if (isset($_GET['limitAll']))
                $limitAll = intval($_GET['limitAll']) != 0 ? intval($_GET['limitAll']) : $limitAll;
        } finally {
        }
        if ($this->dbh == null) {
            $error = [];
            $error[] = 'Could not connect to database: ';
            require_once VIEWS_DIR . '/error.php';
            exit;
        }
        /*$dbh = null;
    try {
        $dbh = Dbconn::getMySQL($connect_Path, $connect_User, $connect_Password);
    } catch (PDOException $e) {
        $error = 'Could not connect to database: ' . $e->getMessage();
        require_once VIEWS_DIR . '/error.php';
        exit;
    } finally {
     
    }*/

        $dataTable = null;
        $sqlS = "SELECT * FROM $objectName LIMIT $limitAll;";
        $sthS = $this->dbh->query($sqlS);
        if ($sthS != false) {
            $posts = $sthS->fetchAll(PDO::FETCH_ASSOC);
            $dataTable = $posts;
        }
        $sthS = null;
        //$dbh = null;

        $limit = 6;
        //врахувати якщо ціле. Інше - по замовчуванню
        try {
            if (isset($_GET['limit']))
                $limit = intval($_GET['limit']) != 0 ? intval($_GET['limit']) : $limit;
        } finally {
        }
        try {
            $maxPage = ceil(count($dataTable) / $limit);
            $maxPage = intval($maxPage);    //Щоб точно був int
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $curPage = 1;
        if (isset($_GET['curPage'])) {
            $curPage = $_GET['curPage'];
            if ($curPage > $maxPage)
                $curPage = $maxPage;
            if ($curPage < 1)
                $curPage = 1;
        }

        $arr = array(
            'limitAll' => $limitAll,
            'limit' => $limit,
            'maxPage' => $maxPage,
            'curPage' => $curPage,
            'dataTable' => $dataTable
        );

        return $arr;
    }
}
