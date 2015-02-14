<?php
    include("common.php");
    head();

	$stmt;
	$mysqli_connection;
	if (!empty($_POST['name'])) {
		$mysqli_connection = new MySQLi($server, $user, $pass, $table, $port);
		if (mysqli_connect_errno() == 0) {
			$name = $_POST['name'] . '';
			$week = $_POST['week'] . '';
			$added_checkin = $_POST['added'];
			if ($result = $mysqli_connection->query("SELECT " . $week . " FROM " . $quarter  . "  WHERE name = '$name'")) {
				while ($row = $result->fetch_row()) {
        			$prev = $row[0];
    			}
				echo $prev;
				$result->close();
			}

			$new_total = $prev + $added_checkin;
			echo "new total" . $new_total;

			if ($stmt = $mysqli_connection->prepare("UPDATE Winter2015 SET " . $week . " = " . $new_total . " WHERE name = '$name'")) {
				$stmt->execute();
				printf("rows inserted: %d\n", $stmt->affected_rows);
				$stmt->close();
			}
		}
	}
?>

		<div>
			<h1>Record Study Hours</h1>
			<form action="record.php" method="post" class="form-horizontal form-custom col-xs-12 col-sm-10 col-md-6 col-lg-4">
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="record_week">Week: </label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="week" type="text" size="7" id="record_week" autofocus="autofocus" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="record_name">Name: </label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="name" type="text" size="12" id="record_name" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="record_added">Added Checkin:</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="added" type="text" size="5" id="record_added" /></div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
						<input type="submit" value="Add" class="btn btn-default" />
					</div>
				</div>
			</form>
		</div>


<?php
    foot();
?>
