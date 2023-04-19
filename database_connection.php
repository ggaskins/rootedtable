<?php
// database_connection.php
$dsn = "pgsql:host=db-postgresql-nyc1-13384-do-user-13891110-0.b.db.ondigitalocean.com;port=25060;dbname=defaultdb;sslmode=require";
$username = "doadmin";
$password = "AVNS_tY0-ikN7l6QQNrdcNRJ";

try {
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
