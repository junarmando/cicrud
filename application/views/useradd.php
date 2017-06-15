<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$email = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => set_value('email'),
              'maxlength'   => '100',
              'size'        => '50',
              'class'       => 'frm_field',
            );
			
$firstname = array(
              'name'        => 'firstname',
              'id'          => 'firstname',
              'value'       => set_value('firstname'),
              'maxlength'   => '100',
              'size'        => '50',
              'class'       => 'frm_field',
            );
			
$lastname = array(
              'name'        => 'lastname',
              'id'          => 'lastname',
              'value'       => set_value('lastname'),
              'maxlength'   => '100',
              'size'        => '50',
              'class'       => 'frm_field',
            );			
?>

<h1>Add User</h1>
<div id="body">
<p><a href="/user">List Users</a></p>


<div class="error"><?php echo validation_errors(); ?></div>


<?php 
$attributes = array('id' => 'myform');
echo form_open(base_url().'user/add', $attributes); 
?>

<label>First Name</label><?php echo form_input($firstname); ?><br>
<label>Last Name</label><?php echo form_input($lastname); ?><br>
<label>Email</label><?php echo form_input($email); ?><br>

<input type="submit" value="Submit" />
</form>
</div>