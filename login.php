<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./views/css/login.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" id="email-input" class="form-control" placeholder="Name" required="" autofocus="" autocomplete="off">
        <input type="password" id="pswd-input" class="form-control" placeholder="Password" required="" autocomplete="off">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<!--         <button class="btn btn-lg btn-default btn-block">Register</button> -->
      </form>

    </div> <!-- /container -->
</body>
</html>