<?php
    include("common.php");
    head();
	
	$stmt;
	$mysli_connection;
	if (!empty($_POST['checkins'])) {
		$mysqli_connection = new MySQLi($server, $user, $pass, $table, $port);
		if (mysqli_connect_errno() == 0) {
			$name = $_POST['name'] . '';
			$checkins = $_POST['checkins'];
			if ($stmt = $mysqli_connection->prepare("UPDATE " . $quarter . " SET checkins = " . $checkins . " WHERE name = '$name'")) {
				$stmt->execute();
				printf("rows affects: %d\n", $stmt->affected_rows);
				$stmt->close();
			}
		}
	}
?>

		<div>
			<h1>Edit checkins required per week.</h1>
			<form action="edit_member.php" method="post" class="form-horizontal form-custom col-xs-12 col-sm-10 col-md-6 col-lg-4">
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="edit_name">Name: </label>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="name" type="text" size="12" id="edit_name" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="edit_checkin">Checkins: </label>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="checkins" type="text" size="5" id="edit_checkin" /></div>
				</div>
				<div class="group-form">
					<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
						<input type="submit" value="Submit" class="btn btn-default"/>
					</div>
				</div>
			</form>
		</div>

<?php
    foot();
?>
