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
