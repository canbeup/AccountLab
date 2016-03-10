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
    <form name='form1' id='form1' action="<?phpphp echo $PHP_SELF; ?>" method="POST">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">	
	<?phpphp
	$int = 0;
	foreach ($BL->pg as $key => $val) {
		$int = $int+1;
	?>
	<tr> 
        <td class="tdheading">
            <b>&nbsp;<?phpphp echo $BL->pg_name[$val]; ?> <?phpphp if($BL->pp_active[$val]=="Yes")echo "(*".$BL->props->lang['active'].")"; ?></b>
	    </td>
        <td class="tdheading" align="right">
            <a href="#" onClick="expandcontent('section_<?phpphp echo $val; ?>')"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>top_arrow.gif" alt="" border="0" /></a>
        </td>	  
    </tr>
	<tr> 
        <td class="text_grey" colspan="2">
            <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
        </td>
    </tr>	
	<tr> 
        <td class="text_grey" colspan="2">
            <div id='section_<?phpphp echo $val; ?>' class="switchcontent">    
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <?phpphp foreach ($BL->arrays[$val] as $k => $v) { ?>
            <tr> 
            <td valign='top' class='text_grey'>
                <?phpphp
	            $pp_val= $pp_vals[$val];
	            if (count($v) == 2) {
                ?>
                <div id="form1_label">
                &nbsp;<?phpphp echo $v[0]; ?>
                </div>
                <div id="form1_field">
                <?phpphp if ($v[1] == "disp_msg") { ?>
                <textarea name='<?phpphp echo $val."[".$v[1]."]"; ?>' id='<?phpphp echo $val."[".$v[1]."]"; ?>' cols='55' rows='10'><?phpphp echo $pp_val[$v[1]]; ?></textarea>
                <?phpphp } else { ?>
                <input class='search' type='text' value='<?phpphp echo $pp_val[$v[1]]; ?>' name='<?phpphp echo $val."[".$v[1]."]"; ?>' id='<?phpphp echo $val."[".$v[1]."]"; ?>' size='30' />
                <?phpphp } ?>
                </div>
                <?phpphp } else { ?>
                <div id="form1_label">
                &nbsp;<?phpphp echo $v[0]; ?>
                </div>
                <div id="form1_field">
                <select name='<?phpphp echo $val."[".$v[1]."]"; ?>' id='<?phpphp echo $val."[".$v[1]."]"; ?>' class='search'>
                <?phpphp for ($i= 2; $i < count($v); $i ++) { ?>
                <option value='<?phpphp echo $v[$i]; ?>' <?phpphp if($v[$i]==$pp_val[$v[1]])echo "selected=\"selected\""; ?>><?phpphp echo $v[$i]; ?></option>
                <?phpphp } ?>
                </select>
                </div>
                <?phpphp } ?>
            </td>
            </tr>		
            <tr> 
              <td class='text_grey' colspan="2">
              <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg' width='100%' height='1' />
              </td>
            </tr>			 		  
			<?phpphp } ?>
	        </table>
	        </div>
        </td>
    </tr>
	<?phpphp } ?>
	<tr> 
        <td class="text_grey" colspan="2">
        <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
        </td>
    </tr>
    <tr>
        <td class='text_grey' colspan="2">
        <div id="form1_label">&nbsp;</div>
        <div id="form1_field">
 		<input type='hidden' name='cmd' value='<?phpphp echo $cmd; ?>' />
        <input type='submit' class='search1' name='update' value='<?phpphp echo $BL->props->lang['Update']; ?>' />
		</div>
	    </td>
    </tr>
	<tr> 
        <td class="text_grey">
        <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
        </td>
    </tr>	
	</form>
    </table>
	</div>
</div>
<!--end content -->
<div id="navBar">
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/_sidepanel.php"); ?>
</div>
<!--end navbar -->
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/footer.php"); ?>
