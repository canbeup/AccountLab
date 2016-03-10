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

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">
    <tr> 
        <form name='form_orderby' id='form_orderby' action="admin.php" method="post">
        <input type='hidden' name='search_term' id='search_term' value='<?phpphp echo isset($BL->REQUEST['search_term'])?$BL->REQUEST['search_term']:""; ?>' >
        <input type='hidden' name='cmd' id='cmd' value='<?phpphp echo $cmd; ?>' />
        <td colspan="8" class="tdheading" align='right'>
            <?phpphp if($cmd=="viewcustomers"){ ?>
            <?phpphp echo $BL->props->lang['ORDER_BY']; ?>
            <select name="orderby2" id="orderby2" class="search" onchange="javascript:this.form.submit();">
            <option value='DESC' <?phpphp if($BL->REQUEST['orderby2']=='DESC')echo "selected"; ?> ><?phpphp echo $BL->props->lang['DESC']; ?></option>
            <option value='ASC' <?phpphp if($BL->REQUEST['orderby2']=='ASC')echo "selected"; ?> ><?phpphp echo $BL->props->lang['ASC']; ?></option>
            </select>
            <?phpphp } ?>
            &nbsp;<?phpphp echo isset($pagination)?$pagination:""; ?>
        </td>
        </form>
    </tr>
    <tr> 
        <td colspan="8" class="text_grey">
            <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
        </td>
    </tr>
    <tr> 
        <td class="text_grey" width="1%"><b>&nbsp;<?phpphp echo $BL->props->lang['Nu']; ?></b></td>
        <td class="text_grey" colspan="3"><b><?phpphp echo $BL->props->lang['Name']; ?></b></td>
        <td class="text_grey"><b><?phpphp echo $BL->props->lang['Country']; ?></b></td>
        <td class="text_grey"><div align='right'><b><?phpphp echo $BL->props->lang['total_paid']; ?></b></div></td>
        <td class="text_grey"><div align='right'><b><?phpphp echo $BL->props->lang['total_pending']; ?></b></div></td>
        <td class="text_grey" width="15%"><div align="left"><b></b></div></td>
    </tr>
    <?phpphp foreach ($Customers as $temp) { ?>
    <?phpphp $accounts = $BL->getAccounts($temp['id']); ?>
    <tr>
        <td colspan='8' class='text_grey'>
            <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg" width="100%" height="1" />
        </td>
    </tr>       
    <tr>
        <td class='text_grey'><div align='left'>&nbsp;<?phpphp echo $temp['id']; ?></div></td>
        <td class='text_grey'><div align='left'><a href="<?phpphp echo $PHP_SELF; ?>?cmd=editcustomers&id=<?phpphp echo $temp['id']; ?>"><?phpphp echo $BL->getCustomerFieldValue("name",$temp['id']); ?></a></div></td>
        <td class='text_grey'><div align='left'>[<a href="<?phpphp echo $PHP_SELF; ?>?cmd=vieworders&id=<?phpphp echo $temp['id']; ?>"><?phpphp echo $BL->props->lang['^orders']; ?></a>]</div></td>
        <td class='text_grey'><div align='left'>[<a href="<?phpphp echo $PHP_SELF; ?>?cmd=viewinvoice&id=<?phpphp echo $temp['id']; ?>"><?phpphp echo $BL->props->lang['^invoices']; ?></a>]</div></td>
        <td class='text_grey'><div align='left'><?phpphp echo $BL->props->country[$BL->getCustomerFieldValue("country",$temp['id'])]; ?></div></td>
        <td class='text_grey'><div align='right'><b><?phpphp echo $BL->toCurrency($accounts[$BL->props->invoice_status[1]],null,1); ?></b></div></td>
        <td class='text_grey'><div align='right'><b><?phpphp echo $BL->toCurrency($accounts[$BL->props->invoice_status[0]],null,1); ?></b></div></td>
        <td class='text_grey'>
            <div align='right'>
            <?phpphp if($BL->getCmd("editcustomers")){ ?>
            <a href="<?phpphp echo $PHP_SELF; ?>?cmd=editcustomers&id=<?phpphp echo $temp['id']; ?>">
            <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>edit_all.gif' alt='<?phpphp echo $BL->props->lang['Edit']; ?>'  border='0' />
            </a>
            &nbsp;
            <?phpphp } ?>
            <?phpphp if($cmd=="viewcustomers"){ ?>
            <?phpphp if($BL->getCmd("addorder")){ ?>
            <a href="<?phpphp echo $PHP_SELF; ?>?cmd=addorder&id=<?phpphp echo $temp['id']; ?>">
            <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>add_order.gif' alt='<?phpphp echo $BL->props->lang['Add_New_Order']; ?>' border='0' />
            </a>
            &nbsp;
            <?phpphp } ?>
            <?phpphp if($BL->getCmd("delcustomers")){ ?>
            <a href="javascript:if(confirm('<?phpphp echo $BL->props->lang['Do_you_want_to_delete_this_customer']; ?>'))document.location='<?phpphp echo $PHP_SELF; ?>?cmd=delcustomers&id=<?phpphp echo $temp['id']; ?>'">
            <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>delete.gif' border='0' />
            </a>
            &nbsp;
            <?phpphp } ?>
            <?phpphp } ?>
            </div>
        </td>
    </tr>
    <?phpphp } ?>
    <tr> 
        <td colspan="8" class="text_grey">
            <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
        </td>
    </tr>   
      </table>
      <br />
