<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Create thành viên mới</title>
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
                <div class="row bgheader">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="info-header">
                                <p>Hello <b><?php echo $user->getFullname(); ?></b></p>
                                <div><a class="logout" href="index.php?action=logout">Logout</a></div>
                            </div>       
                        </div> 
                </div>
                <div class="row">
                   
                    <div class="register col-md-6">
                        <h2>Create new user</h2>
                        <div>
                            <?php
                            if (isset($error)) {
                                echo $error;
                            }
                            ?>

                        </div>
                        <form method="POST" action="index.php?action=createuser" enctype="multipart/form-data" id="register">
                            <a class="btn btn-primary" href="index.php?action=listuser">List User</a>
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
