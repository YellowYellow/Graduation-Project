<?php
/**
*
*/
import('@.Service.BaseService');
class UserService extends BaseService
{
	function __construct()
	{
		// 空表
		$this->dao = M();

		$this->UserDao = M('user');

	}

	function getUserInfo($condition)
	{
		return $this->getInfo('UserDao',$condition);;
	}

	function registerUser($data)
	{
		return $this->saveInfo('UserDao',$data);
	}
}
 ?>
