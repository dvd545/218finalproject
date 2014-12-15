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
		echo $this->content;
	}
	
}
    

	
class homepage extends page{
	
	function get(){
		$this->content = //menu items
            
            
    }
}


class q1 extends page{
    public function get(){
        $this->content .= '
        
            <div>
                <h1>Question</h1>
                <h3>shows the colleges that have the highest enrollment</h3>
            
            
            </div>';
    
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