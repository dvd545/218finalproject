<?php
namespace Lib;

class SqlCommands {
    
    public function test($vals){
        $result = $vals +1;
        return $results;
    
    }

    public function sqlConnect($query){
        //connects to database and returns connection
        //if query is provided returns query results
        $hostname = "127.0.0.1";
        $dbname = "my_db";
        $username = "root";
        $password = "password";
        try{
                $DBH = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
                $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($query != NULL){
                     $STH = $DBH->query($query);
                     return $STH;

                
                }



        }
        catch(PDOexception $e){
            echo $e->getMessage();


        }


    }
    
    public static function writeToDatabase($records,$table,$vals){
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
    }
    
    public static function openFile($f){
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
