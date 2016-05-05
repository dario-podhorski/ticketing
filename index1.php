<!--početna login stranica za ulazak u ticketing sustav!-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js\bootstrap.min.js"></script>
        <title>Log In</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Log In</h1>
                    <div class="account-wall">
                        <form class="form-signin" method="post" action="login.php">
                            <input type="text" class="form-control" placeholder="Email" name="username"required autofocus>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <?php if (isset($_GET['error'])) {echo "<p class='text-center' style=color:red>Wrong username or password</p>";} ?>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" value="1"name="sub_bttn">Sign in</button>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
