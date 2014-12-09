<?php

namespace Home\Controller;

use Home\Controller\IsloginController;

class AdminController extends IsloginController {

    public function index() {
        $data = $this->getdata();
        $this->assign('data', $data);
        $this->display();
    }

    public function getdata() {
        $page = I('get.page', 1);
        $pageSize = I('get.pageSize', 20);
        $limit = "limit " . ($page - 1) * $pageSize . ',' . $pageSize;
        $sql = "select * from " . C('DB_PREFIX') . "admin " . $limit;
        $data = M()->query($sql);
        return $data;
    }

    public function add() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加管理员";
        $action = I('post.action');
        if (IS_POST) {
            //  print_r($action);exit;
            if ($action == "add") {
                $user = D('Admin');
                if ($data = $user->create()) {
                    $data['password'] = md5(I('post.password'));
                    $data['add_time'] = time();
                    if ($user->add($data)) {
                        $url = U('/Home/Admin/index');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                $admin = D("Admin");
                if ($adminData = $admin->create()) {
                    $adminData['password'] = md5(I('post.password'));
                    if ($admin->save($adminData)) {
                        $url = U('/Home/Admin/index');
                        $this->success("修改成功！", $url);
                    } else {
                        $this->error("用户修改失败！", 'index');
                    }
                } else {
                    $this->error($admin->getError());
                }
            }
        }
        $id = I('get.id', 0);
        if ($id) {
            $data['action'] = 'edit';
            $data['title'] = "编辑管理员";
            $data['btn'] = "编辑";
            $user = M("Admin");
            $userList = $user->where("id=" . id)->find();
        }
        $this->assign('info', $userList);
        $this->assign('data', $data);
        $this->display();
    }

    public function del() {
        $id = I('get.id', 0);
        $admin = D('Admin');
        $result = $admin->where("id=$id")->delete();
        if ($result) {
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

}

?>
