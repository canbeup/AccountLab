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

<?phpphp include_once $BL->props->get_page("templates/".THEMEDIR."/html/user/header.php"); ?>
<script language="JavaScript" type="text/javascript">
var tabs = ["tab1"];
var t    = ["t1"];
</script>  
<!--tabs//-->
<div class="tabs" name='t1' id='t1' onclick="javascript:showTab('tab1', tabs, 't1', t);" onmouseover="javascript:overTab('t1', t);" onmouseout="javascript:outTab(t);" ><?phpphp echo $BL->props->lang['Invoice']; ?></div>
<div class="tab_separator">&nbsp;</div>
<div class="tabs" name='t2' id='t2'><a href='info.php?cmd=PDF&invoice_no=<?phpphp echo $invoice['invoice_no']; ?>' target='_blank'><?phpphp echo $BL->props->lang['PDF']; ?></a></div>
<div class="tab_separator">&nbsp;</div>
<div class="tabs" name='t3' id='t3'><a href='info.php?cmd=PRINT&invoice_no=<?phpphp echo $invoice['invoice_no']; ?>' target='_blank'><?phpphp echo $BL->props->lang['Print']; ?></a></div>
<div class="tab_separator">&nbsp;</div>
<div>
<div id="tab1" name="tab1" class="tabContent" style="display:none">
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr> 
 <td colspan='2'>
 <?phpphp echo $html_buffer; ?>
 </td>
</tr>
<tr>
   <td colspan='2' >
   <?phpphp echo $BL->props->lang['the_invoice_is']." ".($invoice['status']); ?>. <?phpphp echo $BL->props->lang['If_u_have']; ?><a href='mailto:<?phpphp echo $conf['comp_email']; ?>' class='accountlabPlanLink'><?phpphp echo $BL->props->lang['contactus']; ?>.</a>
   </td>
</tr>             
<tr>
   <td colspan='2' ><hr></td>
