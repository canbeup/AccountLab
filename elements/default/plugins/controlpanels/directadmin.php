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

function killAccount($da_server, $da_user, $da_password, $usessl, $order_data, & $da, $da_hash)
{
    $result = $da->killacct($da_server, $da_user, $da_password, $usessl, $order_data['dom_user']);
    return $result;
}
function suspendAccount($da_server, $da_user, $da_password, $usessl, $order_data, & $da, $da_hash)
{
	$result = $da->suspend($da_server, $da_user, $da_password, $usessl, $order_data['dom_user']);
    return $result;
} 
function unsuspendAccount($da_server, $da_user, $da_password, $usessl, $order_data, & $da, $da_hash)
{
    $result = $da->unsuspend($da_server, $da_user, $da_password, $usessl, $order_data['dom_user']);
    return $result;
} 
function createAccount($da_server, $da_user, $da_password, $usessl, $package_data, $order_data, & $da, $da_hash)
{
    $da->limits     = $package_data;
    $da->order_data = $order_data;
    $result = $da->createacct($da_server, $da_user, $da_password, $usessl, $order_data['domain_name'], $order_data['dom_user'], $order_data['dom_pass'], $package_data['plan_name']);
    return $result;
}
function listAccounts($da_server, $da_user, $da_password, $usessl, & $da, $da_hash)
{
	$result = $da->listaccts($da_server, $da_user, $da_password, $usessl);    
    return $result;
}
function listPackages($da_server, $da_user, $da_password, $usessl, & $da, $da_hash)
{
    $result = $da->listpkgs($da_server, $da_user, $da_password, $usessl);   
    return $result;
}
function syncPackage($da_server, $da_user, $da_password, $usessl, $package_data, $submit, & $da, $da_hash)
{
    $result = "not supported by directadmin";
    return $result;
}
?>
