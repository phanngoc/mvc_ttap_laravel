<html>
	<head>
		<title>Show product</title>

		<script type="text/javascript" src="assets/jquery-1.11.2.js"></script>
		   <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <style>
         #product{
         	margin-top: 20px;
         }
         .create-product{
         	margin-bottom: 10px
         }
        </style>
	</head>
	<body>
		<div id="wrap-content">
			<div class="col-md-3"></div>
			<div class="col-md-9">
				<div id="product">
					<a href="<?php echo BASEURL.'/?c=product/create';?>" class="btn btn-primary create-product">Create Product</a>
					<table class="table">
						<thead>
							<tr>
								<td>Id</td>
								<td>Name</td>
								<td>Price</td>
								<td>Description</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($productAll as $key => $value) {
							?>
							<tr>
								<td><?php echo $value->id?></td>
								<td><?php echo $value->name?></td>
								<td><?php echo $value->price?></td>
								<td><?php echo $value->description?></td>
								<td>
									<a href="<?php echo BASEURL.'/?c=product/edit&id='.$value->id;?>"><i class="fa fa-pencil-square-o"></i></a>
									<a href="<?php echo BASEURL.'/?c=product/delete&id='.$value->id;?>" class="delete"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</body>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.delete').click(function(e) { 
       	 e.preventDefault(); 
         if(confirm("Are you sure delete product ?"))
         {
         	$(location).attr('href', $(this).attr('href'));
         } 
      	});
	});
	</script>
</html>