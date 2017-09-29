<?php
	/**
	 * 데이터 할당
	 * @param string $fileName
	 * @param array $vars
	 * @return string
	 */
	function fetch($fileName, $vars = array()) {
		$fileData = $_SERVER['DOCUMENT_ROOT'].'/seoul/'.$fileName.'.php';

		if ( ! file_exists($fileData)) { return false; }

		@extract($vars);
		ob_start();
		include($fileData);

		$buffer = ob_get_contents();
		@ob_end_clean();
		return $buffer;
	}


	/**
	 * 데이터 조회
	 * @param string $url
	 * @return array
	 */
	function getData($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

		$content = '';
		$content = curl_exec($ch);
		curl_close($ch);

		return $content;
	}

	/**
	 * object -> array 변환
	 * @param object $d
	 * @return array
	 */
	function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}

		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		} else {
			// Return array
			return $d;
		}
	}

?>