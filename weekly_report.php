<?php
    include("common.php");
    head();

	$stmt;
	$mysqli_connection;
	if (!empty($_GET['week'])) {
		$mysqli_connection = new MySQLi($server, $user, $pass, $table, $port);
		$week = $_GET['week'];
		if (mysqli_connect_errno() == 0) { ?>
		<div>
			<h1>Weekly Report</h1>
			<table class="table table-hover table-custom">
				<tr>
					<th>Name</th>
					<th>PC</th>
					<th>Check-ins Required</th>
					<th><?php echo $week ?></th>
				</tr>
		<?php
			if ($result = $mysqli_connection->query("SELECT name, pc, checkins, " . $week . " FROM " . $quarter)) {
				while ($row = $result->fetch_row()) { ?>
						<tr>
					<?php for ($i = 0; $i < 4; $i++) { ?>
							<td><?php echo $row[$i] ?></td>
					<?php } ?>
						</tr>
				<?php }
			} ?>
			</table>
		</div>
			<?php } else { ?>
		<div><p>Something went wrong...</p></div>
			<?php }
	 		} else {
?>
	<div>
		<h1>Choose a Week:</h1>
		<?php week_dropdown("2"); ?>
		<form id="form_submit" action="weekly_report.php" method="get">
			<input type="submit" value="Go" />
		</form>
	</div>
<?php
	}
    foot();
?>
