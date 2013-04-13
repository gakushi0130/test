<?php
/**
 * Created by index.php.
 * User: gakushi0130
 * Date: 13/04/11
 * Time: 1:58
 *
 */
echo phpinfo();



$dbhost = 'testdb.ct8kfjivc4hn.ap-northeast-1.rds.amazonaws.com';
$username = 'dbuser';
$password = 'adgj6789';
$dbname = 'testdb';

$link = mysql_connect($dbhost, $username, $password, $dbname);
mysql_select_db($dbname);

$result = mysql_query("SELECT * FROM mytable");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf ("ID: %s  Name: %s", $row["test_id"], $row["test_name"]);
}

mysql_free_result($result);

