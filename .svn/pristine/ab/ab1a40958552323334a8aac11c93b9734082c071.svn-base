<?php
// 本类由系统自动生成，仅供测试用途
class SettingAction extends CommonAction {
    public function index(){
		$this->display();
    }
    
    public function detail() {
    	$this->assign("sys_pagename","用户设置");	
    	$this->display();
    }
    
    public function privacy() {
    	$this->assign("sys_pagename","隐私");	
    	$this->display();
    }
    
    public function help() {
    	$this->assign("sys_pagename","系统帮助");	
    	Comm_Security::test();
    	$this->display();
    }
    
    public function update() {
    	$this->assign("sys_pagename","升级VIP");	
    	$this->display();
    }
    
    public function submit_detail_system() {
    	$name = $_POST['name'];
    	$oldpwd = $_POST['oldpwd'];
    	$pwd  = $_POST['newpwd'];
    	if (!empty($oldpwd)) {
    		$oldpwd  = genpwd($oldpwd);
    	}
    	
    	$uid  = $_SESSION['uid'];
    	$UserModel = D('user');
    	$user = $UserModel->where($uid)->find();

        if (!empty($oldpwd) && $oldpwd !== $user['pwd']) {
    		$this->error('您的密码错误',"detail");
    	}

    	$user['name'] = $name;
    	if (!empty($pwd)) {
    		$user['pwd'] = genpwd($pwd);
    	}
		
    	$ret = $UserModel->where($uid)->save($user);
    	$this->success('修改成功',"detail");
    }
}