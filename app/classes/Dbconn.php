<?php

class Dbconn
{
    public static function getMySQL($dsn, $user, $pass = '')
    {
        $dbh = new PDO($dsn, $user, $pass);
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $dbh;
    }
}