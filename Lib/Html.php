<?php
namespace Lib;

class Html{
    public static function TableEnrollment($results){
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
                            $table .= "<td>#" . $row['EFY2011'] . "</td></tr>";

                        }
        $table .= "</tbody></table>";
        return $table;
        
    }
    public static function TableLiab($results){
        $table = "<table class='table table-striped table-hover '>
                                          <thead>
                                            <tr>
                                              <th>College Name</th>
                                              <th>Liabilities $</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        ";
        foreach($results as $row){
                        $table .= "<tr><td>" . $row['INSTNM'] . "</td>";
                        $table .= "<td>$" . $row['LIAB011'] . "</td></tr>";


                        }
        $table .= "</tbody></table>";
        return $table;
        
    }
    
       public static function TableAsse($results){
        $table = "<table class='table table-striped table-hover '>
                                          <thead>
                                            <tr>
                                              <th>College Name</th>
                                             <th>Assets $</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                        ";
        foreach($results as $row){
                        $table .= "<tr><td>" . $row['INSTNM'] . "</td>";
                        $table .= "<td>$" . $row['ASSE011'] . "</td></tr>";

                        }
        $table .= "</tbody></table>";
        return $table;
        
    }
       public static function TableAsseStudent($results){
           $i=1;
        $table = "<table class='table table-striped table-hover '>
                                          <thead>
                                            <tr>
                                                <th>Rank</th>
                                              <th>College Name</th>
                                                <th>Assets $</th>
                                                <th>Students #</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        ";
        foreach($results as $row){
                        $table .= "<tr><td>#" . $i . "</td>";
                        $table .= "<td>" . $row['INSTNM'] . "</td>";
                        $table .= "<td>$" . $row['ASSE011'] . "</td>";
                        $table .= "<td>#" . $row['EFY2011'] . "</td></tr>";
                        $i++;



                        }
        $table .= "</tbody></table>";
        return $table;
        
    }
    
    public static function TablePercent($results){
        $i=1;
        $table = "<table class='table table-striped table-hover '>
                                          <thead>
                                            <tr>
                                             <th>Rank</th>
                                              <th>College Name</th>
                                              <th>Enrollment for 2011</th>
                                              <th>Enrollment for 2010</th>
                                              <th>Percentage</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        ";
        foreach($results as $row){
                        $table .= "<tr><td>#" . $i . "</td>";
                        $table .= "<td>" . $row['INSTNM'] . "</td>";
                        $table .= "<td>#" . $row['EFY2011'] . "</td>";
                        $table .= "<td>#" . $row['EFY2010'] . "</td>";
                        $percent = 100*($row['EFY2011']/$row['EFY2010']);
                        $table .= "<td>%" . $percent . "</td></tr>";
                        $i++;


                        }
        $table .= "</tbody></table>";
        return $table;
        
    }
    
    
    
    
    
}






?>