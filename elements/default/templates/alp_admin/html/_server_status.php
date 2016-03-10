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

<script language="JavaScript" type="text/javascript">
    function updateServers()
    {
    <?phpphp foreach ($Servers as $Server){ ?>
        <?phpphp if($Server['httpd_port_yn']==1){ ?>
        url = 'info.php?server_ip=<?phpphp echo $Server['server_ip']; ?>&port=<?phpphp echo $Server['httpd_port']; ?>&ss=true';
        a<?phpphp echo $Server['server_id']; ?>_1 = new ajax();
        a<?phpphp echo $Server['server_id']; ?>_1.makeRequest(url,'img<?phpphp echo $Server['server_id']; ?>_1',1);
        <?phpphp } ?>
        <?phpphp if($Server['smtp_port_yn']==1){ ?>
        url = 'info.php?server_ip=<?phpphp echo $Server['server_ip']; ?>&port=<?phpphp echo $Server['smtp_port']; ?>&ss=true';
        a<?phpphp echo $Server['server_id']; ?>_2  = new ajax();
        a<?phpphp echo $Server['server_id']; ?>_2.makeRequest(url,'img<?phpphp echo $Server['server_id']; ?>_2',1);
        <?phpphp } ?>
        <?phpphp if($Server['ftp_port_yn']==1){ ?>
        url = 'info.php?server_ip=<?phpphp echo $Server['server_ip']; ?>&port=<?phpphp echo $Server['ftp_port']; ?>&ss=true';
        a<?phpphp echo $Server['server_id']; ?>_3  = new ajax();
        a<?phpphp echo $Server['server_id']; ?>_3.makeRequest(url,'img<?phpphp echo $Server['server_id']; ?>_3',1);
        <?phpphp } ?>
        <?phpphp if($Server['pop3_port_yn']==1){ ?>
        url = 'info.php?server_ip=<?phpphp echo $Server['server_ip']; ?>&port=<?phpphp echo $Server['pop3_port']; ?>&ss=true';
        a<?phpphp echo $Server['server_id']; ?>_4  = new ajax();
        a<?phpphp echo $Server['server_id']; ?>_4.makeRequest(url,'img<?phpphp echo $Server['server_id']; ?>_4',1);
        <?phpphp } ?>
        <?phpphp if($Server['mysql_port_yn']==1){ ?>
        url = 'info.php?server_ip=<?phpphp echo $Server['server_ip']; ?>&port=<?phpphp echo $Server['mysql_port']; ?>&ss=true';
        a<?phpphp echo $Server['server_id']; ?>_5  = new ajax();
        a<?phpphp echo $Server['server_id']; ?>_5.makeRequest(url,'img<?phpphp echo $Server['server_id']; ?>_5',1);
        <?phpphp } ?>
    <?phpphp } ?>
    }
    </script>
    <form name='form1' id='form1' action="<?phpphp echo $PHP_SELF; ?>" method="post"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">          
        <tr>
          <td colspan="8" class="text_grey">
          <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
          </td>
        </tr>
        <tr>
          <td class="text_grey" width="5%">
          <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" />
          </td>
          <td class="text_grey" colspan="2">
            <div align='left'>
            <input type="checkbox" class="search" name="refr" value='1' <?phpphp if($conf['s_status_refresh']>0)echo "checked=\"checked\""; ?> />
            <?phpphp echo $BL->props->lang['update_every']; ?>&nbsp;
            <input type='text' class='search' name='s_status_refresh' value='<?phpphp echo $conf['s_status_refresh']; ?>' size='5'>&nbsp;<?phpphp echo $BL->props->lang['seconds']; ?>
            <input type='hidden' name='cmd' value='<?phpphp echo $cmd; ?>' />
            <input type='hidden' name='change_refresh_rate' value='1' />
            <input type='submit' class='search1' name='update' value='<?phpphp echo $BL->props->lang['Update']; ?>' />
            </div>
          </td>
        </tr>
        <tr> 
          <td colspan="7" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
        </tr>
    </table>
    </form>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">
        <tr> 
          <td class="tdheading" colspan="8">
          <b>&nbsp;<?phpphp echo $BL->props->lang['~server_status']; ?></b>
          </td>
        </tr>           
        <tr> 
          <td colspan="8" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
        </tr>
        <tr> 
          <td class='text_grey' width='5%'></td>
          <td class='text_grey'><div align='left'><b>&nbsp;<?phpphp echo $BL->props->lang['server']; ?></b></div></td>
          <td class='text_grey'><div align='left'><b>HTTPD</b> </div></td>
          <td class='text_grey'><div align='left'><b>SMTP</b> </div></td>
          <td class='text_grey'><div align='left'><b>FTP</b> </div></td>
          <td class='text_grey'><div align='left'><b>POP3</b> </div></td>
          <td class='text_grey'><div align='left'><b>MYSQL</b> </div></td>
          <td class='text_grey'><div align='center'><b></b></div></td>
        </tr>
        <?phpphp foreach ($Servers as $Server) { ?>
        <tr>
          <td colspan='8' class='text_grey'>
          <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg" width="100%" height="1" /></td>
        </tr>       
        <tr> 
          <td class='text_grey'>
          <div style="padding-left:5px;">
            <img src='elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?><?phpphp echo $Server['server_type']."-icon-small"; ?>.gif' border='0' />
          </div>
          </td>
          <td class='text_grey'>&nbsp;<?phpphp echo $Server['server_name']; ?></td>
          <td class='text_grey'><div id="img<?phpphp echo $Server['server_id']; ?>_1" name="img<?phpphp echo $Server['server_id']; ?>_1">---</div></td>
          <td class='text_grey'><div id="img<?phpphp echo $Server['server_id']; ?>_2" name="img<?phpphp echo $Server['server_id']; ?>_2">---</div></td>
          <td class='text_grey'><div id="img<?phpphp echo $Server['server_id']; ?>_3" name="img<?phpphp echo $Server['server_id']; ?>_3">---</div></td>
          <td class='text_grey'><div id="img<?phpphp echo $Server['server_id']; ?>_4" name="img<?phpphp echo $Server['server_id']; ?>_4">---</div></td>
          <td class='text_grey'><div id="img<?phpphp echo $Server['server_id']; ?>_5" name="img<?phpphp echo $Server['server_id']; ?>_5">---</div></td>
          <td class='text_grey'><div align='center'></div></td>       
        </tr>
         <?phpphp } ?>
        <tr> 
          <td colspan="8" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
        </tr>           
      </table>
      <br />
      <script language="javascript">updateServers();</script>
        <?phpphp if($conf['s_status_refresh']>0){ ?>
        <meta http-equiv="refresh" content="<?phpphp echo $conf['s_status_refresh']; ?>;URL=admin.php?cmd_prev=<?phpphp echo $BL->REQUEST['cmd_prev'] ?>&cmd=main">
        <?phpphp } ?>  
        <form name='form2' id='form2' action="admin.php" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list_table">
        <tr> 
          <td class="tdheading" colspan="4">
          <b>&nbsp;<?phpphp echo $BL->props->lang['Who_is_online']." : ".date('d-M-Y H:i:s'); ?></b>
          </td>
          <td class="tdheading" colspan="2">
          <b><?phpphp echo $BL->props->lang['Show_activity']; ?></b>
          </td>
          <td class="tdheading" colspan="2">          
          <select name="sec" class="search" onchange="javascript:this.form.submit();">
          <option value="300"   <?phpphp if($Sec==300)echo "selected=\"selected\""; ?>   >5 <?phpphp echo $BL->props->lang['minutes']; ?></option>
          <option value="600"   <?phpphp if($Sec==600)echo "selected=\"selected\""; ?>   >10 <?phpphp echo $BL->props->lang['minutes']; ?></option>
          <option value="900"   <?phpphp if($Sec==900)echo "selected=\"selected\""; ?>   >15 <?phpphp echo $BL->props->lang['minutes']; ?></option>
          <option value="1800"  <?phpphp if($Sec==1800)echo "selected=\"selected\""; ?>  >30 <?phpphp echo $BL->props->lang['minutes']; ?></option>
          <option value="3600"  <?phpphp if($Sec==3600)echo "selected=\"selected\""; ?>  >1 <?phpphp echo $BL->props->lang['hour']; ?></option>
          <option value="10800" <?phpphp if($Sec==10800)echo "selected=\"selected\""; ?> >3 <?phpphp echo $BL->props->lang['hours']; ?></option>
          <option value="21600" <?phpphp if($Sec==21600)echo "selected=\"selected\""; ?> >6 <?phpphp echo $BL->props->lang['hours']; ?></option>
          <option value="43200" <?phpphp if($Sec==43200)echo "selected=\"selected\""; ?> >12 <?phpphp echo $BL->props->lang['hours']; ?></option>
          <option value="84800" <?phpphp if($Sec==84800)echo "selected=\"selected\""; ?> >24 <?phpphp echo $BL->props->lang['hours']; ?></option>
          </select>
          &nbsp;&nbsp;
          </td>
        </tr>  
    
        <tr> 
          <td colspan="8" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
        </tr>
   
        <tr> 
          <td class='text_grey' width='5%'></td>
          <td class='text_grey'><div align='left'><b><?phpphp echo $BL->props->lang['user']; ?></b></div></td>
          <td class='text_grey'><div align='left'><b><?phpphp echo $BL->props->lang['Entry_time']; ?></b> </div></td>
          <td class='text_grey'><div align='left'><b><?phpphp echo $BL->props->lang['last_click_time']; ?></b> </div></td>
          <td class='text_grey'><div align='left'><b><?phpphp echo $BL->props->lang['visiting']; ?></b> </div></td>
          <td class='text_grey'><div align='left'><b><?phpphp echo $BL->props->lang['IP']; ?></b> </div></td>
          <td class='text_grey'><div align='left'><b><?phpphp echo $BL->props->lang['in_basket']; ?></b> </div></td>
          <td class='text_grey'><div align='center'><b></b></div></td>
        </tr>
        <?phpphp foreach ($Whoisonline as $data) { ?>
        <tr>
          <td colspan='8' class='text_grey'>
          <img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>menu_line_lightgreen-long.jpg" width="100%" height="1" /></td>
        </tr>       
        <tr> 
          <td class='text_grey'>
          <div style="padding-left:5px;">
           &nbsp;
          </div>
          </td>
          <td class='text_grey'><?phpphp echo $data['user_name']; ?></td>
          <td class='text_grey'><?phpphp echo date('d-M-Y H:i:s', strtotime($data['entry_time'])) ?></td>
          <td class='text_grey'><?phpphp echo date('H:i:s', strtotime($data['log_time'])) ?></td>
          <td class='text_grey'><?phpphp echo $data['visiting_page']; ?></td>
          <td class='text_grey'><?phpphp echo $data['user_ip']; ?></td>
          <td class='text_grey'><?phpphp echo $data['items_in_basket']; ?></td>
          <td class='text_grey'><div align='center'></div></td>       
        </tr>
         <?phpphp } ?>
        <tr> 
          <td colspan="8" class="text_grey"><img src="elements<?phpphp echo PATH_SEP; ?>default<?phpphp echo PATH_SEP; ?>templates<?phpphp echo PATH_SEP; ?>alp_admin<?phpphp echo PATH_SEP; ?>images<?phpphp echo PATH_SEP; ?>spacer.gif" alt="" width="100%" height="1" /></td>
        </tr>           
      </table>
      </form> 
      <br />
