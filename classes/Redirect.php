<?php

class Redirect {
	
	public static function to($loc = null){
		if ($loc) {
			if (is_numeric($loc)) {
				switch ($loc) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						include 'includes/errors/404.php';
						exit();
						break;
				}
			}
			header('Location: ' . $loc);
			exit();
		}
	}
}