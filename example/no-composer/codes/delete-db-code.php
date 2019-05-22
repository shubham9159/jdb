<pre><code><?php echo htmlspecialchars('<?php

// Requiring JDB Library
require_once "JDB/JDB.php"; 

// Setting up DB directory
$jdb = new CYZ_JDB(__DIR__."/db_directory/");

// Provide DB name in order to delete DB
$jdb->delete_db("db_name");'); ?></code></pre>
