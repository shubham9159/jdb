<pre><code><?php echo htmlspecialchars('<?php

// Requiring JDB Library
require_once "JDB/JDB.php"; 

// Setting up DB directory
$jdb = new CYZ_JDB(__DIR__."/db_directory/");

// Initialize DB
$jdb->db_init("db_name");

// Provide Table Name in order to Delete Table
$jdb->delete_table("db_name");'); ?></code></pre>
