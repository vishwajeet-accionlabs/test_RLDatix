<?php

class Database_weather{
    public function database_conn(){
        define('DB_SERVER', 'localhost:3308');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'openweather');
        
        $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
        if (mysqli_connect_errno()) {
            echo 'Failed to connect to DataBase: ' . mysqli_connect_error();
        }
        return $db;
    }
    
}

?>