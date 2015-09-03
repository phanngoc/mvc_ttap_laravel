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
	</head>
	<body>
		<div id="wrap-content">
			<div class="col-md-3"></div>
			<div class="col-md-9">

				<div id="edit-product">
					<div class="alert alert-success">
					  <strong></strong>
					</div>
					<a href="<?php echo BASEURL.'/?c=product/index';?>" class="btn btn-warning">List product</a>
					<form action="<?php echo BASEURL.'/?c=product/edit&id='.$product->id;?>" method="POST">
						<h3>Edit product</h3>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" value="<?php echo $product->name;?>">
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" name="price" value="<?php echo $product->price;?>">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control" name="description" value="<?php echo $product->description;?>">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>