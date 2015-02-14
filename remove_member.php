<?php
    include("common.php");
    head();

	$stmt;
	$mysqli_connection;
	if(!empty($_POST['firstname'])) {
		$mysqli_connection = new MySQLi($server, $user, $pass, $table, $port);
		if(mysqli_connect_errno() == 0) {
			$first = $_POST['firstname'];
			$last = $_POST['lastname'];
			$name  = $first . ' ' . $last;
			$pc = $_POST['pc'];
			if ($stmt = $mysqli_connection->prepare("DELETE FROM " . $quarter . " WHERE name = '$name'")) {
				$stmt->execute();
			}
		}
	}
?>

	<div>
		<h1>Remove Members</h1>
		<?php 
			if ($stmt->affected_rows == 1) { ?>
				<p><?= $name ?> was successfully removed from the database.</p>
		<?php
			} elseif (!empty($_POST['firstname']) && !empty($_POST['lastname']) && $stmt->affected_rows == 0) { ?>
				<p><?= $name ?> was not removed from the databse because something went wrong...</p>
		<?php
			} ?>

		<form action="remove_member.php" method="post" class="form-horizontal form-custom col-xs-12 col-sm-10 col-md-6 col-lg-4">
			<div class="form-group">
				<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="remove_first">First Name: </label>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="firstname" type="text" size="12" id="remove_first" autofocus="autofocus" /></div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="remove_last">Last Name: </label>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="lastname" type="text" size="12" id="remove_last" /></div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"><input type="submit" value="Remove" /></div>
			</div>
		</form>
	</div>
<?php
	if ($stmt) {
		$stmt->close();
	}
	if (!empty($_POST['firstname'])) {
		$mysqli_connection->close();
	}
    foot();
?>
