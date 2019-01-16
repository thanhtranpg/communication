
<?php 
class Maintenance extends Module{
	function Maintenance($row){
		Module::Module($row);
		require_once 'forms/Maintenance.php';
		$this->add_form(new MaintenanceForm());
		//self::on_draw();			
	}
}
?>
