<?php
session_start();
if ( ! isset( $_SESSION["USER"] ) )
{
	header( "location: logind" );
}
if ( ! isset( $_SESSION['CREATED'] ) )
{
	$_SESSION['CREATED'] = time();
}
else if ( time() - $_SESSION['CREATED'] > 1800 )
{
	// session started more than 30 minutes ago
	session_regenerate_id( true );    // change session ID for the current session and invalidate old session ID
	$_SESSION['CREATED'] = time();  // update creation time
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?> - <?php echo $site_title; ?></title>
    <link rel="shortcut icon" type="image/png" href="assets/favicon.ico"/>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!--    <link rel="stylesheet" href="css/style.css"/>-->
    <link rel="stylesheet" href="css/style.min.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./oversigt"><?php echo $site_title; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDimselab" aria-controls="navbarDimselab"
            aria-expanded="false" aria-label="Vis menu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarDimselab">
        <ul class="navbar-nav">
			<?php
			switch ( $page_title )
			{
				case "Artikeloversigt":
					echo "<li class=\"nav-item active\">";
					echo "<a class=\"nav-link\" href=\"./oversigt\">Oversigt</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./udlån\">Udlån</a>";
					echo " </li>";
					echo " <li class=\"nav-item\">";
					//echo "<a class=\"nav-link\" href=\"./returnering\">Returnering</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./statistik\">Udlånsstatistik</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./projekter\">Projekter</a>";
					echo "</li>";
					break;
				case "Udlån":
					echo "<li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./oversigt\">Oversigt</a>";
					echo "</li>";
					echo " <li class=\"nav-item active\">";
					echo "<a class=\"nav-link\" href=\"./udlån\">Udlån</a>";
					echo " </li>";
					echo " <li class=\"nav-item\">";
					//echo "<a class=\"nav-link\" href=\"./returnering\">Returnering</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./statistik\">Udlånsstatistik</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./projekter\">Projekter</a>";
					echo "</li>";
					break;
				case "Returnering":
					echo "<li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./oversigt\">Oversigt</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./udlån\">Udlån</a>";
					echo " </li>";
					echo " <li class=\"nav-item active\">";
					//echo "<a class=\"nav-link\" href=\"./returnering\">Returnering</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./statistik\">Udlånsstatistik</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./projekter\">Projekter</a>";
					echo "</li>";
					break;
				case "Statistik":
					echo "<li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./oversigt\">Oversigt</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./udlån\">Udlån</a>";
					echo " </li>";
					echo " <li class=\"nav-item\">";
					//echo "<a class=\"nav-link\" href=\"./returnering\">Returnering</a>";
					echo "</li>";
					echo " <li class=\"nav-item active\">";
					echo "<a class=\"nav-link\" href=\"./statistik\">Udlånsstatistik</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./projekter\">Projekter</a>";
					echo "</li>";
					break;
				case "Projekter":
					echo "<li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./oversigt\">Oversigt</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./udlån\">Udlån</a>";
					echo " </li>";
					echo " <li class=\"nav-item\">";
					//echo "<a class=\"nav-link\" href=\"./returnering\">Returnering</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./statistik\">Udlånsstatistik</a>";
					echo "</li>";
					echo " <li class=\"nav-item active\">";
					echo "<a class=\"nav-link\" href=\"./projekter\">Projekter</a>";
					echo "</li>";
					break;
				default:
					echo "<li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./oversigt\">Oversigt</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./udlån\">Udlån</a>";
					echo " </li>";
					echo " <li class=\"nav-item\">";
					//echo "<a class=\"nav-link\" href=\"./returnering\">Returnering</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./statistik\">Udlånsstatistik</a>";
					echo "</li>";
					echo " <li class=\"nav-item\">";
					echo "<a class=\"nav-link\" href=\"./projekter\">Projekter</a>";
					echo "</li>";
					break;
					break;
			}
			?>
        </ul>
        <ul class="form-inline ml-auto navbar-nav">
            <li class="nav-item"><span class="navbar-text">Velkommen <strong><?php echo $_SESSION["USER"] ?></strong></span></li>
            <li><a class="nav-link" href="./logud">Log ud</a></li>
        </ul>
    </div>
</nav>

<!-- container -->
<div class="container pt-5 mt-4">
