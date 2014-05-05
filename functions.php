<?php

function detectHeight() {
	if(isset($_GET["screen"]) && is_numeric($_GET["screen"])) {
		setcookie("screen", $_GET["screen"], strtotime('+30 days'), "/");
		$_COOKIE["screen"] = $_GET["screen"];
	}
}

add_theme_support('post-thumbnails');
add_action('init','detectHeight');
?>