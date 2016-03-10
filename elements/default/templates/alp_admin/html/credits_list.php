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
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">
					<tr> 
                      <td colspan="4" class="tdheading">
					  <b>&nbsp;<?phpphp echo $BL->props->lang['~credits']; ?></b>
					  </td>
                    </tr>
					<tr> 
                      <td colspan="4" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
                    </tr>
            		<form name='form1' id='form1' action="<?phpphp echo $PHP_SELF; ?>" method="POST">
            		<?phpphp if (!count($allCustomers)) { ?>
            				<tr>
            					<td class="text_grey" colspan="4">
                                	<div align='center'>
                                	<?phpphp echo $BL->props->lang['No_customers']; ?>
                                	</div>
            					</td>
            				</tr>
            		<?phpphp } else { ?>														
                    <tr>
					<td class='text_grey' width='1%'></td>
					<td class='text_grey'><b><?phpphp echo $BL->props->lang['Name']; ?></b></td>
					<td class='text_grey'><b><?phpphp echo $BL->props->lang['credit']." (".$conf['symbol'].")"; ?></b></td>
					<td class='text_grey'></td>
	  				</tr>
                    <?phpphp foreach($allCustomers as $temp) { ?>
					<tr>
                      <td colspan='4' class='text_grey'>
					  <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg" width="100%" height="1"></td>
                    </tr>					
					<tr>
					<td class='text_grey'></td>
					<td class='text_grey'><a href='<?phpphp echo $PHP_SELF."?cmd=editcustomers&id=".$temp['id']; ?>'><?phpphp echo $BL->getCustomerFieldValue("name",$temp['id']); ?></a></td>
					<td class='text_grey'><input type="text" name="credit[<?phpphp echo $temp['id']; ?>]" class='search' value="<?phpphp echo $temp['credit']; ?>" size="10"></td>
					<td class='text_grey'>
							  <select name="credit_type[<?phpphp echo $temp['id']; ?>]" size="1" class='search'>
							    <option value="1" <?phpphp if($temp['credit_type'] == 1)echo "selected"; ?>><?phpphp echo $BL->props->lang['credit']; ?></option>
							    <option value="0" <?phpphp if($temp['credit_type'] == 0)echo "selected"; ?>><?phpphp echo $BL->props->lang['debit']; ?></option>
							  </select>
 					</td>
                    </tr>
					<tr>
                      <td colspan='4' class='text_grey' height="2">
					  <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
					  </td>
                    </tr>
					
					<tr>
					<td class='text_grey'></td>
					<td class='text_grey'></td>
					<td class='text_grey'><b><?phpphp echo $BL->props->lang['reason']; ?></b></td>
					<td class='text_grey'>
						<input name='credit_desc[<?phpphp echo $temp['id']; ?>]' type='text' class='search' size='30' value='<?phpphp if(!empty($temp['credit_desc']))echo $temp['credit_desc']; ?>' />
 					</td>
                    </tr>					
					
                     <?phpphp } } ?>
					<tr> 
                      <td colspan="4" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
                    </tr>			
					<tr> 
                      <td colspan="4" class="text_grey">
					  <div align="center">
							<input type='hidden' name='cmd' value='<?phpphp echo $cmd; ?>' />
					        <input type='submit' class='search1' name='update' value='<?phpphp echo $BL->props->lang['Update']; ?>' />
							</div>
					  </td>
                    </tr>
			</form>
					<tr> 
                      <td colspan="4" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
                    </tr>			
                  </table>
	</div>
</div>
<!--end content -->
<div id="navBar">
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/_sidepanel.php"); ?>
</div>
<!--end navbar -->
<?phpphp include_once $BL->props->get_page("templates/alp_admin/html/footer.php"); ?>
