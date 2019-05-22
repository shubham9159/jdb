<?php

require_once 'JDB/JDB.php'; 

ob_start(); 

$jdb = new CYZ_JDB(__DIR__.'/db/');

$jdb->db_init('employees-db');

$table_name = 'employees-contact-details';

// Create Table
$jdb->create_table($table_name);

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

// Get all rows
$db_table = $jdb->get_table($table_name); ?>

<!DOCTYPE html>
<html class="no-js">

<!-- Head -->
<?php include __DIR__.'/templates/head.php'; ?>

<body id="page-top">

  <!-- Head -->
  <?php include __DIR__.'/templates/header.php'; ?>

  <!-- Example content Section -->
  <section class="mb-0 bg-light" id="example-content">
    <div class="container">
      <div class="row">

        <!-- Content -->
        <div class="col-lg-12 col-md-12 col-12">

          <h3 class="mb-3">Explanations</h3>
          <p class="text-align">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id tellus dolor. Proin sit amet nibh
            tempus, porta lectus a, lobortis dolor. Cras ac dui et tortor vehicula rutrum. Etiam euismod cursus libero,
            quis porta turpis dignissim ut. Pellentesque blandit ipsum sem, id tempus sem fringilla et. Pellentesque
            augue ex, tincidunt sit amet lorem eget, euismod mattis enim. Nullam maximus urna vitae turpis lacinia
            viverra. Vivamus condimentum lorem a tellus interdum, id feugiat leo maximus. Morbi condimentum ornare ex,
            sit amet luctus est tristique at. Duis in mi consectetur, posuere est ultricies, pharetra dui.

            Aliquam sed consequat metus, quis maximus enim. Aliquam id tristique nulla. Etiam elit lacus, ullamcorper at
            congue vitae, fermentum vel leo. Vivamus luctus sollicitudin urna, nec vulputate enim posuere eu. Etiam
            vehicula risus consectetur est commodo congue. Vestibulum malesuada mauris et augue rhoncus aliquet. Aenean
            volutpat fringilla imperdiet. Nam vitae vehicula purus, vel posuere enim. Integer pretium eu felis id
            volutpat. Vivamus tempus varius luctus. Donec aliquet feugiat diam, quis vestibulum ante faucibus at.
            Suspendisse ornare condimentum ornare. Vestibulum semper elit metus, non cursus nunc auctor eu. Lorem ipsum
            dolor sit amet, consectetur adipiscing elit. Integer nulla mauris, maximus vitae elit vel, aliquet iaculis
            orci. Curabitur lacus lacus, iaculis vel hendrerit at, convallis quis arcu.</p>

        </div>
      </div>
      <h3 class="mt-5 mb-3">Select Example</h3>
      <ol>
        <li>
        <a href="add-db.php">Add DB</a>
        </li>
        <li>
        <a href="delete-db.php">Delete DB</a>
        </li>
        <li>
        <a href="add-table.php">Add Table</a>
        </li>
        <li>
        <a href="delete-table.php">Delete Table</a>
        </li>
        <li>
        <a href="add-row.php">Add Row Data</a>
        </li>
        <li>
        <a href="add-column.php">Add Column</a>
        </li>
        <li>
        <a href="update-column.php">Update Column</a>
        </li>
        <li>
        <a href="delete-column.php">Delete Column</a>
        </li>
      </ol>
  </section>



  <?php include __DIR__.'/templates/footer.php'; ?>

</body>

</html>

<?php 

ob_end_flush();
exit; ?>