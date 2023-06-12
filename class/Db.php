<?php

class Db
{
    private static object $dbh;

    public static function getConnection(): object
    {
        if (!isset(self::$dbh)) {
            /* Connect to a MySQL database using driver invocation */
            try {
                self::$dbh = new PDO(DB_DSN, DB_USER_ROOT, DB_PASSWD_ROOT);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return self::$dbh;
    }
}
//    public static function getConnectionInsert(): object
//    {
//        if (!isset(self::$dbh)) {
//            /* Connect to a MySQL database using driver invocation */
//            try {
//                self::$dbh = new PDO(DB_DSN, DB_USER_INSERT, DB_PASSWD_INSERT);
//            } catch (PDOException $e) {
//                echo 'Connection failed: ' . $e->getMessage();
//            }
//        }
//        return self::$dbh;
//    }
//
//    public static function getConnectionSelect(): object
//    {
//        if (!isset(self::$dbh)) {
//            /* Connect to a MySQL database using driver invocation */
//            try {
//                self::$dbh = new PDO(DB_DSN, DB_USER_SELECT, DB_PASSWD_SELECT);
//            } catch (PDOException $e) {
//                echo 'Connection failed: ' . $e->getMessage();
//            }
//        }
//        return self::$dbh;
//    }
//
//    public static function getConnectionUpdate(): object
//    {
//        if (!isset(self::$dbh)) {
//            /* Connect to a MySQL database using driver invocation */
//            try {
//                self::$dbh = new PDO(DB_DSN, DB_USER_UPDATE, DB_PASSWD_UPDATE);
//            } catch (PDOException $e) {
//                echo 'Connection failed: ' . $e->getMessage();
//            }
//        }
//        return self::$dbh;
//    }
//
//    public static function getConnectionDelete(): object
//    {
//        if (!isset(self::$dbh)) {
//            /* Connect to a MySQL database using driver invocation */
//            try {
//                self::$dbh = new PDO(DB_DSN, DB_USER_DELETE, DB_PASSWD_DELETE);
//            } catch (PDOException $e) {
//                echo 'Connection failed: ' . $e->getMessage();
//            }
//        }
//        return self::$dbh;
//    }
//}
//
