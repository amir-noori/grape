<html>
<body>
<?php

$data = '<?xml version="1.0" encoding="UTF-8" ?>';
$data .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$data .= '<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">';
$data .= '<forum:forumBoxes>
            <forum:forumBox>
                <p>Topic: <forum:forumTopic>a</forum:forumTopic></p>
                <p>Created At: <forum:forumCreated>a</forum:forumCreated></p><hr />
            </forum:forumBox>
          </forum:forumBoxes>';
$data .= '<h1>Hi</h1>';          
$data .= '</span>';

$dom = new DOMDocument('1.0', 'utf-8');
$dom->loadXML($data);

$childTag = getValueByNameSpaceAndTag($dom , 'forumBox');
for($i = 0 ; $i < 10 ; $i++)
{
    $parent = $childTag->parentNode;
    $doppel = $childTag->cloneNode(true);
    
    $tagXML = '<?xml version="1.0" encoding="UTF-8" ?>';
    $tagXML .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    $tagXML .= '<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">';
    $tagXML .= $dom->saveXML($doppel);
    $tagXML .= '</span>';

    $dom2 = new DOMDocument('1.0', 'utf-8');
    $dom2->loadXML($tagXML);
    
    setValue($dom2, 'forumTopic' , 'Topic' . $i);
    setValue($dom2, 'forumCreated' , 'Now' . $i);
    $doppel->nodeValue = htmlspecialchars_decode($dom2->saveHTML());
    
    $parent->appendChild($doppel); 
}

echo htmlspecialchars_decode($dom->saveHTML());


/*
$tag = getValueByNameSpaceAndTag($dom , $nameSpace , $tagName);
$tagXML = '<?xml version="1.0" encoding="UTF-8" ?>';
$tagXML .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$tagXML .= '<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">';
$tagXML .= $dom->saveXML($tag);
$tagXML .= '</span>';

$dom2 = new DOMDocument('1.0', 'utf-8');
$dom2->loadXML($tagXML);

$childTag = getValueByNameSpaceAndTag($dom2);
echo '<hr>' . $childTag->parentNode->nodeName . '<hr>';
$parent = $childTag->parentNode;
$doppel = $childTag->cloneNode(true);
$parent->appendChild($doppel);

setValue($dom2, 'forumTopic' , 'Topic');
setValue($dom2, 'forumCreated' , 'Now');

//$tag->nodeValue = 
//echo $tagXML;
$tag->nodeValue = htmlspecialchars_decode($dom2->saveHTML());
echo htmlspecialchars_decode($dom->saveHTML());
*/

function getValueByNameSpaceAndTag($domObject , $tagName)
{
    $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/forum' , $tagName);

    foreach($tags as $tag) 
    {
        return $tag;
    }
}

function setValue($domObject , $tagName , $value)
{
    $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/forum' , $tagName);
    foreach($tags as $tag) 
    {
        $tag->nodeValue = $value;
    }
}

?>
</body>
</html>