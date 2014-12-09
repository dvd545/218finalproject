<?php
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
			
			$this->get();
		}
		else{
			
			$this->post();
		}
	}
	
	function menu(){
				
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
		$this->content = '
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
	
}