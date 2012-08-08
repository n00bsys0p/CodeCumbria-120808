<?php
    /**
     * PHP/MySQL PDO example.
     *
     * This file is to demonstrate how PDO can be used
     * to connect to a MySQL database safely and securely.
     * The old mysql_connect should be avoided, as making
     * connections which use it do so in a safe, secure
     * manner isn't particularly trivial.
     * 
     * @author  Xander Shepherd <n00b@n00bsys0p.co.uk>
     * @version 0.1
     * @package php-mysql-pdo-example
     */

    /**#@+
     * Constants
     */
    /**
     * MySQL Username
     */
    define('USERNAME', 'user');
    /**
     * MySQL Password
     */
    define('PASSWORD', 'password');
    /**
     * MySQL Hostname
     */
    define('HOSTNAME', 'localhost');
    /**
     * MySQL Database name
     */
    define('DBNAME', 'example');

    /* Always wrap in try/catch, as PDO uses exceptions
       for error handling */
    try {
        $dbh = new PDO("mysql:host=" . HOSTNAME . ";" . 
                       "dbname=" . DBNAME,
                       USERNAME, PASSWORD);
        $sth = $dbh->prepare('SELECT fname FROM names');
        $sth->execute();
        $sth->setFetchMode(PDO_FETCH_LAZY);
        foreach($sth as $row) {
            print $row->fname;
        }
        $dbh = NULL;
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

?>
