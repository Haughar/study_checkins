<?php
	include("secrets.php");

	function head() {
?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>SK Study Hours</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
			<script src="https://code.jquery.com/jquery.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<script type="text/javascript">
				$(document).ready(function() {
					$('ul.nav').children('li').each(function() {
						var root = $(this).children('a').attr('href');
						var pathname = window.location.pathname;
						if (pathname.indexOf(root) > -1) {
							$(this).addClass('active');
						}
					});
				});
			</script>
		</head>

		<body>
			<div class="top page-header">
				<img src="sk_logo.jpg" alt="logo" />
				<h1>Study Check-ins <small>Sigma Kappa Mu chapter</small></h1>
			</div>
			<div class="navbar navbar-custom">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="record.php">Recording Page</a></li>
        					<li><a href="edit_checkin.php">Edit Check-in</a></li>
        					<li><a href="add_member.php">Add Members</a></li>
        					<li><a href="remove_member.php">Remove Members</a></li>
        					<li><a href="edit_member.php">Edit Members</a></li>
        					<li><a href="weekly_report.php">Weekly Report</a></li>
        					<li><a href="quarterly_report.php">Quarterly Report</a></li>
						</ul>
					</div>
				</div>
			</div
<?php
	}

	function foot() {
?>
		</body>
	</html>
<?php
	}

function week_dropdown($cols) { ?>
	<div class="col-lg-<?php echo $cols; ?> col-md-<?php echo $cols; ?>">
		<select class="form-control" name="week" form="form_submit">
			<option value="week1">Week 2</option>
			<option value="week2">Week 3</option>
			<option value="week3">Week 4</option>
			<option value="week4">Week 5</option>
			<option value="week5">Week 6</option>
			<option value="week6">Week 7</option>
			<option value="week7">Week 8</option>
			<option value="week8">Week 9</option>
		</select>
	</div>
<?php }
?>
