<?php
namespace Classes;


abstract class page{
	
	public $content;
	
	function __construct(){
		
	}
	
	public function menu(){
        /*$this->content .= '
		<ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=q1">Highest Enrollment</a></li>
            <li><a href="index.php?page=q2">Largest Total Liablility</a></li>
            <li><a href="index.php?page=q3">Largest Net Assets</a></li>
            <li><a href="index.php?page=q4">Largest Net Assets Per Students</a></li>
            <li><a href="index.php?page=q5">Largest Percent Increase</a></li>
            </ul>
        
        
        ';*/
        
				
	}
		
	public function get(){
	}
	
	public function post(){
	}
	
	public function __destruct(){
                $this->heading();
			echo $this->content;	
    
    }
}
	
	
?>