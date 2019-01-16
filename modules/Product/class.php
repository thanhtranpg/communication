<?php 
class Product extends Module{
	function Product($row){
		Module::Module($row);
		$Productid = System::getParamInt('Newsid');
		if(!empty($Productid)){
			require_once 'forms/ViewProduct.php';
			$this->add_form(new ViewProductForm());
		}else {
			require_once 'forms/Product.php';
			$this->add_form(new ProductForm());
		}
		
		//self::on_draw();			
	}
}
?>