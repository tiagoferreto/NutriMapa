<?php
		$db = new SQLite3('nutrimapa.sqlite') or echo 'Unable to open database';
	
			$result = $db->query('SELECT * FROM enderecos;') or die('Query db failed');
echo "certo";
			
		?>
