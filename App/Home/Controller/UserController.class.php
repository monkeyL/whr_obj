<?php

namespace Home\Controller;

use Home\Controller\IsloginController;

class UserController extends IsloginController {

    public function index() {
        $data = $this->getdata();
        //  print_r($data);exit;
        $this->assign('data', $data);
        $this->display();
    }

    public function getdata() {
        $page = I('get.page', 1);
        $pageSize = I('get.pageSize', 20);
        $limit = "limit " . ($page - 1) * $pageSize . ',' . $pageSize;
        $sql = "select * from " . C('DB_PREFIX') . "user " . $limit;
        $data = M()->query($sql);
        return $data;
    }

    public function add() {
        //echo change();
        // print_r($salt);exit;
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加会员";
        $action = I('post.action');
        $property = M("property");
        $propertyList = $property->select();
        $pro = $this->getprovence();
        $this->assign('pro', $pro);
        $this->assign('prolist', $propertyList);
        if (IS_POST) {
            if ($action == "add") {

                $user = D('User');

                if ($data = $user->create()) {
                    $salt = rand(999, 9999);
                    $data['salt']=$salt;
                    $md_pw = md5(I('post.password', 1));
                    $password = change($md_pw, $salt);
                    $data['password'] = $password;
                    $data["reg_time"] = time();
                    if ($user->add($data)) {
                        $url = U('/Home/village/index');
                        $this->success("用户添加成功！", $url);
                    } else {
                        //  echo 2;exit;
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                $user = D('User');
                if ($data = $user->create()) {
                    if ($village->save($data)) {
                        $url = U('/Home/village/index');
                        $this->success("修改成功！", $url);
                    } else {
                        $this->error("用户修改失败！", 'index');
                    }
                } else {
                    $this->error($user->getError());
                }
            }
        }
        $id = I('get.id', 0);
        if ($id) {
            $data['action'] = 'edit';
            $data['title'] = "编辑会员";
            $data['btn'] = "编辑";
            $user = M("User");
            $region = M("region");
            $userlist = $user->where("user_id=" . $id)->find();
         //   print_r($userlist);exit;
            $provine = $userlist['province'];
            $regionProv = $region->where("REGION_ID=" . $provine)->find();
            $this->assign("region", $regionProv);
            $this->assign('info', $userlist);
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function del() {
        $id = I('get.id', 0);
        $admin = D('User');
        $result = $admin->where("id=$id")->delete();
        if ($result) {
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

}

?>