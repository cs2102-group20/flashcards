<?php require_once 'common.inc.php'; ?>
<?php

	function insert_sets($mysqli, $title, $description, $lang_id_word, $lang_id_translation, $user){
		$sql="INSERT INTO card_sets (title, description, language1_id,language2_id, user_id) VALUES ('" . $title . "','" . $description . "','" . $lang_id_word . "','" . $lang_id_translation . "','" . $user . "');";
		if ($mysqli->query($sql) === TRUE) {
			header("location: createSet_success");
		} else {
			//header("location: createSet_unexpected");
			echo "Error: " . $sql . "<br>" . $mysqli->error;
			echo "<br /><br />";
			echo "<a href='register.php'>Please try registering again.</a>";
		}
	}
	
	$languages = get_languages($mysqli);
	foreach ($languages as $key => $value) {
	  $languages[$key]['selected'] = !isset($_GET['langWord']) || in_array($value['id'], $_GET['langWord']);
	}
	$language_id_word = implode(',', array_map(function ($language) { return ($language['selected']) ? $language['id'] : 'null'; }, $languages));
	foreach ($languages as $key => $value) {
	  $languages[$key]['selected'] = !isset($_GET['langTranslation']) || in_array($value['id'], $_GET['langTranslation']);
	}
	$language_id_translation = implode(',', array_map(function ($language) { return ($language['selected']) ? $language['id'] : 'null'; }, $languages));
	insert_sets($mysqli, $_GET['title'], $_GET['description'], $language_id_word, $language_id_translation, $_COOKIE['user']);


?>