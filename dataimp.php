<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$loader = new Loader();
$data = $loader->openFile('data/collegename.csv');
$loader->writeDb($data);
class Loader{
	
	public function openFile($f){
		$firstln = true;
		$fields;
		$data;
		if($handle = fopen($f,"r")){
			//Getting the csv data.
			while($line = fgetcsv($handle)){
				if($firstln == true){
					$firstln = false;
					$fields = $line;
				}
				else{
				$data[] = array_combine($fields,$line);	
				}
			}
		fclose($handle);
		return $data;
		}else{
			//Error handling 
			echo "File opening failed " . $f;
		}
	}
	
	
	public function writeDb($data){
		$host = "127.0.0.1";
		$dbname = "my_db";
		$table = "college";
		try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname","root","password");
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		foreach($data as $record){
			$insert = null;
			foreach($record as $key => $value){
				$insert[] = $value;
			}
			print_r($insert);
			$STH = $DBH->prepare("insert into $table values(?,?)");
			$STH->execute($insert);	
		}
		
		
		$DBH = null;
		
		}
        
		catch(PDOException $e){
			echo $e->getMessage();
		}
			
	}
}
?>