<?php 
/**
* 主界面Action
*/
class MainAction extends Action
{

	public function load()
	{
		$rows = simplexml_load_file('./Public/chairxml/Pages.xml');  //载入xml文件 $lists和xml文件的根节点是一样的  
		 // $col = $bar->col;
		// $row = $bar->row;
		$data= array();
		$seats = array();
		$sale = array();

		for($i=0;$i<$rows[row_count];$i++)
		{
			$a = $rows->row[$i];	
 			$col = (array)$a[cols];
 			array_push($seats,$col[0]); 

 			for($j=0;$j<$rows[col_count];$j++)
			{ 
				$tempi = $i+1;
				$tempj = $j+1;
				if(strcmp($col[0][$j],"b")==0)
				{array_push($sale,$tempi ."_" .$tempj);}
			}
		}  
 		
 		$data['rows'] = $seats;
 		$data['sale'] = $sale;
 		$data['row'] = $rows[row_count];
 		$data['col'] = $rows[col_count]; 

		$this->ajaxReturn(array('data'=>$data),"",0);
	}
	// 首页
	public function index()
	{  
		$this->display('index');
	}

	public function manager()
	{
		$this->display('manager');
	}

	public function comment()
	{
		$this->display('comment');
	}

	public function shop()
	{
		$bar = A('Bar','Service')->getBarDetatils(array('id'=>'1'));	 
		 
		$this->assign('bar',$bar);
 
		$this->display('shop');
	}

	public function createxml()
	{ 
		$dom = new DOMDocument('1.0','utf-8'); //创建XML对象


		$rows = $dom->createElement('rows'); 
		$rows->setAttribute('row_count',$_POST['row_count']); //配置属性  
		$rows->setAttribute('col_count',$_POST['col_count']); //配置属性  
		$dom->appendChild($rows);


		for($i=0;$i<$_POST['row_count'];$i++)
		{ 
			$data = $dom->createElement('row');
			$tempstring = "row" .$i;  
			$data->setAttribute('cols',$_POST[$tempstring]); //配置属性  
			$rows->appendChild($data); //对象中插入根节点 
		}    


		echo $dom->save("./Public/chairxml/Pages.xml");
		//$this->ajaxReturn($xml,"",0);
	}
	
 	public function getCommentForPagination()
 	{ 
 		$data = array();
		foreach ($_POST as $key => $value) {
			if ($value||$value == '0') {
				$data[$key] = $value;
			}
		}  

		$pageCount = ceil(A('Main', 'Service')->getCommentCount()/$_POST['pageSize']);
		$currentPage = ($_POST['currentPage']>$pageCount)?$pageCount:$_POST['currentPage'];

		$arr = A('Main','Service')->getCommentList(array('bar_id'=>'1'), $currentPage, $_POST['pageSize']);
		$this->ajaxReturn(array('data'=>$arr,'pageCount'=>$pageCount), "数据获取成功！", 1);   
 	}
}
 ?>