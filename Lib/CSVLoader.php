<?php
//namespace Lib;

ini_set('display_errors', 'On');
ini_set("memory_limit","-1");


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
*/
$databasehost = "127.0.0.1"; 
$databasename = "my_db"; 
$databasetable = "sample"; 
$databaseusername="root"; 
$databasepassword = ""; 
$fieldseparator = ","; 
$lineseparator = "\n";
$csvfile = "2011var.csv";

$db = new PDO("mysql:host=$databasehost;dbname=$databasename", 
        $databaseusername, $databasepassword);


$sql = "CREATE TABLE IF NOT EXISTS sample (
   varnumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	varname VARCHAR(200) NOT NULL,
	vartitle VARCHAR(200) NOT NULL,
)";

$sq = $db->query($sql);

if ($sq) {
	echo 'created';
}

/*
 if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

try {
    $pdo = new PDO("mysql:host=$databasehost;dbname=$databasename", 
        $databaseusername, $databasepassword,
        array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    die("database connection failed: ".$e->getMessage());
}

$affectedRows = $pdo->exec("
    LOAD DATA LOCAL INFILE ".$pdo->quote($csvfile)." INTO TABLE `$databasetable`
      FIELDS TERMINATED BY ".$pdo->quote($fieldseparator)."
      LINES TERMINATED BY ".$pdo->quote($lineseparator));

echo "Loaded a total of $affectedRows records from this csv file.\n";
*/
?>
 