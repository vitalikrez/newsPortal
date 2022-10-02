<?php

class News
{
    private $dbh;

    public function setDriver(PDO $dbh)
    {
        $this->dbh = $dbh;
    }
}
