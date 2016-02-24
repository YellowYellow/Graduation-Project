<?php 
/**
* 
*/
import('@.Service.BaseService');
class CheckService extends BaseService
{
	function __construct()
	{
		// 空表
		$this->dao = M();

		$this->bugItemsView = M('bug_items');
		$this->bugItemsDao = M('bug_record');
		$this->bugtypeDao = M('bug');
 
	}

	// 分页获取所有BUG数据
	// 默认取第一页，每页显示10个
	public function getBugItemsInPage($condition = null, $page = 1, $pageSize = 15)
	{
		return $this->getInfoInPageWithRelation('bugItemRelationDao', $condition, null, array('page'=>$page, 'pageSize'=>$pageSize), true);
	}

	// 分页获取所有BUG数据
	// 默认取第一页，每页显示10个
	public function getBugItemsInViewInPage($condition = null, $page = 1, $pageSize = 15)
	{
		return $this->getInfoInPage('bugItemsView', $condition, null, array('page'=>$page, 'pageSize'=>$pageSize));
	}

	// 获取所有BUG的个数
	public function getBugItemsCount($condition = null)
	{
		return $this->getCount('bugItemsView', $condition);
	}

	// 获取所有bug类型
	public function getAllBugs()
	{
		return $this->getInfo('bugtypeDao');
	}

	// 获取所有Game数据
	public function getAllGames()
	{
		return $this->getInfo('gameDao');
	}

	// 获取所有BUG关联数据
	public function getBugItemsReation()
	{
		return $this->bugItemRelationDao->relation(true)->select();
	}

	public function getVersionsByGameId($condition)
	{
		return $this->getInfo('gameVersionDao', $condition);
	}

	// 根据ID删除BUG信息
	public function removeItemById($id)
	{
		return $this->removeInfo('bugItemsDao', $id);
	}

	//根据ID提交某条BUG信息
	public function subItemById($id)
	{
		$this->bugItemsDao->find($id);
		$this->bugItemsDao->isSubmit = '1';
		$this->bugItemsDao->save();
	}

	//保存修复人和负责人
	public function saveManInfoById($id,$responsible_man,$repair_man)
	{
		$this->bugItemsDao->find($id);
		$this->bugItemsDao->responsible_man = $responsible_man;
		$this->bugItemsDao->repair_man = $repair_man;
		if($repair_man!=null)
		{
			$this->bugItemsDao->flag = '1';	
		}
		$this->bugItemsDao->save();
	}

	//取得有权限的人的ID
	public function getPower($condition)
	{ 
		return $this->getInfo('powerDao',$condition);
	}

	//
	public function getPowerGames($condition)
	{  
		return $this->powerGamesRelationDao->relation(true)->where($condition)->select();
	}
}
 ?>