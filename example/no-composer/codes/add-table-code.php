<pre><code><?php echo htmlspecialchars('<?php

// Requiring JDB Library
require_once "JDB/JDB.php"; 

// Setting up DB directory
$jdb = new CYZ_JDB(__DIR__."/db_directory/");

// Initialize DB
$jdb->db_init("db_name");

// Table Name
$table_name = "table_name";

// Provide Table name in order to Create Table
$jdb->create_table($table_name);'); ?></code></pre>
