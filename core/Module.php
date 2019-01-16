<?php
class Module{
	var 	$data = false,$forms 	 = array();
	static 	$name = '';
	
	function Module($row){				
		$this->data = $row;				
		Module::$name 		= $this->data;
	}
	
	function add_form($sub_form){$this->forms[]=$sub_form;}
	
	function submit(){		
		Module::$name 		= $this->data;
		
		$this->on_submit();
		Module::$name 		= '';
	}
	
	function on_submit(){if($this->forms){foreach ($this->forms as $sub_form){$sub_form->on_submit();}}}
	
	function draw(){if($this->forms){foreach($this->forms as $sub_form){$sub_form->on_draw();}}}
	
	function on_draw(){
		Module::$name 		= $this->data;
		
		$this->draw();
		Module::$name 		= '';
	}
}
?>