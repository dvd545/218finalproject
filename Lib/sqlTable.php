<?php

namespace Lib;
public static function sqlTable(){
    $table .= "<table border = 1>";
		$table .= "
				<tr>
					<th>Screen name</th>
					<th>Tweet</th>
					<th>Time and Date of Tweet</th>
					<th>Tweeted by</th>
					
				</tr>
			
			";
				
			foreach($string as $items)
    		{
    			$table .="<tr>";
				$table .= "<td>". $items['$val']. "</td>";
				$table .="</tr>";
		   }
						
			
			$table .= "</table>";
			echo $table; 
		}




}



?>