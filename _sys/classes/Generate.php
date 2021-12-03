<?php

class Generate {
	
	public static function Code($count) {
		$n = '';
		$array = array('0','1','2','3','4','5','6','7','8','9','a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K',
					  'l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','x','X','y','Y','z','Z','ä','Ä','ü','Ü','ö','Ö');
		
		for($i=0;$i<$count;$i++) {
			$r = rand(1, count($array));
			$n .= isset($array[$r-1]) ? $array[$r-1] : '0';
		}
		
		return $n;
	}
	public static function DeviceName($username) {
		$ud = @explode(' ', $username);
		$name = 'DESKTOP-';
		if(count($ud) == 1) {
			$name .= rand(0,9);
			if(strlen($username)> 3) {
				$name .= substr($username, 0, 3);
				$name .= self::Code(3);
			} else {
				$newcount = 6-strlen($username);
				$name .= substr($username, 0, strlen($username));
				$name .= self::Code($newcount);
			}
		} else {
			$name = rand(0,9);
			if(strlen($ud[0])>3) {
				$name .= substr($ud[0], 0, 3);
			} else {
				$newcount = 3-strlen($ud[0]);
				$name .= substr($ud[0], 0, strlen($ud[0]));
				$name .= self::Code($newcount);
			}
			
			if(strlen($ud[1])>3) {
				$name .= substr($ud[1], 0, 3);
			} else {
				$newcount = 3-strlen($ud[1]);
				$name .= substr($ud[1], 0, strlen($ud[1]));
				$name .= self::Code($newcount);
			}
		}
		
		return strtoupper($name);
	}
}

?>