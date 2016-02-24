<?php 
/**
* 
*/
class BugItemInfoModel extends RelationModel
{
	protected $tableName = 'bug_record'; 
  	protected $_link = array(
		'game'=> array(  
			'mapping_type'=>BELONGS_TO,
	        'class_name'=>'game',
	        'foreign_key'=>'game_id',
	        'mapping_key'=>'game_id',
	        'as_fields'=>'game_name'
       ),

		'level'=> array(  
			'mapping_type'=>BELONGS_TO,
	        'class_name'=>'level',
	        'foreign_key'=>'level_id',
	        'mapping_key'=>'level_id',
	        'as_fields'=>'level'
       ),
	);
}

 ?>