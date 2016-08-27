<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h3 class="title">Qeydiyyat</h3>
				<form method="post" action="upload.php" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" name="surname" class="form-control" placeholder="Surname">
					</div>
					<div class="form-group">
						<input type="file" name="photo" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="uploadBtn" class="btn btn-default pull-right" value="upload">
					</div>
				</form>
			</div>
			<p class="error text-center">
			<?php 
				session_start();
				if (!empty($_SESSION['error'])) {
					echo $_SESSION['error'];
					$_SESSION['error'] = '';
				}
			?>
			</p>

			<div class="row happy">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Surname</th>
							<th>Image</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$file = fopen('list.txt', 'r');
							$info = fread($file, filesize('list.txt'));
							$info = explode("@@@###@@@", $info);



							for ($i = 0; $i < sizeof($info); $i++) {
								$info[$i] = explode('|', $info[$i]);
							}

							
							for ($i = 0; $i < sizeof($info) - 1; $i++) {
								echo '<tr><td>' . $info[$i][0] . '</td><td>' . $info[$i][1] . '</td><td class="text-center"><img src="' . $info[$i][2] . '"></td></tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>

		</div>

		
</body>
</html>