<div id="tabMinContainer">
	<div class="tabMin" style="width:30px;height:30px;">
		<img id="oneMin" class="tabMinImg" src="./public/images/pc2.jpg" onClick="showMaxTab('oneMin')" style="width:28px;height:28px;">
	</div>
	<div class="tabMin">
		<img id="fileTreeMin" class="tabMinImg" src="./public/images/dir_close.jpg" onClick="showMaxTab('fileTreeMin')" style="width:28px;height:28px;">
	</div>
	<div class="tabMin">
		<img id="threeMin" class="tabMinImg" src="./public/images/tick.jpg" onClick="showMaxTab('threeMin')" style="width:28px;height:28px;">
	</div>
	<div class="tabMin">
		<img id="fourMin" class="tabMinImg" src="./public/images/gear.jpg" onClick="showMaxTab('fourMin')" style="width:28px;height:28px;">
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
			</tbody>
			</table>

			<table>
			<tbody>
			<tr><th class="accordionTabHead" onclick="showSubTab('table2')">Second<th></tr>
			<tr><td class="accordionSubTab , table2">Dude</td></tr>
			<tr><td class="accordionSubTab , table2">Man</td></tr>
			<tr><td class="accordionSubTab , table2">guys</td></tr>
			</tbody>
			</table>

			<table>
			<tbody>
			<tr><th class="accordionTabHead" onclick="showSubTab('table3')">Third<th></tr>
			<tr><td class="accordionSubTab , table3">1</td></tr>
			<tr><td class="accordionSubTab , table3">2</td></tr>
			<tr><td class="accordionSubTab , table3">3</td></tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="tabMax" id="fileTreeMax">
		<div id="treeParent">

		</div>
	</div>
	<div class="tabMax" id="threeMax">
	ccccc
	</div>
	<div class="tabMax" id="fourMax">
	ddddd
	</div>
</div>