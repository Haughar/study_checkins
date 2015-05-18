<?php
    include("common.php");
    head(); ?>
	<div>
		<h1>Quarterly Report</h1>
<?php

	$stmt;
	$mysqli_connection;
	$mysqli_connection = new MySQLi($server, $user, $pass, $table, $port);
	if (mysqli_connect_errno() == 0) {
		if ($result = $mysqli_connection->query("Select * FROM " . $quarter)) { ?>
		<table class="table">
			<tr>
				<th>Name</th>
				<th>PC</th>
				<th>Check-ins Required</th>
				<th>Week 2</th>
				<th>Week 3</th>
				<th>Week 4</th>
				<th>Week 5</th>
				<th>Week 6</th>
				<th>Week 7</th>
				<th>Week 8</th>
				<th>Week 9</th>
			</tr>
<?php
			while ($row = $result->fetch_row()) { ?>
			<tr>
				<?php for ($i = 0; $i < 11; $i++) { ?>
					<td><?php echo $row[$i]; ?></td>
				<?php } ?>
			</tr>
			<?php }
		} ?>
		</table>
	</div>
	<?php } else { ?>
	<div><p>Something went wrong...</p></div>

<?php }
    foot();
?>

