<?php
error_reporting(E_ALL);

ini_set('display_errors', '1');

require 'autoloader.php';

$program = new program();



class program{
	
	function __construct(){
		
		$page = 'home';
		$arg = NULL;
		
		if(isset($_REQUEST['page'])){
			$page = $_REQUEST['page'];
		}
		
		if(isset($_REQUEST['arg'])){
			$arg = $_REQUEST['arg'];
		}
		
		$page = new $page($arg);
		
	}
	
    }
	
abstract class page{
	
	public $content;
	
	function __construct($arg = NULL){
		
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			 $this->menu();
			$this->get();
		}
		else{
			
			$this->post();
		}
	}
	
    
	function menu(){
        $this->content .= '
		<ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=q1">Highest Enrollment</a></li>
            <li><a href="index.php?page=q2">Largest Total Liablility</a></li>
            <li><a href="index.php?page=q3">Largest Net Assets</a></li>
            <li><a href="index.php?page=q4">Largest Net Assets Per Students</a></li>
            <li><a href="index.php?page=q5">Largest Percent Increase</a></li>
            </ul>
        
        
        ';
        
				
	}
		
	function get(){
	}
	
	function post(){
	}
	
	function __destruct(){
		//Echo out some content
		echo $this->content;
	}
	
	
	
}



class home extends page{
	
	function get(){
        $this->content .= '
		  <h3>Web application that displays SQL queries and displays answers</h3>
        
        ';
		
	}
	
}
    

	



class q1 extends page{
    public function get(){
        $this->content .= '
        
            <div>
                <h1>Question1</h1>
                <h3>Colleges that have the highest enrollment</h3>
            
            </div>';
    
        
        $host = "127.0.0.1";
		$dbname = "my_db";
		$user ="root";
		$pass = 'password';
		try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$STH = $DBH->query("SELECT college.INSTNM, EFY2011 FROM enrollment INNER JOIN college ON enrollment.UNITID = college.UNITID ORDER BY enrollment.EFY2011 DESC ");		
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

    

class q2 extends page{

    public function get(){
        $this->content .= '
        
        <h3>Colleges with the largest amount of total liabilities</h3>
    
    ';
        
        
        
    }



}

class q3 extends page{

    public function get(){
        $this->content .= '
        
        <h3>Colleges with the largest amount of net assets</h3>
    
    ';
    }



}

class q4 extends page{

    public function get(){
        $this->content .= '
        
        <h3>Colleges with the largest amount of net assets per student</h3>
    
    ';
    }



}

class q5 extends page{

    public function get(){
        $this->content .= '
        
        <h3>Colleges with the largest percentage increase in enrollment between the years of 2011 and 2010</h3>
    
    ';
    }

}




    
?>