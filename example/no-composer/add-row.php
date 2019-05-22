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

        <!-- Sidebar -->
        <?php include __DIR__.'/templates/sidebar.php'; ?>

        <!-- Content -->
        <div class="col-lg-9 col-md-8 col-12">

          <h3>Explanations</h3>
          <p>This code is the explanation for adding row</p>

          <h3 class="mt-5">Code</h3>
          <p>This code illustrates - how to add data into table row.</p>
          <?php include __DIR__.'/codes/add-row-code.php'; ?>


          <h3 class="mt-5">DB Content</h3>
          <h4 class="mt-2">Latest Records Fetched From DB</h4>

          <?php if(empty($db_table)): ?>
          <p>No data in db</p>

          <?php else: ?>
          <table class="table table-bordered table-striped">
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
        </div>
        <!-- Content ENDS -->

      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-5">JDB Add Row Form</h2>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
          <form id="form" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" name="name" id="name" type="text" placeholder="Name" required="required"
                  data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" name="email" id="email" type="email" placeholder="Email Address"
                  required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Phone Number"
                  required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Address</label>
                <input class="form-control" name="address" id="name" type="text" placeholder="Address"
                  required="required" data-validation-required-message="Please enter your Address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>City</label>
                <input class="form-control" name="city" id="name" type="text" placeholder="City" required="required"
                  data-validation-required-message="Please enter your City.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>State</label>
                <input class="form-control" name="state" id="name" type="text" placeholder="State" required="required"
                  data-validation-required-message="Please enter your State.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Zip</label>
                <input class="form-control" name="zip" id="name" type="text" placeholder="Zip" required="required"
                  data-validation-required-message="Please enter your Zip.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Country</label>
                <input class="form-control" name="country" id="name" type="text" placeholder="Country"
                  required="required" data-validation-required-message="Please enter your Country.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
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
