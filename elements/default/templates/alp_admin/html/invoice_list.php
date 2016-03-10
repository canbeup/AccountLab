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
      <div class="tabs2" name='tt1' id='tt1' onmouseover="javascript:this.className='tabs1';" onmouseout="javascript:this.className='tabs2';" ><?phpphp echo $status." ".$BL->props->lang['^invoices']; ?></div>
      <div class="tab_separator">&nbsp;</div>
      <div class="tabs" name='tt2' id='tt2' onmouseover="javascript:this.className='tabs1';" onmouseout="javascript:this.className='tabs';" ><a href="admin.php?cmd=manual_payments" class="add_link"><?phpphp echo $BL->props->lang['~manual_payments']; ?></a></div>
      <div class="tab_separator">&nbsp;</div>
    </div>
    <div id="display_list">
    <?phpphp include_once $BL->props->get_page("templates/alp_admin/html/_invoices.php"); ?>
	<table width="100%" border="0" cellspacing="2" cellpadding="2" class="list_table">
	<tr> 
    <td class="text_grey" align="center">
    <div style="vertical-align:middle">
    <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>pdf.gif' alt='<?phpphp echo $BL->props->lang['PDF']; ?>' border='0' /> <?phpphp echo $BL->props->lang['PDF']; ?>
    &nbsp;
    <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>edit_all.gif' border="0" /> <?phpphp echo $BL->props->lang['Edit']; ?>
    &nbsp;
    <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>delete.gif' border="0" /> <?phpphp echo $BL->props->lang['Delete']; ?>
    </div>
    </td>
    </tr>
	</table>
	</div>
</div>
<!--end content -->
<div id="navBar">
<form name='form1' id='form1' method='POST' action='<?phpphp echo $PHP_SELF; ?>'>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr> 
    <td class='text_grey'>
      <input type='text' name='search_term' id='search_term' value='<?phpphp echo isset($BL->REQUEST['search_term'])?$BL->REQUEST['search_term']:""; ?>' size='20' class='search'>
      <input type='hidden' name='cmd' id='cmd' value='<?phpphp echo $cmd; ?>' />
      <input type='hidden' name='status' id='status' value='<?phpphp echo $status; ?>' />
      <input type='hidden' name='id' id='id' value='<?phpphp echo isset($BL->REQUEST['id'])?$BL->REQUEST['id']:0; ?>' />
      <input type='submit' name='submit1' class='search1' value='<?phpphp echo $BL->props->lang['search']; ?>'>
    </td>
</tr>      
</table>
</form> 
<br />
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<?phpphp foreach ($BL->props->invoice_status as $key => $val) { ?>
<tr>
    <td class='text_grey'>
    <a href="<?phpphp echo $PHP_SELF; ?>?cmd=viewinvoice<?phpphp echo isset($BL->REQUEST['id'])?("&id=".$BL->REQUEST['id']):""; ?>&status=<?phpphp echo $val; ?>"><b><?phpphp echo $val. " ";  echo $BL->props->lang['^invoices']." (".count($BL->dbL->executeSELECT("SELECT * FROM `invoices` WHERE `status`='".$val."'")).")"; ?></b></a>
    </td>
</tr>
<tr> 
    <td class='text_grey'>
    <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen.jpg' width='100%' height='2' />
    </td>
</tr>
<?phpphp } ?>
</table>
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/_sidepanel.php"); ?>
</div>
<!--end navbar -->
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/footer.php"); ?>
