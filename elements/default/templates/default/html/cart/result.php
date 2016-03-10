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

  <tr> 
    <td valign='top'>
    
		<table width='100%' border='0' cellspacing='0' cellpadding='1' class='accountlabFormTABLE'>
        <tr>
          <td class='accountlabSeparatorTD'><b><?phpphp echo $BL->props->lang['item']; ?></b></td>
          <td class='accountlabSeparatorTD'><b><?phpphp echo $BL->props->lang['Description']; ?></b></td>
          <td class='accountlabSeparatorTD'><div align='right'><b><?phpphp if($INVOICE_DATA['inv_tld_disc'] || $INVOICE_DATA['inv_plan_disc'] || $INVOICE_DATA['inv_addon_disc']) echo $BL->props->lang['discount']; ?></b></td>
          <td class='accountlabSeparatorTD'><b><?phpphp echo $BL->props->lang['Period']; ?></b></td>
          <td class='accountlabSeparatorTD'><div align='right'><b><?phpphp echo $BL->props->lang['cost']; ?></b></td>
        </tr>
        <?phpphp if($ORDER_DATA['sld'] && $ORDER_DATA['tld']){ ?>
        <tr>
          <td><?phpphp echo $ORDER_DATA['sld'].".".$ORDER_DATA['tld']; ?></td>
          <td><?phpphp if($INVOICE_DATA['tld_fee'])echo $BL->props->lang['Price']." ".$BL->toCurrency($INVOICE_DATA['tld_fee'],null,1);else echo $BL->props->lang['free']; ?></td>
          <td>
          <div align='right'>
          <?phpphp if($INVOICE_DATA['inv_tld_disc']) echo $BL->toCurrency($INVOICE_DATA['tld_fee']*($INVOICE_DATA['inv_tld_disc']/100),null,1); ?>
          </div>
          </td>
          <td> 
          <?phpphp if($ORDER_DATA['type']==1)echo ($ORDER_DATA['year']<99)?$ORDER_DATA['year']. $BL->props->lang['years']:$BL->props->lang['one_time']; ?>
          <?phpphp if($ORDER_DATA['type']!=1)echo $BL->props->lang[$BL->props->cycles[$ORDER_DATA['bill_cycle']]]; ?>
          </td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency($INVOICE_DATA['tld_fee']-($INVOICE_DATA['tld_fee']*($INVOICE_DATA['inv_tld_disc']/100)),null,1); ?>
          </div>
          </td>
		</tr>
        <?phpphp } ?>
        <?phpphp if($ORDER_DATA['product_id']){ ?>
        <tr>
          <td><?phpphp echo $BL->getFriendlyName($ORDER_DATA['product_id']); ?></td>
          <td><?phpphp echo $BL->props->lang['setup_fee']." ".$BL->toCurrency($INVOICE_DATA['setup_fee'],null,1); ?></td>
          <td>
          <div align='right'>
          <?phpphp if($INVOICE_DATA['inv_plan_disc']) echo $BL->toCurrency(($INVOICE_DATA['setup_fee'])*($INVOICE_DATA['inv_plan_disc']/100),null,1); ?>
          </div>
          </td>
          <td></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency($INVOICE_DATA['setup_fee']-($INVOICE_DATA['setup_fee'])*($INVOICE_DATA['inv_plan_disc']/100),null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        <?phpphp if($INVOICE_DATA['cycle_fee']){ ?>
        <tr>
          <td></td>
          <td><?phpphp echo $BL->props->lang['Recurring']." ".$BL->toCurrency($INVOICE_DATA['cycle_fee'],null,1); ?></td>
          <td>
          <div align='right'>
          <?phpphp if($INVOICE_DATA['inv_plan_disc']) echo $BL->toCurrency($INVOICE_DATA['cycle_fee']*($INVOICE_DATA['inv_plan_disc']/100),null,1); ?>
          </div>
          </td>
          <td><?phpphp echo $BL->props->lang[$BL->props->cycles[$ORDER_DATA['bill_cycle']]]; ?></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency($INVOICE_DATA['cycle_fee']-($INVOICE_DATA['cycle_fee']*($INVOICE_DATA['inv_plan_disc']/100)),null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>  
        <?phpphp $Addon_Fees = $BL->addons->getInvoiceAddonStringData($INVOICE_DATA['addon_fee']); ?>
        <?phpphp foreach ($ORDER_DATA['addon_ids'] as $addon_id) { ?>
        <?phpphp $addon     = $BL->addons->getByKey($addon_id); ?>
        <?phpphp $addon_fee = $Addon_Fees[$addon['addon_name']]; ?>
        <tr>
          <td><?phpphp echo $addon['addon_name']; ?></td>
          <td><?phpphp echo $BL->props->lang['setup_fee']." ".$BL->toCurrency($addon_fee['SETUP'],null,1)." ".$BL->props->lang['Recurring']." ".$BL->toCurrency($addon_fee['CYCLE'],null,1);?></td>
          <td>
          <div align='right'>
          <?phpphp if($INVOICE_DATA['inv_addon_disc']) echo $BL->toCurrency(($addon_fee['SETUP']+$addon_fee['CYCLE'])*($INVOICE_DATA['inv_addon_disc']/100),null,1); ?>
          </div>
          </td>
          <td><?phpphp echo $BL->props->lang[$BL->props->cycles[$ORDER_DATA['bill_cycle']]]; ?></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency(($addon_fee['SETUP']+$addon_fee['CYCLE']) - ($addon_fee['SETUP']+$addon_fee['CYCLE'])*($INVOICE_DATA['inv_addon_disc']/100),null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        
        <?phpphp if(isset($ORDER_DATA['specials']['SELECTED_SLD']) && $ORDER_DATA['specials']['SELECTED_SLD']){ ?>
        <tr>
          <td><?phpphp echo $ORDER_DATA['specials']['SELECTED_SLD'].".".$ORDER_DATA['specials']['SELECTED_TLD']; ?></td>
          <td><?phpphp echo $BL->props->lang['special_offer']; ?></td>
          <td></td>
          <td></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency(0,null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        
        <?phpphp if(isset($ORDER_DATA['specials']['SELECTED_PRODUCT']) && $ORDER_DATA['specials']['SELECTED_PRODUCT']){ ?>
        <tr>
          <td><?phpphp echo $BL->getFriendlyName($_SESSION['specials']['SELECTED_PRODUCT']); ?></td>
          <td><?phpphp echo $BL->props->lang['special_offer']; ?></td>
          <td></td>
          <td></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency(0,null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        
        <?phpphp if(isset($ORDER_DATA['specials']['SELECTED_ADDON']) && $ORDER_DATA['specials']['SELECTED_ADDON']){ ?>
        <?phpphp $addon = $BL->addons->getByKey($_SESSION['specials']['SELECTED_ADDON']); ?>
        <tr>
          <td><?phpphp echo $addon['addon_name']; ?></td>
          <td><?phpphp echo $BL->props->lang['special_offer']; ?></td>
          <td></td>
          <td></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency(0,null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>

        <?phpphp if ($INVOICE_DATA['discount_token_amount']>0) { ?>
        <?phpphp 
        $temp           = $BL->disc_token_codes->getByKey($CUSTOMER_DATA['disc_token_code']);
        $discount_token = $BL->disc_tokens->getByKey(isset($temp['disc_token_id'])?$temp['disc_token_id']:0); 
        ?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td><?phpphp echo $BL->props->lang['Discount_Token'].": ".$CUSTOMER_DATA['disc_token_code']; ?></td>
          <td><?phpphp echo $BL->props->lang['discount']." ".number_format($discount_token['coupon_discount'],2)."% (".(!$discount_token['disc_token_domain'] && !$discount_token['disc_token_addons'])?$BL->props->lang['including_plan']:($discount_token['disc_token_domain'] && !$discount_token['disc_token_addons'])?$BL->props->lang['including_plan_domain']:$BL->props->lang['including_plan_domain_addon'].")"; ?></td>
          <td></td>
          <td></td>
          <td>
          <div align='right'>
          <?phpphp echo "-".$BL->toCurrency($INVOICE_DATA['discount_token_amount'],null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        <?phpphp if ($INVOICE_DATA['discount_coupon_amount']>0) { ?>
        <?phpphp $coupon = $BL->coupons->hasAnyOne(array("WHERE `coupon_name`='".$CUSTOMER_DATA['disc_token_code']."'")); ?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td><?phpphp echo $BL->props->lang['Coupon_Code'].": ".$CUSTOMER_DATA['disc_token_code']; ?></td>
          <td><?phpphp 
                echo $BL->props->lang['discount']." ".number_format($coupon['coupon_discount'],2)."%<br />"; 
                echo (!$coupon['coupon_domain'] && !$coupon['coupon_addons'])?$BL->props->lang['including_plan']:(($coupon['coupon_domain'] && !$coupon['coupon_addons'])?$BL->props->lang['including_plan_domain']:$BL->props->lang['including_plan_domain_addon']);
              ?>
          </td>
          <td></td>
          <td></td>
          <td>
          <div align='right'>
          <?phpphp echo "-".$BL->toCurrency($INVOICE_DATA['discount_coupon_amount'],null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        <?phpphp if ($INVOICE_DATA['customer_discount_amount']>0) { ?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td></td>
          <td> <?phpphp echo $BL->props->lang['discount']." ".number_format($CUSTOMER_DATA['discount'],2)."%"; ?></td>
          <td> </td>
          <td> </td>
          <td>
          <div align='right'>
          <?phpphp echo "-".$BL->toCurrency($INVOICE_DATA['customer_discount_amount'],null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        <?phpphp if ($INVOICE_DATA['debit_credit_amount']>0) { ?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td></td>
          <td colspan='3'><?phpphp echo $INVOICE_DATA['debit_credit_reason']; ?></td>
          <td>
          <div align='right'>
          <?phpphp if($CUSTOMER_DATA['credit_type']==1) echo "-";else echo "+"; echo $BL->toCurrency($INVOICE_DATA['debit_credit_amount'],null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>      
        <?phpphp if($BL->conf['en_prorate'] && $INVOICE_DATA['prorate_amount']>0){?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td></td>
          <td colspan='3'><?phpphp echo $INVOICE_DATA['prorate_desc']; ?></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency($INVOICE_DATA['prorate_amount'],null,1); ?>
          </div>
          </td>
        </tr>        
        <?phpphp } ?>
        <?phpphp if($INVOICE_DATA['tax_amount']>0){ ?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td colspan='3'></td>
          <td><b><?phpphp echo $BL->props->lang['subtotal']; ?></b></td>
          <td>
          <div align='right'>
          <?phpphp echo $BL->toCurrency($INVOICE_DATA['net_amount'],null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp for($i=0; $i<count($TAX_DATA['all_taxes']); $i++){ ?>
        <tr>
          <td colspan='3'></td>
          <td><b><?phpphp echo $TAX_DATA['tax_name'][$i];echo " ".$TAX_DATA['tax_sign'][$i].number_format($TAX_DATA['tax_percent'][$i],2)."%"; ?></b></td>
          <td>
          <div align='right'>
          <?phpphp echo $TAX_DATA['tax_sign'][$i]; echo $BL->toCurrency($TAX_DATA['tax_amount'][$i],null,1); ?>
          </div>
          </td>
        </tr>
        <?phpphp } ?>
        <?phpphp } ?>
        <tr>
          <td colspan='4'></td>
          <td height='1' bgcolor='#666666'></td>
        </tr>
        <tr>
          <td colspan='3'></td>
          <td><b><?phpphp echo $BL->props->lang['total_due']; ?></b></td>
          <td> 
          <div align='right'>
          <?phpphp echo $BL->toCurrency($INVOICE_DATA['gross_amount'],null,1); ?>
          </div>
          </td>
        </tr>
      </table>
      <br />
      
      <fieldset class='accountlabFormTABLE'>
      <legend><b><?phpphp echo $BL->props->lang['payment_detail']; ?></b></legend>
      <table width='100%' border='0' cellspacing='0' cellpadding='1'>
        <tr>
          <td><?phpphp echo $INVOICE_DATA['pay_text']; ?></td>
        </tr>
      </table>
      </fieldset>
      <br />
        
        
      <fieldset class='accountlabFormTABLE'>
      <legend><b><?phpphp echo $BL->props->lang['personal_details']; ?></b></legend>
        <table width='100%' border='0' cellspacing='0' cellpadding='1'>
          <tr> 
            <td valign='top'><?phpphp echo $BL->props->lang['Email']; ?></td>
            <td valign='top'><?phpphp echo $CUSTOMER_DATA['email']; ?></td>
          </tr>

          <?phpphp 
          foreach($custom_fields as $cf){ 
            if($cf['field_name']!="country" && isset($CUSTOMER_DATA[$cf['field_name']])){
          ?>
          <tr> 
            <td valign='top'><?phpphp echo $BL->props->parseLang($cf['field_name']); ?></td>
            <td valign='top'><?phpphp echo $CUSTOMER_DATA[$cf['field_name']]; ?></td>
          </tr>
          <?phpphp }elseif(isset($CUSTOMER_DATA[$cf['field_name']])){ ?>
          <tr> 
            <td valign='top'><?phpphp echo $BL->props->parseLang($cf['field_name']); ?></td>
            <td valign='top'><?phpphp echo $BL->props->country[$CUSTOMER_DATA[$cf['field_name']]]; ?></td>
          </tr>
          <?phpphp } ?>
          <?phpphp } ?>         
        </table>
        </fieldset>
        <br />
        
      <?phpphp if($INVOICE_DATA['gross_amount']>0){ ?>
      <fieldset class='accountlabFormTABLE'>
      <legend><b><?phpphp echo $BL->props->lang['payment_options']; ?></b></legend>
      <table width='100%' border='0' cellspacing='0' cellpadding='1'>
        <tr>
          <td>
             <select name="payment_method"  id='payment_method' class='accountlabinput' onchange="javascript:xajax_step6_selectPaymentMethod(xajax.$('payment_method').value);">
             <?phpphp foreach ($ACTIVE_PAYMENT_METHODS as $value) { ?>
             <option value="<?phpphp echo $value; ?>" <?phpphp if($_SESSION['payment_method']==$value)echo "selected"; ?>><?phpphp echo $BL->pg_name[$value]; ?></option>
             <?phpphp } ?>
             </select>
            </td>
        </tr>
      </table>
      </fieldset>
      <br />
        
        <?phpphp if($show_add_cur=="Yes" && count($add_cur)){ ?>
        <fieldset class='accountlabFormTABLE'>
        <legend><b><?phpphp echo $BL->props->lang['you_can_pay_by_add_cur']; ?></b></legend>
        <table width='100%' border='0' cellspacing='0' cellpadding='1' align='center'>         
            <tr>
             <td width="2%">
             <input type='radio' name='pay_curr_id' id='pay_curr_id0' value='0' checked="checked" class='accountlabinput' />  
             </td>
             <td width="35%">
             <?phpphp echo $BL->props->lang['Total_amount_in'].$BL->conf['curr_name']; ?>
             </td>
             <td width="20%" align='right'>
             <?phpphp echo $BL->toCurrency($INVOICE_DATA['gross_amount'],null,1); ?>
             </td>
             <td>&nbsp;</td>
            </tr>            
            <?phpphp
            foreach($add_cur as $ac) {                  
                $curr_conf                    = array();
                $curr_conf['symbol_prefixed'] = $ac['curr_symbol_prefixed'];
                $curr_conf['symbol']          = $ac['curr_symbol'];
                $curr_conf['decimals']        = $ac['curr_decimal_number'];
                $curr_conf['str1']            = $ac['curr_decimal_str'];
                $curr_conf['str2']            = $ac['curr_thousand_str'];                
            ?>
            <tr>
             <td>
             <input type='radio' name='pay_curr_id' id='pay_curr_id<?phpphp echo $ac['curr_id'] ?>' value='<?phpphp echo $ac['curr_id'] ?>' class='accountlabinput' />    
             </td>
             <td>
             <?phpphp echo $BL->props->lang['Total_amount_in'].$ac['curr_name']; ?>
             </td>
             <td align='right'>
             <?phpphp echo $BL->toCurrency($INVOICE_DATA['gross_amount']*$ac['curr_factor'],$curr_conf,1); ?>
             </td>
             <td>&nbsp;</td>
            </tr>
            <?phpphp } ?>    
         </table>
         </fieldset>
         <br />
         <?phpphp } ?>
         <?phpphp if($disp_msg || count($add_fields)){ ?>
         <fieldset class='accountlabFormTABLE'>
         <legend><b><?phpphp echo $BL->pg_name[$_SESSION['payment_method']]; ?></b></legend>         
         <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr><td colspan='4'><?phpphp echo $disp_msg; ?></td></tr>  
            <?phpphp foreach($add_fields as $field){ ?>      
            <tr>
             <td width="18%">
             <?phpphp echo $BL->props->lang[$field[0]]; ?><?phpphp if($field[6]==1){?><font color="red">*</font><?phpphp } ?>
             </td>
             <td width="32%">
             <?phpphp if($field[4]=="text"){ ?>
             <input name="<?phpphp echo $field[1]; ?>" type="text" id="<?phpphp echo $field[1]; ?>" size="<?phpphp echo $field[5]; ?>" class='accountlabinput' />
             <?phpphp }elseif($field[4]=="select"){ ?>
             <select name="<?phpphp echo $field[1]; ?>" id="<?phpphp echo $field[1]; ?>" class='accountlabinput' size="<?phpphp echo $field[5]; ?>">
             <?phpphp for($i=8;$i<count($field);$i++){ ?>
                <option value='<?phpphp echo $field[$i]; ?>'><?phpphp echo $field[$i]; ?></option>
             <?phpphp } ?>
             </select>
             <?phpphp } ?>
             </td>
             </tr>
             <?phpphp } ?>
             <?phpphp } ?>             
        </table>
        </fieldset>
        <br />
        <?phpphp } ?> 
       
      <fieldset class='accountlabFormTABLE'>
        <table width='100%' border='0' cellspacing='0' cellpadding='1'>
        <tr>
          <td>
            <a href='<?phpphp echo $conf['terms_url']; ?>' target="_blank"><?phpphp echo $BL->props->lang['agree_to']; ?></a><br />
            <input type='radio' class='accountlabInput' name='agree_terms' id='agree_terms_1' value='1' onclick="javascript:xajax_step6_agree(1);" />&nbsp;<?phpphp echo $BL->props->lang['Yes']; ?>
            <input type='radio' class='accountlabInput' name='agree_terms' id='agree_terms_2' value='0' onclick="javascript:xajax_step6_agree(0);" checked />&nbsp;<?phpphp echo $BL->props->lang['No']; ?>
          </td>
        </tr>
        </table>
      </fieldset>
          
        </td>
    </tr>
