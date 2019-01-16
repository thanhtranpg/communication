<?php 
class Admin_product extends Module{
	function Admin_product($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		switch ($cmd){
			case 'addcat':
			case 'editcat':
			case 'listcat':
			case 'delcat':
				require_once 'forms/Admin_product_cat.php';
				$this->add_form(new Admin_product_catForm());
				break;
             case 'img':
			case 'delimg':
			case 'editimg':
				require_once 'forms/Admin_image.php';
				$this->add_form(new Admin_imageForm());	
				break;     
                
			default:
				require_once 'forms/Admin_product.php';
				$this->add_form(new Admin_productForm());		
				break;
				
		}				
	}
}
?>