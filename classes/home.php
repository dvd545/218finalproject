<?php
namespace classes;


	use \classes\page as page;
    class home extends page{

        function get(){
            $this->content = '
              <h3>Web application that displays SQL queries and answers</h3>

            ';

        }

    }


?>