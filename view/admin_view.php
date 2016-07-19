<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\bootstrap.min.css">
        <script src=""></script>
        <script src="jquery/jquery-1.12.3.min.js" type="text/javascript"></script>
        <script src="js\bootstrap.min.js"></script>
        <title>Admin Page</title>
    </head>
    <body style="background-color: #f2f2f2">
        
        <nav class="navbar navbar-default" style="background-color: #d9d9d9">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">?FIRMA?</a>
            </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        
                        <li><a href="admin_page.php?addUser">Add User</a></li>
                        <li><a href="#">Delete User</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Add Equipment</a></li>
                        <li><a href="#">Delete Equipment</a></li>
                        
                        
                    </ul>
                    </li>
                </ul>
                
            
                
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
                
                    <li><a href="#"><?php echo $userName." ".$userLastName ?></a></li>
                </li>
            </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
    </body>
</html>
