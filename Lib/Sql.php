<?php
namespace Lib;
use PDO;
class Sql{
    public static function test(){
        echo 'test';
        
    }
    
    
    public static function connect($query){
        $host = "127.0.0.1";
		$dbname = "my_db";
		$user ="root";
		$pass = 'password';
		try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$STH = $DBH->query($query);		
		$this->content .= "<table border = 2>";
		$this->content .= "
			<tr>
				<th>College Name</th>
				<th>Enrollment</th>
			</tr>
		";
		
		while($rows = $STH->fetch()){
			$this->content .= "<tr>";
			$this->content .= "<td>" . $rows['INSTNM'] . "</td>";
			$this->content .= "<td>" . $rows['EFY2011'] . "</td>";
			$this->content .= "</tr>";
		}
		$this->content .= "</table>";
		
		$DBH = null;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
    }
}


?>