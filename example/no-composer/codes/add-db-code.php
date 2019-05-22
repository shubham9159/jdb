<pre><code><?php echo htmlspecialchars('<?php

// Requiring JDB Library
require_once "JDB/JDB.php"; 

// Setting up DB directory
$jdb = new CYZ_JDB(__DIR__."/db_directory/");

// Provide the name of the DB to add new DB
$jdb->db_init("db_name");'); ?></code></pre>
