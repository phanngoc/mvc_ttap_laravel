<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Liệt kê thông tin sinh viên</title>
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
                            <p>Hello <b><?php echo $usercurrent->getFullname(); ?></b></p>
                            <div><a class="logout" href="index.php?action=logout">Logout</a></div>
                        </div>       
                    </div>
                </div>
                <div class="row">
                    <div class="register col-md-6">
                      <a class="btn btn-primary" href="index.php?action=createuser">Create new User</a>
                    
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Fullname</th>
                                <th>Birthday</th>
                                <th>Description</th>
                                <th>Avatar</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                                <?php 
                                  foreach ($users as $key => $value) {
                                      ?>
                                    <tr>
                                    <td><?php echo $value->getId();?></td>
                                    <td><?php echo $value->getUsername();?></td>
                                    <td><?php echo $value->getPassword();?></td>
                                    <td><?php echo $value->getFullname();?></td>
                                    <td><?php echo $value->getBirthday();?></td>
                                    <td><?php echo $value->getDescription();?></td>
                                    <td><img src="<?php echo $value->getLinkimage();?>" width="65" height="65"/></td>
                                    <td><a href="updatepeople/<?php echo $value->getId();?>" class="btn btn-success">Update</a></td>
                                    </tr>
                                   <?php
                                  }
                                ?>
                              
                            </tbody>
                          </table>
                    </div>
                </div>

            </div>

        </div>  
     
    </body>
</html>
