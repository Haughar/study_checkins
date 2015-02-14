<?php
	include("common.php");
	head();
	
	$stmt;
	$mysqli_connection;
	if (!empty($_POST['firstname'])) {
		$mysqli_connection = new MySQLi($server, $user, $pass, $table, $port);
		if(mysqli_connect_errno() == 0){
			$name = $_POST['firstname'] . ' ' . $_POST['lastname'];
			$pc = $_POST['pc'];
			if ($stmt = $mysqli_connection->prepare("INSERT INTO " . $quarter. " (name, pc) VALUES (?, ?)")) {
				$stmt->bind_param("si", $name, $pc);
    			$stmt->execute();
			}
		}
	}
?>
		<div>
			<h1>Add Members</h1>
			<?php
				if ($stmt->affected_rows == 1) { ?>
					<p><?= $name ?> was successfully added to the database.</p>
			<?php
				} elseif (!empty($_POST['firstname'])) { ?>
				<p><?= $name ?> was not added to the database because something went wrong.<p>
			<?php } ?>  
        	<form action="add_member.php" method="post" class="form-horizontal form-custom col-xs-12 col-sm-10 col-md-6 col-lg-4">
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="add_first">First Name: </label>
            		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="firstname" type="text" size="12" id="add_first" autofocus="autofocus" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="add_last">Last Name: </label>
            		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="lastname" type="text" size="12" id="add_last" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-4 col-sm-4 col-md-4 col-lg-4" for="add_pc">PC: </label>
            		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input name="pc" type="int" size="2" id="add_pc" /></div>
				</div>
				<div class=form-group:>
					<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
            			<input type="submit" value="Add" class="btn btn-default" />
			 		</div>
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
