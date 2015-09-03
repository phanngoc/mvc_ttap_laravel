<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập và đăng kí thành viên</title>
        <link rel="stylesheet" href="assets/jquery-ui-1.11.4.custom/jquery-ui.css"/>
        <link rel="stylesheet" href="assets/jquery-ui-1.11.4.custom/jquery-ui.theme.css"/>
        <link rel="stylesheet" href="assets/css/style.css"/>
        <script type="text/javascript" src="assets/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="assets/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
            });
        </script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.validate.js"></script>
        <script type="text/javascript">
             $(function() {
               $("#login").validate({
			rules: {
				login_username: "required",
				login_password: "required",
			},
			messages: {
				login_username: {
					required: "Please enter a username",
				
				},
				login_password: {
					required: "Please provide a password",
					
				},
			},
                        submitHandler: function(form) {
                            form.submit();
                        },
		}); 
                $("#register").validate({
			rules: {
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
                                fullname:{
                                        required: true,
                                },
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
                                birthday:{
                                    required: true,
                                },
                                description:{
                                    required: true,
                                },
                                avatar:{
                                    required : true,
                                }	
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
                                fullname:{
                                        required: "Please provide fullname",
                                },
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
                                birthday:{
                                    required: "Please provide a birthday",
                                },
                                description:{
                                    required: "Please provide a description",
                                },
                                avatar:{
                                    required : "Please choose image",
                                }
			}
		}); 
            });
        </script>
    </head>
    <body>

       <div class="main-wrap row">
            <div class="col-md-2 bgleft"></div>
            <div class="col-md-10">
                <div class="row bgheader"></div>
                <div class="row">
                    <div class="login col-md-5">
                        <h2>Đăng nhập</h2>
                        <div>
                            <?php
                            if (isset($error_login)) {
                                echo $error_login;
                            }
                            ?>
                        </div>
                        <form method="POST" action="login" id="login">
                            <div class="form-group">
                                <label for="login_username" >Username</label><br>
                                <input type="text" name="login_username" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="login_password" >Password</label><br>
                                <input type="password" name="login_password" class="form-control">
                            </div> 
                            <input type="submit" name="login" value="Login" class="btn btn-primary">
                        </form>
                    </div> 
                    <div class="col-md-1"></div>
                    <div class="register col-md-5">
                        <h2>Đăng kí</h2>
                        <div>
                            <?php
                            global $error_register;
                            if (isset($error_register)) {
                                echo $error_register;
                            }
                            ?>

                        </div>
                        <form method="POST" action="index.php?action=register" enctype="multipart/form-data" id="register">
                            <div class="form-group">
                                <label for="username" >Username</label><br>
                                <input type="text" name="username" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <label for="password" >Password</label><br>
                                <input id="password" type="password" name="password" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <label for="confirm_password" >Confirm Password</label><br>
                                <input type="password" name="confirm_password" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <label for="fullname" >Full name</label><br>
                                <input type="text" name="fullname" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <label for="birthday" >Birthday</label><br>
                                <input type="text" name="birthday" id="datepicker" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <label for="description" >Description</label><br>
                                <textarea type="text" name="description" class="form-control"></textarea>
                            </div> 
                            <div class="form-group">
                                <label for="avatar" >Avatar</label><br>
                                <input type="file" name="avatar" class="form-control" accept="image/*">
                            </div> 
                            <input type="submit" name="register" value="Register" class="btn btn-primary">
                        </form>
                    </div>
                </div>

            </div>

        </div>  
     
    </body>
</html>
