<?php
       
    try {
        include 'bd/db-config.php';
        $dbhost = $configArray['host'];
        $dbname = $configArray['dbnom'];
        $dbport = $configArray['port'];
        $dbcharset= $configArray['charset'];
        $dbuser = $configArray['user'];
        $dbpass = $configArray['password'];
        $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;port=$dbport;charset=$dbcharset", $dbuser, $dbpass);
    }catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
    }
?>