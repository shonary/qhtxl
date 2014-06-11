<?php
// 本类由系统自动生成，仅供测试用途
class AccountAction extends Action {
    public function index(){
		if (isset($_SESSION['uid'])) {
		     $this->redirect("Index/index");
		}
		
		$this->display();
    }
    
    public function register() {
        $this->display();
    }
    
    public function adduser() {
        $user = M("user");
        if ($user->create()) {
             if (false !== $user->add()) {
                $this->success('数据添加成功！');
            } else {
                $this->error('数据写入错误');
            }
        }else {
            // 字段验证错误
            $this->error($user->getError());
        }
    }
    
    public function login() {
        $email = $_POST['email'];
        $pwd   = $_POST['pwd'];
        $pwd   = genpwd($pwd);

        $user  = D('user');
        $ret   = $user->where("email='".$email."'")->find();
        if(empty($ret)){
            $this->error("账户不存在，请检查后重新输入","index");
        }
        
        if ($pwd != $ret['pwd']) {
            $this->error("您的密码错误，请检查后重新输入","index");
        }
        
        $_SESSION['uid'] = $ret['id'];
        $this->redirect("Index/index");
    }
    

}