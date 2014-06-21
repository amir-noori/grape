<br />

<div class="accordionContainer">
	<table>
	<tbody>
	    
	<tr><th class="accordionTabHead" onclick="showSubTab('table1'); showMainStuff('home')">Home</th></tr>

	<tr><th class="accordionTabHead" onclick="showSubTab('table2')">Categories</th></tr>
	    <gr:showCatsList>
            <tr><td class="accordionSubTab , table2">No Categories</td></tr>    	
        </gr:showCatsList>
        
    <tr><th class="accordionTabHead" onclick="showForumTopics('table2')"><forum:forumMainLink></forum:forumMainLink></th></tr> 
        
	<tr><th class="accordionTabHead" onclick="showSubTab('table3'); showMainStuff('about')">About</th></tr>

	<tr><th class="accordionTabHead" onclick="showSubTab('table4'); showMainStuff('contact')">Contact</th></tr>
	
	</tbody>
	</table>
</div>