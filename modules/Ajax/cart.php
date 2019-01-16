<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
	$content='';
	$id = System::getParamInt('id');
    
      $cmd = System::getParam('cmd');
        if($cmd=='add'){
           $product_id = System::getParam('product_id'); 
           add($product_id);
           $rs=array('result'=>1);
           echo json_encode($rs); die;
        }
        if($cmd=='update'){
           $product_id = System::getParam('product_id'); 
           $number = System::getParam('number'); 
           update($product_id,$number);
           $rs=array(
           'result'=>1,
           'total_money'=>number_format(calculator_total()),
           'money_product'=>number_format(calculator_product($product_id,$number)),
           );
          echo json_encode($rs); die;
        }
        if($cmd=='delete'){
           $product_id = System::getParam('product_id'); 
           delete($product_id);
            $rs=array(
           'result'=>1,           
           'total_money'=>number_format(calculator_total()),
           );
          echo json_encode($rs); die;
        }
        
        if($cmd=='delete_all'){
          
           delete_all();
            $rs=array('result'=>1);
           echo json_encode($rs); die;
        }
 function calculator_product($product_id,$number){
     $product_info=DB::select(PREFIX_TABLE.'product', " id ='".$product_id."'");
     return $number*$product_info['price'];
    }
    
 function calculator_total(){
    if(isset($_SESSION['cart']['product']) && sizeof($_SESSION['cart']['product']>1)){
            $array_product=array();
            $total_money=0;
            foreach($_SESSION['cart']['product'] as $key=>$number){
                $product_info=DB::select(PREFIX_TABLE.'product', " id ='".$key."'"); 
                if($product_info && isset($product_info['id'])){
                                        
                    $total_money +=$number*$product_info['price'];
                }
            else{
                unset($_SESSION['cart']['product'][$key]);
            }
            if(isset($_SESSION['cart']['vat']) && $_SESSION['cart']['vat']==1  )    $total_money +=   $total_money*0.1;
             
        }
        return $total_money;
 }       
     return 0;
 }   
    
function add($id,$number=1){
        
        if(!isset($_SESSION['cart'])){
            $s_cart=array(
             $id=>$number
            );
            $_SESSION['cart']['product']=$s_cart;
            $_SESSION['cart']['vat']=0;
            
        }else{
          if(!isset($_SESSION['cart']['product'][$id])) {
            $_SESSION['cart']['product'][$id]=$number;
          }
        }
    }
    function update($id,$number){
        
        if(!isset($_SESSION['cart'])){
            $s_cart=array(
             $id=>$number
            );
            $_SESSION['cart']['product']=$s_cart;
            $_SESSION['cart']['vat']=0;
        }else{     
             if(isset($_SESSION['cart']['product'][$id])) {
            $_SESSION['cart']['product'][$id]=$number;   
            
            }   
             
        }
    }
    function delete($id){
        
        if(isset($_SESSION['cart'])){
             
             if(isset($_SESSION['cart']['product'][$id])) {
            unset($_SESSION['cart']['product'][$id]);   
            }       
        }
    }
	function delete_all(){
        
        if(isset($_SESSION['cart'])){
             
            
            unset($_SESSION['cart']);   
            
        }
    }
?>



