<?php session_start(); ?>
<div id="userPanelContainter">

	<div id="sreachUserContainer">
		<form>
			<table>
				<tbody>
					<tr><td><input type="text" id="searchUserInput" class="generalInput" size="20" value="search users" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}"></td><td><input type="button" class="generalInput" value="Search"></td></tr>
				</tbody>
			</table>			
		</form>
	</div>
	
	<br><br><br><br><br><br>
	<?php
		require_once(dirname(__FILE__) . '/../../db/DB.class.php');
		$usersPerPage = 5;
		$usersCount = DB::executeQuery('SELECT COUNT(*) FROM `User`' , true);
		$pagesCount = ($usersCount[0][0])/$usersPerPage;
		$users = DB::getRows('User' , null , $_POST['pageNumber']*$usersPerPage , $usersPerPage);
		echo '<table class="genralTable"><tbody><th>User Name</th><th>First Name</th><th>Last Name</th><th>E-Mail</th><th>Edit</th><th>Delete</th>';
		foreach($users as $user)
		{
			echo '<tr id="user_' . $user['id'] . '"><td>' . $user['userName'] . '</td>';
			echo '<td>' . $user['firstName'] . '</td>';
			echo '<td>' . $user['lastName'] . '</td>';
			echo '<td>' . $user['email'] . '</td>';
			echo '<td class="middleTableEdit" onclick="editUser(\'' . $user['id'] . '\')">Edit</td>';
			echo '<td class="middleTableDelete" onclick="deleteUser(\'' . $user['id'] . '\')">Delete</td></tr>';
		}
		echo '<tbody></table>';
		
		echo '<table><tbody><tr>';
		for($i = 0 ; $i < $pagesCount ; $i++)
		{
			echo '<td class="chooseUserPageNumber" onclick="showAllUsers(\'' . $i . '\')">' . $i . '</td>';
		}
		echo '</tr><tbody></table>';
	?>
	
</div>