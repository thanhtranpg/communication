<?php 
require_once(ROOT_PATH.'includes/smarty/Smarty.class.php');

class TplLoad extends Smarty 
{
	function TplLoad()
	{
		
		$this->Smarty();
		$this->template_dir = ROOT_PATH."templates/";
		$this->compile_dir 	= DIR_CACHE."templates_c/";
		$this->cache_dir 	= DIR_CACHE."smarty/";
		System::CheckDir($this->compile_dir);	
		System::CheckDir($this->cache_dir);		
		$this->config_dir 	= DIR_CACHE."configs/";
		$this->cache_ext 	= ".tpl";
		$this->caching 		= false;
		$this->load_filter('output','trimwhitespace');
		
		//$this->debugging = true;
	}
    function add($key = '' , $value = '')
    {
        $this->assign($key,$value);
    }	
	
    //Chi dung cho module, neu ngoai module dung display()...
    //added by Nova 05.06.08
    /**
     * thực thi template cho module, output trực tiếp hoặc trả về giá trị output
     *
     * @param string $template : tên template
     * @param string $direct_dir_path : lấy thư mục chứa template trực tiếp
     * @param boolean $return	: false -  output trực tiếp, true - trả về giá trị output
     */
    function output($template = '', $return=false, $direct_dir_path=false) {  
    	if($direct_dir_path){
    		$template_dir = $this->template_dir . $direct_dir_path.'/';
    	}
    	else{
			if(Module::$name!=''){
    			$template_dir = $this->template_dir . Module::$name.'/';
    		}
    		else{
    			$template_dir = $this->template_dir . $template.'/';
    		}
    	}
    	System::CheckDir($template_dir);
    	
    	$template =   ($template) ? $template_dir.$template . $this->cache_ext 	: "";
    	if($return)
       	 	return $this->fetch($template);
        else
        	$this->display($template);
    }	
}
?>