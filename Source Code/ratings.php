<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Sovereign 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Ratings</title>
<LINK REL=ICON HREF="images/icon.png">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
<?php 
	require_once 'status.php';
	require_once 'db.php';
	$username = $_SESSION['username'];
					
?>
<div id="wrapper">
  <div id="header-wrapper">
		<div id="header" class="container">
		  <div id="logo">
				<h1>SarSubz LUMS</h1>
			</div>
			<div id="menu">
			  <ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="lifts.php">Manage Lifts</a></li>
					<li><a href="ratings.php">Manage Ratings</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
			  </ul>
			</div>
		</div>
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
	</div>
	<div class="tabs-r">
		<ul>
		<li><a href="hall.php">Hall of Fame</a></li>
		<li><a href="partnerRate.php">Rate Partner</a></li>
		<li><a href="ratings.php">My Ratings</a></li>
		</ul>
	</div>
	<div id="page">
		
		<div class="content">
			<h4> Your Ratings: </h4>
				<table>
				<tr><td><h5> Rated By</h5> </td> <td><h5>  Rating Given </h5></td> </tr>
				<?php
					/** Select all the ratings from Ratings table for this user and then show the final average rating	**/
					$result=query("select * from RATINGS where username=".$_SESSION['username']);
					$allRatings=array(0);
					$n=0;
					while (ocifetch($result)){
						echo ("<tr> <td>".ociresult($result,"RATED_BY")."</td><td>".ociresult($result,"RATING")."</td></tr>");
						array_push($allRatings,ociresult($result,"RATING"));
						$n+=1;
					}
					if ($n<1)
						$n=1;
					$r=array_sum($allRatings)/$n;
					echo ("<tr><td><h5>Final Rating: </h5></td><td><h5>".$r."</h5></td></tr>");
				?>
				</table>
				<form class="edit-button" action="change.php" method="POST">
				<input type="hidden" name="user" value=<?php echo ($_SESSION['username']); ?> >
				<input type="hidden" name="rating" value=<?php echo ($r); ?> >
				<input type="submit" value="Update Rating">
				</form>
			<!--Fetch Data from the database -->
			<br class="clear" />
		</div>
		
	  
		<!-- end #content --><!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
</div>
	<!-- end #header -->

	
	<!-- end #page --> 
</div>
<div id="footer-content"></div>
<div id="footer">
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
