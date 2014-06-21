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
	<input type="button" class="userPanelButton" value="Show All Users" onclick="showAllUsers('0')">

	<br><br><br>
	<input type="button" class="userPanelButton" value="Create New User" onclick="showCreateNewUser()">
	<div id="createNewUserContainer">
		<br><br>
		<table>
			<tbody>
				<tr><td class="createNewUserColumn">First Name:</td><td><input type="text" class="generalInput" size="20"></td><td class="createNewUserErrMessage"></td></tr>
				<tr><td class="createNewUserColumn">Last Name:</td><td><input type="text" class="generalInput" size="20"></td><td class="createNewUserErrMessage"></td></tr>
				<tr><td class="createNewUserColumn">E-Mail:</td><td><input type="text" class="generalInput" size="20"></td><td class="createNewUserErrMessage"></td></tr>
				<tr><td class="createNewUserColumn">Password:</td><td><input type="password" class="generalInput" size="20"></td><td class="createNewUserErrMessage"></td></tr>
				<tr><td class="createNewUserColumn">Confirm Password:</td><td><input type="password" class="generalInput" size="20"></td><td class="createNewUserErrMessage"></td></tr>
			<tbody>
		</table>
	</div>
	
	<br><br><br>
	<input type="button" class="userPanelButton" value="Show All Users" onclick="showAllUsers('0')">
	<br><br><br>
	<input type="button" class="userPanelButton" value="Show All Users" onclick="showAllUsers('0')"><br><br><br>
	<input type="button" class="userPanelButton" value="Show All Users" onclick="showAllUsers('0')"><br><br><br>
	<input type="button" class="userPanelButton" value="Show All Users" onclick="showAllUsers('0')">
	
</div>