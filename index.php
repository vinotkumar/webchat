<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><Script>
  //<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

    
  <script type="text/javascript">
      $(document).ready(function() {
        
        $('#formlogin').submit(function(e) {  

            e.preventDefault();
            
            psLoginName = 'login';
            
            var data = $(this).serializeArray(); // convert form to array
            data.push({name: "login", value: psLoginName});
            $.ajax({
                type: "POST",
                url: 'Controller.php',
                data: $.param(data),
               // data: $(this).serialize()+ 'login',
                success: function(response)
                {
                
                 location.href = 'GroupChat.php';
               }
           });
         });
         
         
      });
  </script>
	
</head>
<body>

	<div class="row">
			<h2 align="center">Chat Application Login</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
          
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){  echo $msg; }  ?> </p>
					
          <form role="form" action="Controller.php" method="post" id="formlogin" name="formlogin">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
							</div>
							<a href="forgot-password.php">Forgot Password?</a>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="login" name="login" id="login" class="btn btn-primary">login</button><span style="padding-left:250px">
								<a href="register.php" class="btn btn-primary">Register</a></span>
							</div>
							</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
