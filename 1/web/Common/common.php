<?php
/**
 * 密码加密
 * @param unknown_type $paw
 */
function genpwd($paw) {
	$tmp1 = md5 ( $paw );
	$tmp2 = 'sf23z' . $tmp1 . "zdf2";
	$tmp3 = md5 ( $tmp2 );
	return $tmp3;
}