<?php
namespace Lib;
new Lib\sql;

$check = sqlconnect("SHOW TABLES LIKE '".$table."'");

if(mysql_num_rows(mysql_query($check))==1){

    echo "Table exists";
    }else{
        echo "Table does not exist";



?>