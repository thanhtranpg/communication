<?php 
class Admin_ourwork extends Module{
	function Admin_ourwork($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		switch ($cmd){
			case 'addcat':
			case 'editcat':
			case 'listcat':
			case 'delcat':
				require_once 'forms/Admin_ourwork_cat.php';
				$this->add_form(new Admin_ourwork_catForm());
				break;

            case 'img':
			case 'delimg':
			case 'editimg':
				require_once 'forms/Admin_image.php';
				$this->add_form(new Admin_imageForm());	
				break;
			case 'slide':
			case 'delslide':
			case 'editslide':
				require_once 'forms/Admin_slide.php';
				$this->add_form(new Admin_slideForm());	
				break;

			case 'video':
			case 'delvideo':
			case 'editvideo':
				require_once 'forms/Admin_video.php';
				$this->add_form(new Admin_videoForm());	
				break;
                
			default:
				require_once 'forms/Admin_ourwork.php';
				$this->add_form(new Admin_ourworkForm());		
				break;
				
		}				
	}
}
?>