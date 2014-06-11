<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
	public function index() {
		self::prepare ();
		$this->display ();
	}
	
	private function prepare() {
		$this->assign ( "sys_pagename", "Start" );
	}
	
	public function logoff() {
		unset ( $_SESSION ['uid'] );
		$this->success ( "您已成功登出", "Account" );
	}
	
	public function group() {
		$this->assign ( "sys_pagename", "大学同学" );
		$contacts = array ();
		$contacts [] = array ("name" => "申玉宝", "phone1" => "186XXXXXXXX", "phone2" => "159XXXXXXXX", "qq" => 8496350, "weibo" => "@申玉宝", "email" => "ssybb1988@gmail.com", "company" => "Sina", "position" => "PHP", "other" => "" );
		$contacts [] = array ("name" => "刘亚玲", "phone1" => "186XXXXXXXX", "phone2" => "159XXXXXXXX", "qq" => 8496350, "weibo" => "@刘亚玲", "email" => "ssybb1988@gmail.com", "company" => "Hist", "position" => "Stu.", "other" => "" );
		$contacts [] = array ("name" => "席晓娜", "phone1" => "186XXXXXXXX", "phone2" => "159XXXXXXXX", "qq" => 8496350, "weibo" => "@席晓娜", "email" => "ssybb1988@gmail.com", "company" => "Hist", "position" => "Stu.", "other" => "" );
		$this->assign ( "contacts",$contacts);
		$this->display ();
	}
}