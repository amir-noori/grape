<?php
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    require_once(dirname(__FILE__) . '/../../../conf/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template">
    <table>
        <tbody>
            <form>
				<tr><td>Full Name:</td><td style="padding:10;"><input class="generalInput" name="name" type="text" value="Your Name" size="40" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}"></td></tr>
				<tr><td>Mail:</td><td style="padding:10;"><input class="generalInput" name="name" type="text" value="Your Mail" size="40" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}"></td></tr>	
				<tr>
					<td>Message:</td>
					<td style="padding:10;">
						<textarea class="generalInput" style="resize: none;" rows="10" cols="50" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}">Your Message</textarea> 
					</td>
				</tr>		
				<tr><td>&nbsp;&nbsp;&nbsp;<input type="submit" class="generalInput" value="Send"></td></tr>	
			</form>
        </tbody>    
    </table>    
</span>
