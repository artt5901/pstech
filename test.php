<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ค้นหาข้อมูล</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
	<?php
	$sql = "";
	include"connect.php";
	$search="";
	if (isset($_POST['searchs'])){
		$search = $_POST['searchs'];
		if ($search!=""){
			$sql = "Select * from branch where (b_id like '%$search%' or b_name like '%$search%')";
		}else{
			$sql = "Select * from branch";
		}
	}else{
		$sql = "Select * from branch";
	}
	$result = mysqli_query($conn,$sql);
	?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<table class="table table-bordered  table-responsive ">
					<thead>
						<tr>
							<th><center><h4>ค้นหาข้อมูล</h4></center></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<form action="test.php" method="POST" accept-charset="utf-8">
										<table class="table table-bordered table-hover table-responsive table-striped">
											<thead>
												<tr>
													<th>
														
														<div class=" col-md-11 col-sm-11 col-xs-11">
															<samp>รหัส/ชื่อเมนูอาหาร</samp>
															<input class="form-control" type="test" name="searchs" value="<?php echo $search; ?>" placeholder="รหัส/ชื่อเมนูอาหาร">
														</div>
														<div class="col-md-1 col-sm-1 col-xs-1">
															<span>&nbsp;</span>
															<button class="btn btn-success" type="submit">ค้นหา</button>
														</div>
													</th>
												</tr>
											</thead>
										</table>
									</form>				
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<table class="table table-bordered table-hover table-responsive table-striped">
										<thead>
											<tr>
												<th><center>รหัสเมนู</center></th>
												<th><center>ชื่อเมนูอาหาร</center></th>
												<th><center>ประเภทอาหาร</center></th>
												<th><center>ราคา</center></th>
											</tr>
										</thead>
										<tbody>

											<?php
											if (mysqli_num_rows($result)>0){ 
												while($rs = mysqli_fetch_array($result)){ ?>
													<tr>
														<td><center><?php echo $rs['b_id'] ?></center></td>
														<td><?php echo $rs['b_name'] ?></td>
														
												<?php } 
											}else{ ?>
												<tr>
													<td colspan="4"><center>ไม่พบข้อมูล</center></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>			
		</div>
	</div>
</body>
</html>