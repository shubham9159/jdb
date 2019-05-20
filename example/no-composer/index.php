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
          <div class="col-lg-3 col-md-4 col-12">
            <h3>Example Select</h3>
            <div class="link-list">
              <a href="">JDB Row Add Data</a>
            </div>
          </div>

          <!-- Content -->
          <div class="col-lg-9 col-md-8 col-12">

            <h3>Explanations</h3>
            <p>This is code explanation</p>

            <h3 class="mt-5">Code</h3>
            <p>This code illustrates - how to add data into table row.</p>
            <?php include __DIR__.'/codes/add-row-code.php'; ?>
            

            <h3 class="mt-5">DB Content</h3>
            <h4 class="mt-2">Latest Records Fetched From DB</h4>

            <?php if(empty($db_table)): ?>
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
                  <input class="form-control" id="name" type="text" name="name" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email Address</label>
                  <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Phone Number</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

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

    <?php include __DIR__.'/templates/footer.php'; ?>

  </body>
</html>

<?php 

ob_end_flush();
exit; ?>