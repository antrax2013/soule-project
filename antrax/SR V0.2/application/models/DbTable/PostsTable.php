<?php

	class PostsTable extends Zend_Db_Table_Abstract
	{
		protected $_name = 'posts';

		public function insert(array $data)
		{
			$data['created'] = date('Y-m-d H:i:s');
			return parent::insert($data);
		}
	}

?>