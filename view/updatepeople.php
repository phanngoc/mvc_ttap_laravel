<html>
    <head>
        <title>Profile</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo BASEURL;?>/assets/css/style.css"/>
        <script type="text/javascript" src="<?php echo BASEURL;?>/assets/jquery-1.11.2.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?php echo BASEURL;?>/assets/jquery-ui-1.11.4.custom/jquery-ui.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL;?>/assets/jquery-ui-1.11.4.custom/jquery-ui.theme.css"/>
        <script type="text/javascript" src="<?php echo BASEURL;?>/assets/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>
        <script type="text/javascript" src="<?php echo BASEURL;?>/assets/js/jquery.validate.js"></script>
      
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
                            <div><a class="logout" href="<?php echo BASEURL;?>/logout">Logout</a></div>
                        </div>       
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-primary" href="index.php?action=createuser">Create new User</a>
                    <a class="btn btn-primary" href="index.php?action=listuser">List User</a>
                    <form method="POST" action="" enctype="multipart/form-data" id="register">
                        <div class="col-md-8">
                            <h2>Update Profile</h2>
                            <?php
                            global $error;
                            if (isset($error)) {
                                echo $error;
                            }
                            ?>

                                <div class="form-group">
                                    <label for="username" >Username</label><br>
                                    <input type="text" name="username" class="form-control" value="<?php echo $user->getUsername(); ?>" readonly/>
                                </div> 
                                <div class="form-group">
                                    <label for="password" >Password</label><br>
                                    <input type="password" name="password" class="form-control" value="<?php echo $user->getPassword(); ?>"/>
                                </div> 
                                <div class="form-group">
                                    <label for="fullname" >Full name</label><br>
                                    <input type="text" name="fullname" class="form-control" value="<?php echo $user->getFullname(); ?>"/>
                                </div> 
                                <div class="form-group">
                                    <label for="birthday" >Birthday</label><br>
                                    <input type="text" name="birthday" id="datepicker" class="form-control" value="<?php echo $user->getBirthday(); ?>"/>
                                </div> 
                                <div class="form-group">
                                    <label for="description" >Description</label><br>
                                    <textarea type="text" name="description" class="form-control"><?php echo $user->getDescription(); ?></textarea>
                                </div> 
                                
                                <input type="submit" name="register" value="Update" class="btn btn-primary">

                        </div>
                        <div class="col-md-2">
                            <div class="row" style="height:52px"></div>
                            <div class="form-group">
                                    <label for="avatar" >Avatar</label><br>
                                    <img width="180" height="180" src="<?php echo BASEURL.'/'.$user->getLinkimage(); ?>">
                                    <input type="file" name="avatar" class="form-control">
                            </div> 
                        </div>
                    </form>    
                </div>      
            </div>   
        </div> 
    </body>
</html>
