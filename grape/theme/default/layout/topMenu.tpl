<div id="topMenu">
    <ul id="nav">
    	<li><a style="border-top-left-radius:10px;border-bottom-left-radius:10px;" href="#" onclick="showMainStuff('home')">Home</a></li>
    	<li><a href="#">Categories</a>
    	    <ul>
    	        <gr:showCatsList><li><a href="#" >No Categories...</a></li>
            	</gr:showCatsList>
    	    </ul>    
    	</li>
    	<li><a href="#" onclick="showForumTopics()"><forum:forumMainLink></forum:forumMainLink></a></li>	
    	<li><a href="#" onclick="showMainStuff('about')">About</a></li>
    	<li><a style="border-top-right-radius:10px;border-bottom-right-radius:10px;" href="#" onclick="showMainStuff('contact')">Contact</a></li>		
    </ul>
</div>