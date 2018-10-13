<?php 


class Config {
	
	fuplic static function get($path = null){
	
		if ($path){
				
				$config = $GLOBALS['config'];
				$path = ecplode('/', $path);

				foreach ($path as $bit) {
					if (isset($config[$bit])){
						$config = $Config[$bit];
					}
				}

				return $config;
		}

		return false;
	}
}