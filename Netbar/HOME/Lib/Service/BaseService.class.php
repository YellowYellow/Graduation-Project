<?php 
/**
* Base Service 基Service
*/
class BaseService
{

	// 通用获取信息Function
	// $dao 所用数据库表对象
	// $condition 查询条件
	// $order 排序条件
	public function getInfo($dao, $condition = null, $order = null, $limit=null, $field = null)
	{
		return $this->$dao
		->where($condition)
		->order($order)
		->limit($limit)
		->field($field)
		->select();
	}

	// 通用获取一条信息Function
	// $dao 所用数据库表对象
	// $condition 查询条件
	// $order 排序条件
	public function getOne($dao, $condition = null, $order = null)
	{
		return $this->$dao
		->where($condition)
		->order($order)
		->find();
	}

	// 通用获取信息Function FOR Ajax
	// $dao 所用数据库表对象
	// $condition 查询条件
	// $order 排序条件
	public function getInfoForAjax($dao, $condition = null, $order = null, $field = null)
	{
		$result = $this->getInfo($dao, $condition, $order, $field);
		return array('data'=>$result, 'info'=>'数据获取成功', 'status'=>1);
	}

	// 通用获取记录总条数Function
	// $dao 所用数据库表对象
	// $condition 查询条件
	public function getCount($dao, $condition = null)
	{
		return $this->$dao
		->where($condition)
		->count();
	}

	// 通用获取记录总条数Function FOR Ajax
	// $dao 所用数据库表对象
	// $condition 查询条件
	public function getCountForAjax($dao, $condition = null)
	{
		$result = $this->getCount($dao, $condition);
		return array('data'=>$result, 'info'=>'数据获取成功', 'status'=>1);
	}

	// 通用获取信息In Page Function
	// $dao 所用数据库表对象
	// $condition 查询条件
	// $order 排序条件
	// $page 分页条件(page=>当前页码,pageSize=>每页条数)
	public function getInfoInPage($dao, $condition = null, $order_str = null, $page = array('page'=>1, 'pageSize'=>10))
	{
		return $this->$dao
		->where($condition)
		->order($order_str)
		->page($page['page'], $page['pageSize'])
		->select();
	}

	// 通用获取信息In Page Function
	// $dao 所用数据库表对象
	// $condition 查询条件
	// $order 排序条件
	// $page 分页条件(page=>当前页码,pageSize=>每页条数)
	public function getInfoInPageWithRelation($dao, $condition = null, $order_str = null, $page = array('page'=>1, 'pageSize'=>10), $relation=null)
	{
		return $this->$dao
		->where($condition)
		->order($order_str)
		->page($page['page'], $page['pageSize'])
		->relation($relation)
		->select();
	}

	// 通用获取信息In Page Function For Ajax
	// $dao 所用数据库表对象
	// $condition 查询条件
	// $order 排序条件
	// $page 分页条件(page=>当前页码,pageSize=>每页条数)
	public function getInfoInPageForAjax($dao, $condition = null, $order_str = null, $page = array('page'=>1, 'pageSize'=>10))
	{
		$result = $this->getInfoInPage($dao, $condition, $order_str, $page);
		return array('data'=>$result, 'info'=>'数据获取成功', 'status'=>1);
	}

	// 通用保存信息 Function
	// $dao 所用数据库表对象
	// $data 数据
	// $id ID字段名
	public function saveInfo($dao, $data = null, $id = 'id')
	{
		if (isset($data[$id])) {
			return $this->$dao
					->save($data);
		} else {
			return $this->$dao ->add($data); 
		}
	}

	// 通用保存信息 Function FOR Ajax
	// $dao 所用数据库表对象
	// $data 数据
	// $id ID字段名
	public function saveInfoForAjax($dao, $data = null, $id = 'id')
	{
		$result = $this->saveInfo($dao, $data, $id);
		if ($result) {
			return array('data'=>$result, 'info'=>'数据保存成功', 'status'=>1);
		}
		return array('data'=>$result, 'info'=>'数据保存失败', 'status'=>0);
	}

	// 通用删除方法，
	// $dao 所用数据库表对象
	// $id 数据ID
	// $mapKey ID字段名
	public function removeInfo($dao, $id, $mapKey = 'id')
	{
		if (isset($id)) {
			$condition = array($mapKey=>$id);
			return $this->$dao->where($condition)->delete();
		}
		return false;
	}

	// 通用删除方法，FOR Ajax
	// $dao 所用数据库表对象
	// $id 数据ID
	// $mapKey ID字段名
	public function removeInforAjax($dao, $id, $mapKey = 'id')
	{
		$result = $this->removeInfo($dao, $id, $mapKey);
		if ($result) {
			return array('data'=>$result, 'info'=>'数据删除成功', 'status'=>1);
		}
		return array('data'=>$result, 'info'=>'数据删除失败', 'status'=>0);
	}

	// 通用获取特定列 For Ajax
	public function getField($dao, $condition = null, $field = null)
	{
		return $this->$dao->field($field)->where($condition)->select();
	}

	// 通用获取特定列
	// $dao 所用数据库表对象
	// $condition 搜索条件
	// $field 要查找的列
	public function getFieldForAjax($dao, $condition = null, $field = null)
	{
		$data = $this->$dao->field($field)->where($condition)->select();
		return array('data'=>$data, 'info'=>'数据查找成功', 'status'=>1);
	}


	// 获取所有单子段出现的内容
	// $dao 所用数据库对象
	// $field 要查询的项
	public function getDistinct($dao, $field)
	{
		return $this->$dao->Distinct(true)->field($field)->select();
	}
}
 ?>