<?php

    function setValue($domObject , $tagName , $value)
    {
        $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/template' , $tagName);
        foreach($tags as $tag) 
        {
            $tag->nodeValue = $value;
        }
    }