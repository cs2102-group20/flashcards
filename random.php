<?php
require 'common.inc.php';
header('Location: http://flash.apt.cat/flashcards/set?id=' . $mysqli->query("SELECT id FROM card_sets WHERE id >= (SELECT CEIL(RAND() * (MAX(id) - MIN(id)) + MIN(id)) AS rand_id FROM card_sets) ORDER BY id ASC LIMIT 1")->fetch_row()[0]);
