<?php

require_once 'JDB/JDB.php'; 

ob_start(); 

$jdb = new CYZ_JDB(__DIR__.'/db/');

$jdb->db_init('employees-db');

$table_name = 'employees-contact-details';

// Create Table
if(!$jdb->table_exits($table_name)){
  $jdb->update_table($table_name, array());
}

// Add row to table
if(!empty($_POST['name']) && !empty($_POST['email'])){
  $employee_contact_data = array(
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
    "city" => $_POST['city'],
    "state" => $_POST['state'],
    "zip" => $_POST['zip'],
    "country" => $_POST['country']
  );

  $jdb->add_row($table_name, $employee_contact_data);
}

// var_dump($jdb->get_table($table_name));

// Get all rows
if($jdb->table_exits($table_name)) $db_table = $jdb->get_table($table_name);
else $db_table = null; ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
  </head>
  <body>

    <h1>JDB Examples</h1>

    <hr />

    <h2>Current DB</h2>

    <?php

    if(empty($db_table)): ?>

    <p>No data in db</p>

    <?php else: ?>
    <table>
    
      <?php foreach($db_table as $row_index => $row_data): ?>
      <tr>
        <td><?php echo $row_data['name'] ?></td>
        <td><?php echo $row_data['email'] ?></td>
        <td><?php echo $row_data['phone'] ?></td>
        <td><?php echo $row_data['address'] ?></td>
        <td><?php echo $row_data['city'] ?></td>
        <td><?php echo $row_data['state'] ?></td>
        <td><?php echo $row_data['zip'] ?></td>
        <td><?php echo $row_data['country'] ?></td>
      </tr>
      <?php endforeach; ?>

    </table>
    <?php endif; ?>

    <form method="post">
      <input type="text" name="name" required/>
      <input type="text" name="email" required/>
      <input type="text" name="phone"/>
      <input type="text" name="address"/>
      <input type="text" name="city"/>
      <input type="text" name="state"/>
      <input type="text" name="zip"/>
      <input type="text" name="country"/>
      <button type="submit">SUBMIT</button>
    </form>

  </body>
</html>

<?php 

ob_end_flush();
exit; ?>
