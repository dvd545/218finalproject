<?php
namespace Lib;
use PDO;
class Sql{
    
    
    
    public static function connect($query){
        $host = "127.0.0.1";
		$dbname = "my_db";
		$user ="root";
		$pass = 'password';
		try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$STH = $DBH->query($query);	
        $results = $STH->fetchAll();
        return $results;
		$DBH = null;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
    }
}


?>