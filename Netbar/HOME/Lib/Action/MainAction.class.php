<?php
/**
* 主界面Action
*/
class MainAction extends Action
{
	public function mobile()
	{
		$this->display('mobile');
	}

	public function load()
	{
		$rows = simplexml_load_file('./Public/chairxml/Pages.xml');  //载入xml文件 $lists和xml文件的根节点是一样的
		 // $col = $bar->col;
		// $row = $bar->row;
		$data= array();
		$seats = array();
		$sale = array();

		$free_count = 0; //连座数量
		$free_count_final = 0; //最终连座数量

		$five_num = 0; //五连座数量
		$for_num = 0; // 四连坐数量
		$three_num = 0; //三连坐数量
		$two_num = 0; //两连坐数量

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
				{
					array_push($sale,$tempi ."_" .$tempj);
					if($free_count >= 5)
					{ $five_num = $five_num + 1; }
					else if($free_count == 4)
					{ $for_num = $for_num + 1; }
					else if($free_count == 3)
					{ $three_num = $three_num + 1; }
					else if($free_count == 2)
					{ $two_num = $two_num + 1; }
					$free_count = 0;
				}
				else if (strcmp($col[0][$j],"a")==0){
					$free_count = $free_count + 1;
					if($free_count >= 5)
					{
						$five_num = $five_num + 1;
						$free_count = 0;
					}
				}
				else if (strcmp($col[0][$j],"_")==0){
					if($free_count >= 5)
					{ $five_num = $five_num + 1; }
					else if($free_count == 4)
					{ $for_num = $for_num + 1; }
					else if($free_count == 3)
					{ $three_num = $three_num + 1; }
					else if($free_count == 2)
					{ $two_num = $two_num + 1; }
					$free_count = 0;
				}
			}
			$free_count = 0;
		}

 		$data['rows'] = $seats;
 		$data['sale'] = $sale;
 		$data['row'] = $rows[row_count];
 		$data['col'] = $rows[col_count];
		$data['five_num'] = $five_num;
	  $data['for_num'] = $for_num;
	  $data['three_num'] = $three_num;
	  $data['two_num'] = $two_num;

		$this->assign('five_num',$five_num);
		$this->assign('for_num',$for_num);
		$this->assign('three_num',$three_num);
		$this->assign('two_num',$two_num);

		$this->ajaxReturn(array('data'=>$data),"",0);
	}
	// 首页
	public function index()
	{
		$this->assign('barid',$_GET['bar_id']);
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

	public function selectfinish()
	{
		 $count=$_POST["count"];
		 $selectedseat=$_POST["selectedseat"];

		//  $count = 1;
		//  $selectedseat=array('0'=>'1_1');

		 $origin = simplexml_load_file('./Public/chairxml/Pages.xml');  //载入xml文件 $lists和xml文件的根节点是一样的
		 $dom = new DOMDocument('1.0','utf-8'); //创建XML对象
		 $new = $dom->createElement('rows');
		 $new->setAttribute('row_count',$origin['row_count']); //配置属性
		 $new->setAttribute('col_count',$origin['col_count']); //配置属性
		 $dom->appendChild($new);

		 for($i=0;$i<$origin['row_count'];$i++)
		 {
				 for($j=0;$j<$count;$j++)
				{
					$temparr = explode('_',$selectedseat[$j]);
					if($temparr[0]-1 == $i)
					{
							if($j == 0)
							{
								$col = $origin->row[$temparr[0]-1];
								$cols = (array)$col[cols];
							}
							$cols[0][$temparr[1]-1] = "b";
					}
				}
			 $data = $dom->createElement('row');
			 if($cols != null)
			 {
				 $data->setAttribute('cols',$cols[0]);
			 }
			 else{
				  $col = $origin->row[$i];
			 		$cols = (array)$col[cols];
			    $data->setAttribute('cols',$cols[0]);
		   }
			 $new->appendChild($data); //对象中插入根节点
			 $cols = "";
		 }
		 //
		 $dom->save("./Public/chairxml/Pages.xml");
		  $this->ajaxReturn(array(), "预定成功！", 1);
	}

}
 ?>
