<?php require_once 'common.inc.php'; ?>
<?php
	//to be transferted to common.inc.php
	function insert_sets($mysqli, $title, $description, $lang_id_word, $lang_id_translation, $user){
		$sql="INSERT INTO card_sets (title, description, language1_id,language2_id, user_id) VALUES ('" . $title . "','" . $description . "'," . $lang_id_word . "," . $lang_id_translation . ",'" . $user . "');";
		if ($mysqli->query($sql) === TRUE) {
			//insert cards if successful
			$words=$_GET['word'];
			$translation=$_GET['translation'];
			for($i=0; $i<count($word);$i++){
				if(strcmp($word[$i],"")){
					insert_cards($mysqli, $words[$i], $translation[$i], $mysqli->insert_id);
				}
			}
			
		} else {
			//header("location: createSet_unexpected");
			echo "Error: " . $sql . "<br>" . $mysqli->error;
			echo "<br /><br />";
		}
	}
	function get_userId($mysqli, $username){
		if ($result = $mysqli->query("SELECT id FROM users WHERE username='" . $username . "'")) {
        return $result->fetch_all(MYSQLI_ASSOC);
		} else {
			echo "Unable to fetch user id.";
			exit(1);
		}
	}
	function insert_cards($mysqli, $word, $translation, $set_id){
		$sql="INSERT INTO cards (word1, word2, set_id) VALUES ('" . $word . "','" . $translation . "'," . $set_id . ");";
		if ($mysqli->query($sql) === TRUE) {
			header("location: createSet_success");
		} else {
			//header("location: createSet_unexpected");
			echo "Error: " . $sql . "<br>" . $mysqli->error;
			echo "<br /><br />";
		}
	
	}
	
	//insert sets
	$languages = get_languages($mysqli);
	foreach ($languages as $key => $value) {
	  if(!isset($_GET['langWord']) || $value['id'] == $_GET['langWord'])$language_id_word=$value['id'];
	}
	//$language_id_word = implode('', array_map(function ($language) { return ($language['selected']) ? $language['id'] : ''; }, $languages));
	foreach ($languages as $key => $value) {
	  if(!isset($_GET['langTranslation']) || $value['id'] == $_GET['langTranslation'])$language_id_translation=$value['id'];
	}
	//$language_id_translation = implode('', array_map(function ($language) { return ($language['selected']) ? $language['id'] : ''; }, $languages));
	//GET user id
	$userId_array=get_userId($mysqli, $_COOKIE['user']);
	foreach ($userId_array as $value) {
		$userId=$value['id'];
	}
	insert_sets($mysqli, $_GET['title'], $_GET['description'], $language_id_word, $language_id_translation, $userId);

?>