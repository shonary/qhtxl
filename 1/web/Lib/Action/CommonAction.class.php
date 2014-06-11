<?php
class CommonAction extends Action {
 function _initialize() {        
        // 登录检查
        if (!isset($_SESSION['uid'])) {
            $this->redirect("Account/index");
        }

 	    // 基础数据
        $this->assign("sys_sitename","云海通讯录");	
		$UserModel = D("user");
		$user = $UserModel->where('id='.$_SESSION['uid'])->find();
		$this->assign("sys_user_firstname",$user['name']);
		$this->assign("sys_user_lastname",'普通用户');   
    }
}
?>





