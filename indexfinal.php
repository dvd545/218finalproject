<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/journal/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
      <nav class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="indexfinal.php">Home</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sql Queries <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="indexfinal.php?page=q1">Highest Enrollment</a></li>
            <li><a href="indexfinal.php?page=q2">Largest Total Liablility</a></li>
            <li><a href="indexfinal.php?page=q3">Largest Net Assets</a></li>
            <li><a href="indexfinal.php?page=q4">Largest Net Assets Per Students</a></li>
            <li><a href="indexfinal.php?page=q5">Largest Percent Increase</a></li>

        </ul>
      </li>
        
    </ul>
</nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 style="text-align:center">IS 218 Final Project</h1>
        <p style="text-align:center">Web application that displays lists of colleges. Created by David Schmidt</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
            
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
                    $this->get();
            }

            function get(){
            }

            function __destruct(){
                echo $this->content;
            }
        }
        class home extends page{
            function get(){
                $this->content .= '<h3>Queries are sent to a SQL database and return the top 20 answers to the following</h3>';
                }

            }

        class q1 extends page{
            public function get(){
                $query = "SELECT c.INSTNM, e.EFY2011 FROM enrollment e INNER JOIN college c on e.UNITID=c.UNITID ORDER BY e.EFY2011 DESC LIMIT 20";
                $results = \Lib\Sql::connect($query);
                $table = \Lib\Html::TableEnrollment($results);
                $this->content .= '<div><h3>Colleges that have the highest enrollment</h3></div>';
                $this->content .= $table;

            }


        }
        class q2 extends page{
            public function get(){
                $this->content .= '<h3>Colleges with the largest amount of total liabilities</h3>';
                $query = "SELECT c.INSTNM, f.LIAB011 FROM college c INNER JOIN finance f ON c.UNITID=f.UNITID ORDER BY f.LIAB011 DESC LIMIT 20";
                $results = \Lib\Sql::connect($query);
                $table = \Lib\Html::TableLiab($results);
                $this->content .= $table;



            }
        }

        class q3 extends page{
            public function get(){
                $this->content .= '<h3>Colleges with the largest amount of net assets</h3>';
                $query = "SELECT c.INSTNM, f.ASSE011 FROM college c INNER JOIN finance f ON c.UNITID=f.UNITID ORDER BY f.ASSE011 DESC LIMIT 20";
                $results = \Lib\Sql::connect($query);
                $table = \Lib\Html::TableAsse($results);
                $this->content .= $table;

            }
        }

    class q4 extends page{
        public function get(){
            $this->content .= '<h3>Colleges with the largest amount of net assets per student</h3>';
            $query = "SELECT c.INSTNM, e.EFY2011, f.ASSE011 FROM college c INNER JOIN finance f ON f.UNITID=c.UNITID INNER JOIN enrollment e ON c.UNITID=e.UNITID ORDER BY (f.ASSE011/e.EFY2011) DESC LIMIT 20";
            $results = \Lib\Sql::connect($query);
            $table = \Lib\Html::TableAsseStudent($results);
            $this->content .= $table;
        }
    }

    class q5 extends page{
        public function get(){
            $this->content .= '<h3>Colleges with the largest percent increase in enrollment from 2010-2011</h3>';
            $query = "SELECT c.INSTNM, e.EFY2011, e.EFY2010 FROM college c INNER JOIN enrollment e ON e.UNITID=c.UNITID ORDER BY(e.EFY2011/ e.EFY2010) *100 DESC LIMIT 20";
            $results = \Lib\Sql::connect($query);
            $table = \Lib\Html::TablePercent($results);
            $this->content .= $table;
        }
    }

        ?>

            
          <a href="indexfinal.php?page=q1" class="btn btn-success btn-lg btn-block">Colleges that have the highest enrollment</a>
          <a href="indexfinal.php?page=q2" class="btn btn-success btn-lg btn-block">Colleges with the largest amount of total liabilities</a>
          <a href="indexfinal.php?page=q3" class="btn btn-success btn-lg btn-block">Colleges with the largest amount of net assets</a>
          <a href="indexfinal.php?page=q4" class="btn btn-success btn-lg btn-block">Colleges with the largest amount of net assets per student</a>
          <a href="indexfinal.php?page=q5" class="btn btn-success btn-lg btn-block">Colleges with the largest percentage increase in enrollment between the years of 2011 and 2010</a>

        </div>

      </div>

      <hr>

      <footer>
        <p>David Schmidt IS218 Final Project</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
