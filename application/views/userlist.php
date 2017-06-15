<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<h1>Users</h1>
	
	<div id="body">
	
		<p><a href="/user/add">Add User</a></p>
	
		<table border="1" cellpadding="5">
		<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>
		<?php	

		foreach ($users as $user){
			echo "<tr><td>$user->firstname</td><td>$user->lastname</td><td>$user->email</td><td><a href='/user/edit/$user->id'>Edit</a> | <a href='/user/delete/$user->id'>Delete</a></td></tr>";
		}
		
		?>
		</table>
		<br>
	</div>
