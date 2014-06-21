<div id="tryLogin" class="mainChild" style="margin:auto;margin-right:22%;width:60%;height:45%;border:solid 2px;margin-top:15%;box-shadow: 5px 5px 5px #888888;border-radius:5px;">
	<br />
	<div style="text-align:center;margin:auto;width:99%;border:solid 1px;background-color:#eee;border-color:#aaa;font-size:22px;color:red;">
		<b>User Name and/or Password you Entered was Wrong!</b>
	</div>
	<br />
	<div style="margin:auto;">
		<form action="<?php echo $GLOBALS['config']['siteURL'] . 'src/sites/site/login.php'; ?>" mothod="POST">
			<table style="margin:auto;">
				<tbody>
					<tr><td class="generalText">E-Mail:</td><td><input class="generalInput" type="text" /></td><td class="regErrMess"></td></tr>		
					<tr><td class="generalText">Password:</td><td><input class="generalInput" type="password" value="" /></td><td class="regErrMess"></td></tr>
					<tr><td><input type="submit" class="generalInput" value="Log In" /></td></tr>
				</tbody>
			</table>
		</form>
	</div>
	<br />
</div>