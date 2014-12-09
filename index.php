<?php
ini_set('display_errors', 'On');

require 'autoloader.php';
$stuff = \Lib\sql::sqlConnect('10');

$server = new program();



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
			
			$this->content();
		}else{
			
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
	
	function content(){
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

class q1 extends page{
    public function content(){
        $this->content .= '
        
            <div>
                <h1>Question 1</h1>
                <h3>shows the colleges that have the highest enrollment</h3>
            
            
            </div>';
    
    }


}

class q2 extends page{
    public function content(){
        $this->content .= '
        
            <div>
                <h1>Question 2</h1>
                <h3>Colleges with the highest liabilities</h3>
            
            
            </div>';
    
    }


}
class q3 extends page{
    public function content(){
        $this->content .= '
        
            <div>
                <h1>Question 3</h1>
                <h3>Colleges that have the highest net assets</h3>
            
            
            </div>';
    
    }


}

class q4 extends page{
    public function content(){
        $this->content .= '
        
            <div>
                <h1>Question 4</h1>
                <h3>Colleges that have the highest net assets per student</h3>
            
            
            </div>';
    
    }


}
class q extends page{
    public function content(){
        $this->content .= '
        
            <div>
                <h1>Question 1</h1>
                <h3>Colleges that have the highest percent increase enrollment</h3>
            
            
            </div>';
    
    }


}





?>

