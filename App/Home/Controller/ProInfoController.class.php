<?php

namespace Home\Controller;

use Home\Controller\IsloginController;

class ProInfoController extends IsloginController {

    public function index() {
        $house = M("ProNotice p");

        $count = $house->join('wrt_property AS y ON p.proid=y.id')->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 20);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $data = $house->field('p.*,y.id as yid,y.pname')
                ->join('wrt_property AS y ON p.proid=y.id')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
        if (empty($data)) {
            $this->redirect("add");
        }
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('data', $data);
        $this->display();
    }

    public function add() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加公告";
        $action = I('post.action');
        $pro = M('property');
        $proList = $pro->select();
        $this->assign('pro', $proList);
        if (IS_POST) {
            if ($action == "add") {
                $pntice = D('ProNotice');
                if ($data = $pntice->create()) {
                    $_villa = _vialg($data);
                    if (!empty($_villa)) {
                        $url = U('/Home/proInfo/add', '', false);
                        $this->error($_villa . '  添加失败!');
                    }
                    $data['add_time'] = time();
                    if ($pntice->add($data)) {
                        $url = U('/Home/proInfo/index');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                $pntice = D('ProNotice');
                if ($data = $pntice->create()) {
                    if ($pntice->save($data)) {
                        $url = U('/Home/proInfo/index');
                        $this->success("修改成功！", $url);
                    } else {
                        $url = U('/Home/proInfo/add', '', false);
                        $this->error('修改失败!');
                    }
                } else {
                    $this->error($pntice->getError());
                }
            }
        }
        $id = I('get.id', 0);
        if ($id) {
            $data['action'] = 'edit';
            $data['title'] = "编辑公告";
            $data['btn'] = "编辑";
            $house = M("ProNotice p");
            $info = $house->field('p.*,y.id as yid,y.pname')
                    ->join('wrt_property AS y ON p.proid=y.id')
                    ->where('p.id=' . $id)
                    ->find();
            //  print_r($info);exit;
            $this->assign('info', $info);
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function word() {
        $data['action'] = 'add';
        $data['title'] = "添加/修改";
        $data['btn'] = "提交关键词";
        $action = I('post.action');
        $word = M('ProKeyword');
        $wordfind = $word->find();
        if ($wordfind) {
            $data['action'] = 'edit';
            $wordfind['pname'] = implode(",", json_decode($wordfind['pname']));
            $this->assign('word', $wordfind);
        }
        if (IS_POST) {
            if ($action == "add") {
                $word = D('ProKeyword');
                if ($wordfind) {
                    $url = U('/Home/proInfo/word', '', false);
                    $this->error('已有关键设置,添加失败!');
                }
                if ($data = $word->create()) {
                    $dataname = explode(",", $data['pname']);
                    $data['pname'] = json_encode($dataname);
                    if ($word->add($data)) {
                        $url = U('/Home/ProInfo/word');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                $word = D("ProKeyword");
                if ($data = $word->create()) {
                    $dataname = explode(",", $data['pname']);
                    $data['pname'] = json_encode($dataname);
                    if ($word->save($data)) {
                        $url = U('/Home/ProInfo/word');
                        $this->success("修改成功！", $url);
                    } else {
                        $this->error("用户修改失败！", 'index');
                    }
                } else {
                    $this->error($word->getError());
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function examine() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加调查";
        $action = I('post.action');
        $prosury = M("ProSurvey");
        $count = $prosury->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 2);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $prosury->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $prosuvey = D('ProSurvey');
                if ($data = $prosuvey->create()) {
                    $data['Release_time'] = time();
                    $data['add_time'] = time();
                    if ($prosuvey->add($data)) {
                        $url = U('/Home/proInfo/examine');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                // print_r($_REQUEST);exit;
                $prosury = M("ProSurvey");
                if ($data = $prosury->create()) {
                    if ($prosury->save($data)) {
                        $url = U('/Home/proInfo/examine');
                        $this->success('修改成功!', $url);
                    } else {
                        $this->error("修改失败！", 'index');
                    }
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function url_ajaxCalendar() {
        $id = I('post.id', 0);
        $prosury = M("ProSurvey");
        $info = $prosury->where("id=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function url_ajaxCarpool() {
        $id = I('post.id', 0);
        // echo $id;exit;
        $prosury = M("ProCar");
        $info = $prosury->where("id=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function url_ajaxswap() {
        $id = I('post.id', 0);
        // echo $id;exit;
        $pro = M("ProFetch");
        $info = $pro->where("id=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function url_ajaxActive() {
        $id = I('post.id', 0);
        // echo $id;exit;
        $prosury = M("ProActivity");
        $info = $prosury->where("id=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function url_ajaxhinder() {
        $id = I('post.id', 0);
        $prorepair = M("ProRepair");
        $info = $prorepair->where("rid=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function url_ajaxdecorate() {
        $id = I('post.id', 0);
        $pro = M("ProDecorate");
        $info = $pro->where("rid=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function url_ajaxrepair() {
        $id = I('post.id', 0);
        $pro = M("ProComplaints");
        $info = $pro->where("rid=" . $id)->find();
        $info['action'] = 'edit';
        $this->ajaxReturn($info);
    }

    public function carpool() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加调查";
        $action = I('post.action');
        $procar = M("ProCar");
        $count = $procar->where("role=1")->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 10);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $procar->where("role=1")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $procar = M("ProCar");
                if ($data = $procar->create()) {
                    //  $data['Release_time'] = time();
                    $data['role'] = 1;
                    $data['add_time'] = time();
                    if ($procar->add($data)) {
                        $url = U('/Home/proInfo/carpool');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                // print_r($_REQUEST);exit;
                $procar = M("ProCar");
                if ($data = $procar->create()) {
                    if ($procar->save($data)) {
                        $url = U('/Home/proInfo/carpool');
                        $this->success('修改成功!', $url);
                    } else {
                        $this->error("修改失败！", 'index');
                    }
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function active() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加调查";
        $action = I('post.action');
        $proactiv = M("ProActivity");
        $count = $proactiv->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 15);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $proactiv->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $proactiv = M("ProActivity");
                if ($data = $proactiv->create()) {
                    //  $data['Release_time'] = time();
                    $data['add_time'] = time();
                    if ($proactiv->add($data)) {
                        $url = U('/Home/proInfo/active');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                $proactiv = M("ProActivity");
                if ($data = $proactiv->create()) {
                    if ($proactiv->save($data)) {
                        $url = U('/Home/proInfo/active');
                        $this->success('修改成功!', $url);
                    } else {
                        $this->error("修改失败！", 'index');
                    }
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function hinder() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加调查";
        $action = I('post.action');
        $prorepair = M("ProRepair");
        $count = $prorepair->where("role=1")->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 15);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $prorepair->where("role=1")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $prorepair = M("ProRepair");
                if ($data = $prorepair->create()) {
                    $data['role'] = 1;
                    $data['time'] = time();
                    if ($prorepair->add($data)) {
                        $this->success("用户添加成功！", U('/Home/proInfo/hinder'));
                    } else {
                        $this->error("用户添加失败！", U('/Home/proInfo/hinder'));
                    }
                }
            } elseif ($action == "edit") {
                $prorepair = M("ProRepair");
                if ($data = $prorepair->create()) {
                    $prorepair->where(array('rid' => I('post.id')))->setInc('num');
                    $data['pid'] = I('post.id');
                    $data['time'] = time();
                    if ($prorepair->add($data)) {
                        $this->success('回复成功!', U('/Home/proInfo/hinder'));
                    } else {
                        $this->error("回复失败！", U('/Home/proInfo/hinder'));
                    }
                }
            }
        }

        $this->assign('data', $data);
        $this->display();
    }

    public function decorate() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "添加调查";
        $action = I('post.action');
        $pro = M("ProDecorate");
        $count = $pro->where("role=1")->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 15);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $pro->where("role=1")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $pro = M("ProDecorate");
                if ($data = $pro->create()) {
                    $data['role'] = 1;
                    $data['add_time'] = time();
                    if ($pro->add($data)) {
                        $this->success("用户添加成功！", U('/Home/proInfo/decorate'));
                    } else {
                        $this->error("用户添加失败！", U('/Home/proInfo/decorate'));
                    }
                }
            } elseif ($action == "edit") {
                // print_r($_REQUEST);exit;
                $pro = M("ProDecorate");
                if ($data = $pro->create()) {
                    $pro->where(array('rid' => I('post.id')))->setInc('num');
                    $data['pid'] = I('post.id');
                    $data['time'] = time();
                    if ($pro->add($data)) {
                        $this->success('回复成功!', U('/Home/proInfo/decorate'));
                    } else {
                        $this->error("回复失败！", U('/Home/proInfo/decorate'));
                    }
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function repair() {
        $data['action'] = 'add';
        $data['title'] = "添加";
        $action = I('post.action');
        $pro = M("ProComplaints");
        $count = $pro->where("role=1")->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 15);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $pro->where("role=1")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $pro = M("ProComplaints");
                if ($data = $pro->create()) {
                    $data['add_time'] = time();
                    if ($pro->add($data)) {
                        $this->success("用户添加成功！", U('/Home/proInfo/repair'));
                    } else {
                        $this->error("用户添加失败！", U('/Home/proInfo/repair'));
                    }
                }
            } elseif ($action == "edit") {
                $pro = D("ProComplaints");
                if ($data = $pro->create()) {
                    $pro->where(array('rid' => I('post.id')))->setInc('num');
                    $data['pid'] = I('post.id');
                    $data['time'] = time();
                    if ($pro->add($data)) {
                        $this->success('回复成功!', U('/Home/proInfo/repair'));
                    } else {
                        $this->error("回复失败！", U('/Home/proInfo/repair'));
                    }
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function swap() {
        // print_r($_SESSION);exit;
        $name = session('admin.name');
        // print_r($name);exit;   
        $data['action'] = 'add';
        $data['title'] = "添加";
        $data['btn'] = "闲置交换";
        $action = I('post.action');
        $pro = M("ProFetch");
        $count = $pro->where("role=1")->count();
        $page = initPage($count, $_COOKIE['n'] ? $_COOKIE['n'] : 15);
        $show = $page->show();
        $currentPage = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $prolist = $pro->where("role=1")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("currentPage", $currentPage);
        $this->assign("totalPage", $page->totalPages);
        $this->assign("page", $show);
        $this->assign('pro', $prolist);
        if (IS_POST) {
            if ($action == "add") {
                $pro = M("ProFetch");
                if ($data = $pro->create()) {
                    $data['role'] = 1;
                    $data['add_time'] = time();
                    if ($pro->add($data)) {
                        $url = U('/Home/proInfo/swap');
                        $this->success("用户添加成功！", $url);
                    } else {
                        $this->error("用户添加失败！", 'index');
                    }
                }
            } elseif ($action == "edit") {
                $pro = M("ProFetch");
                if ($data = $pro->create()) {
                    if ($pro->save($data)) {
                        $url = U('/Home/proInfo/swap');
                        $this->success('修改成功!', $url);
                    } else {
                        $this->error("修改失败！", 'index');
                    }
                }
            }
        }
        $this->assign('username', $name);
        $this->assign('data', $data);
        $this->display();
    }

}

?>
