<?phpphp

/*
 * Copyright © 2005-2009 Cosmopoly Europe EOOD (http://netenberg.com).
 * All Rights Reserved.
 *
 * This Cosmopoly Europe EOOD work (including software, documents, or
 * other related items) is being provided by the copyright holder under
 * the following license. By obtaining, using and/or copying this work,
 * you (the licensee) agree that you have read, understood, and will
 * comply with the following terms and conditions:
 *
 * Permission to use, copy, modify, and distribute this software and its
 * documentation, with or without modification, for any purpose and
 * without fee or royalty is hereby granted, provided that you include
 * the following on ALL copies of the software and documentation or
 * portions thereof, including modifications, that you make:
 *
 * 1. The full text of this NOTICE in a location viewable to users of the
 * redistributed or derivative work.
 *
 * 2. A short notice of the following form (hypertext is preferred, text
 * is permitted) should be used within the body of any redistributed or
 * derivative code: "Copyright © 2005-2009 Cosmopoly Europe EOOD
 * (http://netenberg.com). All Rights Reserved."
 *
 * 3. Notice of any changes or modifications to the W3C files, including
 * the date changes were made. (We recommend you provide URIs to the
 * location from which the code is derived.)
 *
 * THIS SOFTWARE AND DOCUMENTATION IS PROVIDED "AS IS," AND COPYRIGHT
 * HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY OR FITNESS
 * FOR ANY PARTICULAR PURPOSE OR THAT THE USE OF THE SOFTWARE OR
 * DOCUMENTATION WILL NOT INFRINGE ANY THIRD PARTY PATENTS, COPYRIGHTS,
 * TRADEMARKS OR OTHER RIGHTS.
 * COPYRIGHT HOLDERS WILL NOT BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL
 * OR CONSEQUENTIAL DAMAGES ARISING OUT OF ANY USE OF THE SOFTWARE OR
 * DOCUMENTATION.
 *
 * The name and trademarks of copyright holders may NOT be used in
 * advertising or publicity pertaining to the software without specific,
 * written prior permission. Title to copyright in this software and any
 * associated documentation will at all times remain with copyright
 * holders.
 */

?>

<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/header.php"); ?>  
<div id="content">  
	<div id="display_list">			
            <?phpphp
            $str1 = "\"tab0\"";
            $str2 = "\"t0\"";
            $d1   ="";
            foreach ($e_templates as $key => $value)
            {
                if($d1=="")$d1=$value['email_id'];
                $str1 .= ", \"tab".$value['email_id']."\"";
                $str2 .= ", \"t".$value['email_id']."\"";            
            }
            ?>	
            <script language="JavaScript" type="text/javascript">
            var tabs = [<?phpphp echo $str1; ?>];
            var t    = [<?phpphp echo $str2; ?>];
            </script>	
            <div id="display_list">            
            <?phpphp
            foreach ($e_templates as $key => $value)
            {
            ?>
              <div class="tabs" name='t<?phpphp echo $value['email_id']; ?>' id='t<?phpphp echo $value['email_id']; ?>' onclick="javascript:showTab('tab<?phpphp echo $value['email_id']; ?>', tabs, 't<?phpphp echo $value['email_id']; ?>', t);" onmouseover="javascript:overTab('t<?phpphp echo $value['email_id']; ?>', t);" onmouseout="javascript:outTab(t);" ><?phpphp $et="email_template_".$value['email_id']; echo $BL->props->lang[$et]; ?></div>
              <div class="tab_separator">&nbsp;</div>
            <?phpphp
            }
            ?>
              <div class="tabs" name='t0' id='t0' onclick="javascript:showTab('tab0', tabs, 't0', t);" onmouseover="javascript:overTab('t0', t);" onmouseout="javascript:outTab(t);" ><?phpphp echo $BL->props->lang['Instructions']; ?></div>
              <div class="tab_separator">&nbsp;</div>
            </div> 
			<?phpphp
			foreach ($e_templates as $key => $value)
			{
			?>
            <div id="tab<?phpphp echo $value['email_id']; ?>" name="tab<?phpphp echo $value['email_id']; ?>" class="tabContent" style="display:block;float:left;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">
                <tr><td class="tdheading">&nbsp;</td></tr>  
                <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <form name='form<?phpphp echo $value['email_id']; ?>' id='form<?phpphp echo $value['email_id']; ?>' method='post' action='<?phpphp echo $PHP_SELF; ?>'>
                        <tr>
                      <td class="text_grey" width="2%">
                      <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_icon_dot.gif' width='32' height='18'>
                      </td>
                        <td class='text_grey'>
                        <div id="form2_label">  
                           <b><?phpphp echo $BL->props->lang['email_subject']; ?></b></div>
                           <div id="form2_field">  
                           <input type='text' size='70' name='email_subject' class='search' id='email_subject' value='<?phpphp echo $value['email_subject']; ?>' />
                           </div>
                        </td>
                        </tr> 
                    <tr>
                      <td class='text_grey' colspan='2'>
                      <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg" width="100%" height="1"></td>
                    </tr>
                        <tr>
                      <td class="text_grey" width="2%" valign='top'>
                      <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_icon_dot.gif' width='32' height='18'>
                      </td>
                        <td class='text_grey'>
                        <div id="form2_label"> 
                           <b><?phpphp echo $BL->props->lang['email_body']; ?></b></div>
                           <div id="form2_field"> 
                           <textarea name='email_text' id='email_text' cols='70' rows='20' class='search' wrap="on"><?phpphp echo $value['email_text']; ?></textarea>
                           </div>
                        </td>
                        </tr>  
                    <tr>
                      <td class='text_grey' colspan='2'>
                      <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg" width="100%" height="1"></td>
                    </tr>
                        <tr>
                      <td class="text_grey" width="2%">
                      <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif' width='32' height='18'>
                      </td>
                        <td class='text_grey'>
                        <div id="form2_label"> 
                        </div>
                        <div id="form2_field"> 
                           <input type='hidden' name='email_id' value='<?phpphp echo $value['email_id']; ?>' />
                           <input type='hidden' name='cmd' value='<?phpphp echo $cmd; ?>' />
                           <input type='submit' name='submit' value='<?phpphp echo $BL->props->lang['Update']; ?>' class='search1' />
                        </div>
                        </td>
                        </tr>  
                    </form>
                    </table>
                    </td>
                </tr>
			  </table>
              </div>
            <?phpphp
            }
            ?>
              <div id="tab0" name="tab0" class="tabContent" style="display:block;float:left;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">
                    <tr><td class="tdheading">&nbsp;</td></tr>          
                    <tr>
                    <td class='text_grey'>
                        <table width="100%" border="0" cellspacing="6" cellpadding="6">  
                        <?phpphp
                        foreach ($e_templates as $key => $value)
                        {
                        ?>
                            <tr>
                            <td class='text_grey'>
                               <b><?phpphp $et="email_template_".$value['email_id']; echo $BL->props->lang[$et]; ?></b><br />
                               <pre><?phpphp $et="template_default_".$value['email_id']; echo HTMLSpecialChars($BL->props->lang[$et]); ?></pre>
                            </td>
                            </tr>   
                        <?phpphp
                        }
                        ?>      
                        </table>
                    </td>
                    </tr>         
                </table>
              </div>
		</table>
	</div>
</div>
<script language="JavaScript" type="text/javascript">
  showTab('tab<?phpphp echo $d1; ?>', tabs, 't<?phpphp echo $d1; ?>', t);
</script>
<!--end content -->
<div id="navBar">
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/_sidepanel.php"); ?>
</div>
<!--end navbar -->
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/footer.php"); ?>
