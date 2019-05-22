<?php

require_once 'JDB/JDB.php'; 

ob_start(); 

$jdb = new CYZ_JDB(__DIR__.'/db/');

// Add row to table
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['db-name'])){
  $jdb->delete_db($_POST['db-name']);
}

// Get all rows
$db_names = $jdb->get_db_names(); ?>

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

        <!-- Sidebar -->
        <?php include __DIR__.'/templates/sidebar.php'; ?>

        <!-- Content -->
        <div class="col-lg-9 col-md-8 col-12">

          <h3>Explanations</h3>
          <p>This is code explanation</p>

          <h3 class="mt-5">Code</h3>
          <p>This code illustrates - how to add data into table row.</p>
          <?php include __DIR__.'/codes/add-row-code.php'; ?>


          <h3 class="mt-5">DB Content</h3>
          <h4 class="mt-2">Latest Records Fetched From DB</h4>

          <?php if(empty($db_names)): ?>
          <p>No DB Found</p>

          <?php else: ?>
          <table class="table table-bordered table-striped">
            <?php foreach($db_names as $db_name): ?>
            <tr>
              <td><?php echo $db_name; ?></td>
            </tr>
            <?php endforeach; ?>

          </table>
          <?php endif; ?>
        </div>
        <!-- Content ENDS -->

      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-5">Delete DB Form</h2>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
          <form id="form" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-5 pb-2">
                <label>Name</label>
                <input class="form-control" name="db-name" id="name" type="text" placeholder="Name" required="required"
                  data-validation-required-message="Please enter the name of DB you want to add.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl">SUBMIT</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include __DIR__.'/templates/footer.php'; ?>

</body>

</html>

<?php 

ob_end_flush();
exit; ?>
