<?php
echo <<<EOF
<div id="tabMinContainer">
	<div class="tabMin" style="width:30px;height:30px;">
		<img id="oneMin" class="tabMinImg" src="./public/images/user.jpg" onclick="showMaxTab('oneMin')" style="width:28px;height:28px;">
	</div>
</div>

<div id="tabMaxContainer">
	<div class="tabMax" id="oneMax">
		<div class="accordionContainer">
			<table>
			<tbody>
			<tr><th class="accordionTabHead" onclick="showSubTab('table1')">First<th></tr>
			<tr><td class="accordionSubTab , table1">Hi</td></tr>
			<tr><td class="accordionSubTab , table1">Hello There</td></tr>
			<tr><td class="accordionSubTab , table1">Hey</td></tr>
			<tr><th class="accordionTabHead" onclick="showSubTab('table2')">First<th></tr>
			<tr><td class="accordionSubTab , table2">Hi</td></tr>
			<tr><td class="accordionSubTab , table2">Hello There</td></tr>
			<tr><td class="accordionSubTab , table2">Hey</td></tr>
			<tr><th class="accordionTabHead" onclick="showSubTab('table3')">First<th></tr>
			<tr><td class="accordionSubTab , table3">Hi</td></tr>
			<tr><td class="accordionSubTab , table3">Hello There</td></tr>
			<tr><td class="accordionSubTab , table3">Hey</td></tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="tabMax" id="fileTreeMax">
		<div id="treeParent">

		</div>
	</div>
</div>
EOF;

