<?php 
class Our_work extends Module{
	function Our_work($row){
		Module::Module($row);
		$catid = System::getParamInt('catid');
		if(!empty($catid)){
			require_once 'forms/View_our_work.php';
			$this->add_form(new View_our_workForm());
		}else{
			require_once 'forms/Our_work.php';
			$this->add_form(new Our_workForm());
		}

	}
}
?>