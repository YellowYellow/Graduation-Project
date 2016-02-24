<?php 
/**
* 
*/
import('@.Service.BaseService');
class BarService extends BaseService
{
	function __construct()
	{
		// 空表
		$this->dao = M();

		$this->LocationDetailDao = M('location_detail'); 
 		$this->LocationDao = M('location');
 		$this->BarDao = M('bar');
 		$this->CommentDao = M('comment');
 		$this->BarDetailDao = M('bar_detail');
	} 

	function getCityId($condition)
	{
		return $this->getInfo('LocationDao',$condition)[0]['location_id'];
	}

	function getBarsByCity($condition)
	{
		return $this->getInfo('LocationDetailDao',$condition);
	}

	function getBarDetatils($condition)
	{
		return $this->getInfo('BarDetailDao',$condition)[0];
	}
 
	function getBarDetatilsByMobile($condition)
	{
		return $this->getInfo('BarDao',$condition)[0];
	}
}
 ?>