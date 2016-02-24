<?php 
/**
* 
*/
import('@.Service.BaseService');
class MainService extends BaseService
{
	function __construct()
	{
		// 空表
		$this->dao = M();

		$this->CommentDao = M('comment'); 
 		
	} 

	function getCommentList($condition = null, $page = 1, $pageSize = 8)
	{   
		return $this->getInfoInPage('CommentDao', $condition, null, array('page'=>$page, 'pageSize'=>$pageSize));
	}

	function getCommentCount($condition = null)
	{
		return $this->getCount('CommentDao',$condition);
	}
 
}
 ?>