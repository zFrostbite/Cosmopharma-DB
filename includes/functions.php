<?php
	function form_errors($error_array=array()) {
		$output = "";
		if(!empty($error_array)){
			$output 	 = 	"<div class=\"Error\">";
			$output 	.= 	"Vennligst fiks følgende feil";
			$output 	.="<ul>";
			foreach($error_array as $key => $error) {
				$output 	.="<li>{$error}</li>";
			}
			$output 	.="</ul>";
			$output 	.="</div>";
		}
		return $output;
	}
?>