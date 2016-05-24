<?php
/**
* 主界面Action
*/
class UserAction extends Action
{
	// 首页
	public function index()
	{
		$this->display('index');
	}

	public function register()
	{
		$this->display('register');
	}

	public function registerfinish()
	{
		$data = array('user_id'  =>$_GET["user_id"],
							'passwd'  =>$_GET["passwd"],
							'type'    =>0,
							'question'=>$_GET["question"],
							'answer'  =>$_GET["answer"]);
		A('User','Service')->registerUser($data);
		$this->redirect("/User/index",Array(),0,"");
	}

	public function login()
	{
		$condition = array('user_id'=>$_GET["user_id"],'passwd'=>$_GET["password"]);
		 if(A('User','Service')->getUserInfo($condition))
		{
			$userinfo = A('User','Service')->getUserInfo($condition);
			$id = A('Bar','Service')->getBarIdByManagerId(array("manager_id"=>$userinfo['id']));
			$this->redirect("/Main/index",array('id'=>$id),0,"");
		}
	}
	// // 获取游戏的版本号
	// public function getVersionsByProject()
	// {
	// 	$condition = array('game_id'=>$_GET['game_id']);
	// 	$versions = A('Check', 'Service')->getVersionsByGameId($condition);
	// 	$this->ajaxReturn($versions, "数据获取成功！", 1);
	// }

	// // 查找
	// public function getInfoForPagination()
	// {
	// 	$data = array();
	// 	foreach ($_POST as $key => $value) {
	// 		if ($value||$value == '0') {
	// 			$data[$key] = $value;
	// 		}
	// 	}

	// 	$pageCount = ceil(A('Check', 'Service')->getBugItemsCount($data)/$_POST['pageSize']);
	// 	$currentPage = ($_POST['currentPage']>$pageCount)?$pageCount:$_POST['currentPage'];

	// 	$arr = A('Check', 'Service')->getBugItemsInViewInPage($data, $currentPage, $_POST['pageSize']);
	// 	$this->ajaxReturn(array('data'=>$arr,'pageCount'=>$pageCount), "数据获取成功！", 1);
	// }

	// public function addItem()
	// {

	// }

	// public function removeItem()
	// {
	// 	// $data = $_GET;
	// 	// $m = M('bug_record');
	// 	// $arr = $m->delete($data['id']);
	// 	// echo "删除成功";


	// 	$result = A('Check', 'Service')->removeItemById($_GET['id']);
	// 	echo "删除成功".$result;
	// }

 // 	public function submitItem()
 // 	{
 // 	 	$sub = A('Check', 'Service')->subItemById($_GET['id']);
	// 	echo "修改成功";
 // 	}


}
 ?>
