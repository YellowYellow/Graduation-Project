<?php

class MyNetBarAction extends Action {

    public function index(){

    	$id = A('Bar','Service')->getCityId(array('location_name'=>'湖北天门'));

    	$list = A('Bar','Service')->getBarsByCity(array('locaiton_id'=>$id));
      //$place = A('Bar','Service')->getplaceById(array('id'=>$list[$i]['id']));

    	$returnlist = array();

    	for($i=0;$i<count($list);$i++)
  		{
        $element = array();
        $element = A('Bar','Service')->getBarDetatilsByMobile(array('location_detail_id'=>$list[$i]['id']));
        //  $element['location_detail']  = A('Bar','Service')->getplaceById(array('id'=>$list[$i]['id']))['location_detail'];
        array_push($returnlist,$element);
     	}
    	// foreach($list as $element)
    	// {
    	// 	//dump($element['id']);
    	//    //array_merge($returnlist,A('Bar','Service')->getBarDetatilsByLocationId(array('location_detail_id'=>$element['id'])));
    	//    dump(A('Bar','Service')->getBarDetatilsByLocationId(array('location_detail_id'=>$element['id'])));
    	// }
    	// $_GET['location'];
    	// $bars[0] = array('bar_name'=>'满天星网吧','good'=>);
		//dump($returnlist);
         $this->AjaxReturn($returnlist,"",0);
    }


    public function getBardetail()
    {
    	//dump($_GET['id']);
    	$bar_detail = A('Bar','Service')->getBarDetatils(array('id'=>$_GET['id']));

      //$bar_detail = A('Bar','Service')->getBarDetatils(array('id'=>$_GET['id']));

      $rows = simplexml_load_file($bar_detail['chair_xml']);  //./Public/chairxml/Pages.xml
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

      $bar_detail['two'] = $two_num;
      $bar_detail['three'] = $three_num;
      $bar_detail['for'] = $for_num;
      $bar_detail['five'] = $five_num;

    	$this->AjaxReturn($bar_detail,"",0);
    }


    public function test()
    {
      //dump($_GET['id']);
      $bar_detail = A('Bar','Service')->getBarDetatilsByMobile(array('id'=>'1'));
      dump($bar_detail['Sofa']);
    }
}
 ?>
