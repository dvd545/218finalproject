<?php
namespace Lib;
class sql{

    public function sqlConnect($query){
        $hostname = "127.0.0.1";
        $dbname = "my_db";
        $username = "root";
        $password = "password";
        try{
                $DBH = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
                $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(!empty == $query){
                     $STH = $DBH->query($query);
                
                }
                return $STH;



        }
        catch(PDOexception $e){
            echo $e->getMessage();


        }


    }
    
    ppublic function writeToDatabase($records,$table,$vals){
		$STH = sqlConnect();
		
		foreach($records as $record){
			$insert = null;
			foreach($record as $key => $value){
				$insert[] = $value;
			}
			
			print_r($insert);
			
			$STH = $STH->prepare("insert into $table $vals"); //$vals=values(?,?)
			$STH->execute($insert);	
		
		
		$DBH = null;
		
		
	
			
	}
    public function openFile($f){
		$firstLine = true;
		$fields;
		$data;
		if($handle = fopen($f,"r")){
			while($line = fgetcsv($handle)){
				if($firstLine == true){
					$firstLine = false;
					$fields = $line;
				}
				else{
				$data[] = array_combine($fields,$line);	
				}
			}
		fclose($handle);
		
		return $data;
		
		}
		else{
			echo "Failed to open the file " . $f;
		}
	}
    
    
    
}


?>




/*
ini_set('display_errors', 'On');
ini_set("memory_limit","-1");

error_reporting(E_ALL | E_STRICT);
$table= "college";
$csv = new CSVLoader();
$data = $csv->openFile('effy.csv');
$csv->writeToDatabase($data, $table);
class CSVLoader{
	
	public function openFile($f){
		$firstLine = true;
		$fields;
		$data;
		//Open the $f file and use r for read mode.
		if($handle = fopen($f,"r")){
			//Getting the csv data.
			while($line = fgetcsv($handle)){
				//Was it the first time?
				if($firstLine == true){
					$firstLine = false;
					$fields = $line;
				}
				else{
				//Adding the [] adds a new numerical index. 
				$data[] = array_combine($fields,$line);	
				}
			}
		fclose($handle);
		
		return $data;
		
		}
		else{
			//Could not open file!
			echo "Failed to open the file " . $f;
		}
	}
	
	
	public function writeToDatabase($records,$table){
		$host = "127.0.0.1";
		$dbname = "my_db";
		try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname","root","password");
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//Let's write to the database
		foreach($records as $record){
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

/*
$csv = new CSVLoader();
$data = $csv->openFile('2011var.csv');
$csv->writeToDatabase($data);
class CSVLoader{
	
	public function openFile($f){
		$firstLine = true;
		$fields;
		$data;
		//Open the $f file and use r for read mode.
		if($handle = fopen($f,"r")){
			//Getting the csv data.
			while($line = fgetcsv($handle)){
				//Was it the first time?
				if($firstLine == true){
					$firstLine = false;
					$fields = $line;
				}
				else{
				//Adding the [] adds a new numerical index. 
				$data[] = array_combine($fields,$line);	
				}
			}
		fclose($handle);
		
		return $data;
		
		}
		else{
			//Could not open file!
			echo "Failed to open the file " . $f;
		}
	}
	
	
	public function writeToDatabase($records){
		$host = "127.0.0.1";
		$dbname = "my_db";
		$table = "";
		try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname","root","");
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		foreach($records as $record){
			$insert = null;
			foreach($record as $key => $value){
				$insert[] = $value;
			}
			
			print_r($insert);
			
			$STH = $DBH->prepare("INSERT INTO $table values(?,?,?)");
			$STH->execute($insert);	
		}
		
		
		$DBH = null;
		
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		
	
			
	}
}
/*
$databasehost = "127.0.0.1"; 
$databasename = "my_db"; 
$databasetable = "sample"; 
$databaseusername="root"; 
$databasepassword = ""; 
$fieldseparator = ","; 
$lineseparator = "\n";
$csvfile = "2011var.csv";



 if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

try {
    $pdo = new PDO("mysql:host=$databasehost;dbname=$databasename", 
        $databaseusername, $databasepassword
        
    );
} catch (PDOException $e) {
    die("database connection failed: ".$e->getMessage());
}

$handle = fopen($csvfile, "r"); 

		$STMR = $pdo->prepare("TRUNCATE TABLE sample");
		$STMR->execute();
    



$STM = $pdo->prepare('INSERT INTO sample (varid, varname, vartitle) VALUES (?, ?, ?)');

			if ($handle !== FALSE) {
            
                    fgets($handle);
        		  while (($data = fgetcsv($handle, 1000, ',')) !== FALSE){
                  
                              	$STM->execute($data);
                                echo 'data insert';

                  }
                        		fclose($handle);

                        			$pdo = null; 

            
            }

echo 'test';



*/
?>
 