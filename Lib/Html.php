<?php
namespace Lib;

class Html{
    public static function Table($results){
        $table = "<table class='table table-striped table-hover '>
                                          <thead>
                                            <tr>
                                              <th>College Name</th>
                                              <th> Enrollment #</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        ";
        foreach($results as $row){
                        $table .= "<tr><td>" . $row['INSTNM'] . "</td>";
                        $table .= "<td>" . $row['EFY2011'] . "</td></tr>";

                        }
        $table .= "</tbody></table>";
        return $table;
        
    }
}






?>