</tr>
</table>
<!--pay invoice section //-->
<?phpphp if($invoice['status']==$BL->props->invoice_status[0]){ ?>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<form action="<?phpphp echo $PHP_SELF; ?>" method="post" name='pay_form1' id='pay_form1'>
<tr> 
    <td colspan='2' >
    <b><?phpphp echo $BL->props->lang['payment_options']; ?></b>
    </td>
</tr>
<tr>
    <td height='18' colspan='2' >&nbsp;</td>
</tr>
<tr> 
    <td colspan='2' >
    <select name='pp' id='pp' class='accountlabInput' onchange="javascript:this.form.submit();">
    <?phpphp foreach($BL->pg as $k=>$v){ ?>
    <?phpphp if($BL->pp_active[$v]=="Yes"){ ?>
    <option value='<?phpphp echo $v; ?>' <?phpphp if($v==$invoice['payment_method'])echo "selected=\"selected\""; ?>><?phpphp echo $BL->pg_name[$v]; ?></option>
    <?phpphp } ?>
    <?phpphp } ?>
    </select>
    </td>
</tr>
<input type="hidden" name="cmd" id="cmd" value="pay" />
<input type="hidden" name="invoice_no" id="invoice_no" value="<?phpphp echo $REQUEST['invoice_no']; ?>" />
</form>              
<form action="<?phpphp echo $post_url; ?>" method="<?phpphp echo ($send_method=="DIRECT")?"POST":$send_method; ?>" name='pay_form2' id='pay_form2'>
<tr>
<tr>
    <td height='18' colspan='2' >&nbsp;</td>
</tr>
<?phpphp if($show_add_curr=="Yes"){ ?>
<tr> 
    <td  colspan='2'>           
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
            <td colspan='4'>
            <b><?phpphp echo $BL->props->lang['you_can_pay_by_add_cur']; ?></b>
            </td>
        </tr> 
        <tr><td colspan='4'>&nbsp;</td></tr>            
        <tr>
            <td width="2%">
            <input type='radio' name='pay_curr_id' id='pay_curr_id' value='0' <?phpphp if(empty($invoice['pay_curr_name']) || $conf['curr_name']==$invoice['pay_curr_name'])echo "checked=\"checked\""; ?> class='accountlabinput' />       
            </td>
            <td>
            <?phpphp echo $BL->props->lang['Total_amount_in'].$conf['curr_name']; ?>
            </td>
            <td align='right'>
            <?phpphp echo $BL->toCurrency($REQUEST['gross_amount'],null,1); ?>
            </td>
            <td>&nbsp;</td>
         </tr>                         
         <?phpphp 
         if(count($add_cur)){ foreach($add_cur as $ac){ 
                $curr_conf                    = array();
                $curr_conf['symbol_prefixed'] = $ac['curr_symbol_prefixed'];
                $curr_conf['symbol']          = $ac['curr_symbol'];
                $curr_conf['decimals']        = $ac['curr_decimal_number'];
                $curr_conf['str1']            = $ac['curr_decimal_str'];
                $curr_conf['str2']            = $ac['curr_thousand_str'];     
         ?>                        
         <tr>
            <td width="2%">
            <input type='radio' name='pay_curr_id' id='pay_curr_id' value='<?phpphp echo $ac['curr_id'] ?>' <?phpphp if($ac['curr_name']==$invoice['pay_curr_name'])echo "checked=\"checked\""; ?> class='accountlabinput' /> 
            </td>
            <td>
            <?phpphp echo $BL->props->lang['Total_amount_in'].$ac['curr_name']; ?>
            </td>
            <td align='right'>
            <?phpphp echo $BL->toCurrency($REQUEST['gross_amount']*$ac['curr_factor'],$curr_conf,1); ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <?phpphp } } ?>    
          <tr><td colspan='4'>&nbsp;</td></tr>
          </table>
    </td>
</tr>
<?phpphp } ?>
<tr>
    <td colspan='2' >
          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
          <tr>
             <td colspan='4'><?phpphp echo $disp_msg; ?></td>
          </tr> 
          <?phpphp if(count($add_fields)>0){ ?>
          <tr><td colspan='4'>&nbsp;</td></tr>    
          <?phpphp foreach($add_fields as $field){ ?>      
          <tr>
              <td>
                 <?phpphp echo $BL->props->lang[$field[0]]; ?><?phpphp if($field[6]==1){?><font color="red">*</font><?phpphp } ?>
              </td>
              <td>
                 <?phpphp if($field[4]=="text"){ ?>
                 <input name="<?phpphp echo $field[1]; ?>" type="text" id="<?phpphp echo $field[1]; ?>" value="<?phpphp echo $ext_fields[$field[1]]; ?>" size="<?phpphp echo $field[5]; ?>" class='accountlabInput' />
                 <?phpphp }elseif($field[4]=="select"){ ?>
                 <select name="<?phpphp echo $field[1]; ?>" id="<?phpphp echo $field[1]; ?>" class='accountlabInput' size="<?phpphp echo $field[5]; ?>">
                 <?phpphp for($i=8;$i<count($field);$i++){ ?>
                    <option value='<?phpphp echo $field[$i]; ?>' <?phpphp if($ext_fields[$field[1]]==$field[$i])echo "selected=\"selected\""; ?>><?phpphp echo $field[$i]; ?></option>
                 <?phpphp } ?>
                 <?phpphp $_SESSION[$field[1]]=$field[8];?>
                 </select>
                 <?phpphp } ?>
              </td>
           </tr>
           <?phpphp } ?>
           <tr><td colspan='4'>&nbsp;</td></tr>
           <?phpphp } ?>           
           </table>
    </td>
</tr>
<tr> 
    <td colspan='2' >
    <?phpphp if($post_url==INSTALL_URL."customer.php"){ ?>
    <input type="hidden" name="cmd" id="cmd" value="pay" />
    <input type="hidden" name="invoice_no" id="invoice_no" value="<?phpphp echo $REQUEST['invoice_no']; ?>" />
    <input type="hidden" name="payment_method" id="payment_method" value="<?phpphp echo $payment_method; ?>" />  
    <?phpphp } ?>                  
    <?phpphp echo $post_vars; ?>
    <?phpphp if(!empty($BL->pg_name[$payment_method])){ ?>
    <input type="submit" class='accountlabInput' name="alp_pay_now" id='alp_pay_now' value="<?phpphp echo $BL->pg_name[$payment_method]; ?>" />
    <?phpphp } ?>
    </td>
</tr>  
<tr>
    <td height='18' colspan='2' >&nbsp;</td>
</tr>       
</form>
<?phpphp } ?>
</table>
</div>
</div>
<script language="JavaScript" type="text/javascript">
  showTab('tab1', tabs, 't1', t);
</script>
<?phpphp include_once $BL->props->get_page("templates/".THEMEDIR."/html/user/footer.php"); ?>
