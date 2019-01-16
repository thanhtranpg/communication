<?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 */
class DB{
	static $db_connect_id	=false;			// connection id of this database
	static $db_result		=false;			// current result of an query
	static $db_num_queries 	= 0;
	// Debug
	static $num_queries 	= 0;			// number of queries was done
	static $query_debug 	= "";
	static $query_time;
	
	static $replicate_query = true;			// mac dinh cho tat ca query, neu co query khong dung replicate : false, xu ly xong phai tra ve true.
	static $slave_connect 	= false;		// connection id of this database
	static $master_connect 	= false;		// current result of an query
	
	function DB(){}
	
	//03.02.2010 HungHD
	static function db_connect($sqlserver, $sqluser, $sqlpassword, $dbname){
		
		if (isset($_REQUEST["xbug"]) && intval($_REQUEST["xbug"]) > 0) {
			$rtime = microtime();
			$rtime = explode(" ",$rtime);
			$rtime = $rtime[1] + $rtime[0];
			$start_time = $rtime;
		}	
		
		$db_connect_id = @mysql_connect($sqlserver, $sqluser, $sqlpassword,true);
		if (isset($db_connect_id)and $db_connect_id){
			if (!$dbselect = @mysql_select_db($dbname)){
				@mysql_close($db_connect_id);
				$db_connect_id = $dbselect;
			}
						
			if(DB_CHARSET == 'UTF8'){
				mysql_query ('SET NAMES UTF8',$db_connect_id);
			}			
			
			if (isset($_REQUEST["xbug"]) && intval($_REQUEST["xbug"]) > 0) {			
				$rtime = microtime();
				$rtime = explode(" ",$rtime);
				$rtime = $rtime[1] + $rtime[0];
				$end_time = $rtime;
				$doing_time = round(($end_time - $start_time),5)."s";
				
				CGlobal::$conn_debug .= " <b>Connect to mysql server : $sqlserver - $db_connect_id </b>[In $doing_time]<br>\n";
			}
		}

		if(!$db_connect_id){
			die('Error: Could not connect to the database!');
			return false;
		}
		
		return $db_connect_id;
	}

	static function query($query , $call_pos = ''){
		self::$db_result = false;		
		if (!empty($query)){

			if (isset($_REQUEST["xbug"]) && intval($_REQUEST["xbug"]) > 0) {
				$rtime = microtime();
				$rtime = explode(" ",$rtime);
				$rtime = $rtime[1] + $rtime[0];
				$start_time = $rtime;
			}
		
				
			if(!self::$master_connect){
				self::$master_connect = self::db_connect( DB_MASTER_SERVER , DB_MASTER_USER , DB_MASTER_PASSWORD , DB_MASTER_NAME); 
			}
			$connection_switch = self::$master_connect;
			
			self::$db_connect_id = $connection_switch;
	
			if(!(self::$db_result = @mysql_query($query, self::$db_connect_id))){
				global $no_view_bug;
				if(!$no_view_bug) {						
						if(isset($_GET["xbug"]) && intval($_GET["xbug"]) > 0){	
							echo '<p><font face="Courier New,Courier" size=4><b>'.mysql_error(self::$db_connect_id).'  in '.$query .'</b></font><br>'.($call_pos?"<b>Run at:</b> $call_pos":"");
							exit;
						}
						else{
							echo '<p><font face="Courier New,Courier" size=4><b>Không kết nối được với máy chủ DataBase</b></font><br>';
							exit;
						}		
				}
				else exit();
			}
			self::$db_num_queries++;
			

			if (isset($_REQUEST["xbug"]) && intval($_REQUEST["xbug"]) > 0) {
				if(class_exists('Module') && Module::$name!=''){
					$module_name = Module::$name;
				}
				else{								
					$module_name = "-- XuanTruongJSC";
				}
				
				$effect_rows = mysql_affected_rows(self::$db_connect_id);
				$rtime = microtime();
				$rtime = explode(" ",$rtime);
				$rtime = $rtime[1] + $rtime[0];
				$end_time = $rtime;
				$doing_time = round(($end_time - $start_time),5)."s";
			
		    	if(isset($_REQUEST["level"]) && intval($_REQUEST["level"]) == 1){
					CGlobal::$query_time += $doing_time;	    			    	
					CGlobal::$query_debug .="<li>  $query -- $effect_rows row(s) effected  ( In: $doing_time ) -- Module : <span style='color:#FF8B00;font-weight:bold'>$module_name</span><br><br></li>".($call_pos?"<b>Run at:</b> $call_pos<br />":"")."\n\n"; 		    		
		    	}
		    	elseif(isset($_REQUEST["level"]) && intval($_REQUEST["level"]) == 3){
		    			echo "<br>".$query."<br>".($call_pos?"<b>Run at:</b> $call_pos<br />":"");
		    	}
		    	else{
		        	if ( preg_match( "/^select/i", $query ) ){
		        		$eid = mysql_query("EXPLAIN $query", self::$db_connect_id);
		        		
		        		CGlobal::$query_debug .= "<table width='95%' border='1' cellpadding='6' cellspacing='0' bgcolor='#FFE8F3' align='center'>
												   <tr>
												   	 <td colspan='8' style='font-size:14px' bgcolor='#FFC5Cb'><b>Select Query</b> -- Module : <span style='color:#FF8B00;font-weight:bold'>$module_name</span>".($call_pos?"<br /><b>Run at:</b> $call_pos<br />":"")."</td>
												   </tr>
												   <tr>
												    <td colspan='8' style='font-family:courier, monaco, arial;font-size:14px;color:black'>$query</td>
												   </tr>
												   <tr bgcolor='#FFC5Cb'>
													 <td><b>table</b></td><td><b>type</b></td><td><b>possible_keys</b></td>
													 <td><b>key</b></td><td><b>key_len</b></td><td><b>ref</b></td>
													 <td><b>rows</b></td><td><b>Extra</b></td>
												   </tr>\n";
						while( $array = mysql_fetch_array($eid) ){
							$type_col = '#FFFFFF';
							
							if ($array['type'] == 'ref' or $array['type'] == 'eq_ref' or $array['type'] == 'const'){
								$type_col = '#D8FFD4';
							}
							else if ($array['type'] == 'ALL'){
								$type_col = '#FFEEBA';
							}
							
							CGlobal::$query_debug .= "<tr bgcolor='#FFFFFF'>
													 <td>$array[table]&nbsp;</td>
													 <td bgcolor='$type_col'>$array[type]&nbsp;</td>
													 <td>$array[possible_keys]&nbsp;</td>
													 <td>$array[key]&nbsp;</td>
													 <td>$array[key_len]&nbsp;</td>
													 <td>$array[ref]&nbsp;</td>
													 <td>$array[rows]&nbsp;</td>
													 <td>$array[Extra]&nbsp;</td>
												   </tr>\n";
						}
						
			    		CGlobal::$query_time += $doing_time;
						
						if ($doing_time > 0.1){
							$doing_time = "<span style='color:red'><b>$doing_time</b></span>";
						}
						
						CGlobal::$query_debug .= "<tr>
												  <td colspan='8' bgcolor='#FFD6DC' style='font-size:14px'><b>MySQL time</b>: $doing_time</b></td>
												  </tr>
												  </table>\n<br />\n";
					}
					else{
					 CGlobal::$query_debug .= "<table width='95%' border='1' cellpadding='6' cellspacing='0' bgcolor='#FEFEFE'  align='center'>
												 <tr>
												  <td style='font-size:14px' bgcolor='#EFEFEF'><b>Non Select Query</b> -- Module : <span style='color:#FF8B00;font-weight:bold'>$module_name</span>".($call_pos?"<br /><b>Run at:</b> $call_pos":"")."</td>
												 </tr>
												 <tr>
												  <td style='font-family:courier, monaco, arial;font-size:14px'>$query</td>
												 </tr>
												 <tr>
												  <td style='font-size:14px' bgcolor='#EFEFEF'><b>MySQL time</b>: $doing_time</span></td>
												 </tr>
												</table><br />\n\n";
					}
		    	}  
			}	
		}
		
		return self::$db_result;
	}
	
	// function  close
	// Close SQL connection
	// should be called at very end of all scripts
	// ------------------------------------------------------------------------------------------
	static function close($con_id=false){
		if($con_id){
			$result = @mysql_close($con_id);
			return $result;
		}
		else{
			if (isset(self::$db_result) && self::$db_result){
				@mysql_free_result(self::$db_result);
				self::$db_result=false;
			}
				
			if (isset(self::$master_connect) && self::$master_connect){
				@mysql_close(self::$master_connect);
				self::$master_connect = false;
			}
			
			if (isset(self::$slave_connect) && self::$slave_connect){
				@mysql_close(self::$slave_connect);
				self::$slave_connect = false;
			}
		}
		return true;
	}
	
	static function count($table, $condition=false,$call_pos=''){
		return self::fetch('SELECT COUNT(*) AS total FROM `'.$table.'`'.($condition?' WHERE '.$condition:''),'total',0,$call_pos);
	}
	
	//Lay ra mot ban ghi trong bang $table thoa man dieu kien $condition
	//Neu bang duoc cache thi lay tu cache, neu khong query tu CSDL
	static function select($table, $condition,$call_pos=''){
		if($result = self::select_id($table, $condition,$call_pos='')){
			return $result;
		}
		else{
			return self::exists('SELECT * FROM `'.$table.'` WHERE '.$condition.' LIMIT 0,1',$call_pos);
		}
	}
	
	static function select_id($table, $condition,$call_pos=''){
	
		if($condition and !preg_match('/[^a-zA-Z0-9_#-\.]/',$condition)){
			return self::exists_id($table,$condition,$call_pos);
		}
		else{
			return false;
		}
	}
	
	//Lay ra tat ca cac ban ghi trong bang $table thoa man dieu kien $condition sap xep theo thu tu $order
	//Neu bang duoc cache thi lay tu cache, neu khong query tu CSDL
	static function select_all($table, $condition=false, $order = false,$call_pos=''){
		if($order){
			$order = ' ORDER BY '.$order;
		}
		if($condition){
			$condition = ' WHERE '.$condition;
		}		
		self::query('SELECT * FROM `'.$table.'` '.$condition.' '.$order,$call_pos);
		return self::fetch_all();
	}
	
	

	//Tra ve ban ghi query tu CSDL bang lenh SQL $query neu co
	//Neu khong co tra ve false
	//$query: cau lenh SQL se thuc hien
	static function exists($query,$call_pos=''){
		self::query($query,$call_pos);
		if(self::num_rows()>=1){
			return self::fetch();
		}
		return false;
	}
	
	static function query_debug(){
		return self::$query_debug;
	}
	
	//Tra ve ban ghi trong bang $table co id la $id
	//Neu khong co tra ve false
	//$table: bang can truy van
	//$id: ma so ban ghi can lay
	static function exists_id($table,$id,$call_pos=''){
		if($table && $id){
			return  self::exists('SELECT * FROM `'.$table.'` WHERE id="'.$id.'" LIMIT 0,1',$call_pos);
		}
		return false;
	}
	
	static function insert($table, $values, $replace=false,$call_pos=''){
		if($replace){
			$query='REPLACE';
		}
		else{
			$query='INSERT INTO';
		}
		
		$query.=' `'.$table.'`(';
		$i=0;
		if(is_array($values)){
			foreach($values as $key=>$value){
				if(($key===0) or is_numeric($key)){
					$key=$value;
				}
				if($key){
					if($i<>0){
						$query.=',';
					}
					$query.='`'.$key.'`';
					$i++;
				}
			}
			$query.=') VALUES(';
			$i=0;
			
			foreach($values as $key=>$value){
				if(is_numeric($key) or $key===0){
					$value=Url::get($value);
				}
				
				if($i<>0){
					$query.=',';
				}

				if($value==='NULL'){
					$query.='NULL';
				}
				else{
					$query.='\''.self::escape($value).'\'';
				}
				$i++;
			}
			 $query.=')';
			
			if(self::query($query,$call_pos)){
				$id = self::insert_id();		
				return $id;
			}
		}
	}
	
	static function delete($table, $condition,$call_pos=''){
		$query='DELETE FROM `'.$table.'` WHERE '.$condition;

		if(self::query($query,$call_pos)){
			return true;
		}
	}
	
	static function delete_id($table, $id,$call_pos=''){
		return self::delete($table, 'id="'.addslashes($id).'"',$call_pos);
	}
	
	static function update($table, $values, $condition,$call_pos=''){
		$query='UPDATE `'.$table.'` SET ';
		$i=0;
		
		if($values){
			foreach($values as $key=>$value){
				if($key===0 or is_numeric($key)){
					$key=$value;
					$value=URL::get($value);
				}
				
				if($i<>0){
					$query.=',';
				}
				
				if($key){
					if($value==='NULL'){
						$query.='`'.$key.'`=NULL';
					}
					else{
						$query.='`'.$key.'`=\''.self::escape($value).'\'';
					}
					$i++;
				}
			}
			$query.=' WHERE '.$condition;
		
			if(self::query($query,$call_pos)){
				return true;
			}
		}
	}
	
	static function update_id($table, $values, $id){
		return self::update($table, $values, 'id="'.$id.'"');
	}
	
	static function num_rows($query_id = 0){
		if (!$query_id){
			$query_id = self::$db_result;
		}

		if ($query_id){
			$result = @mysql_num_rows($query_id);

			return $result;
		}
		else{
			return false;
		}
	}
	
	static function affected_rows(){
		if (isset(self::$db_connect_id) and self::$db_connect_id){
			$result = @mysql_affected_rows(self::$db_connect_id);

			return $result;
		}
		else{
			return false;
		}
	}
	
    /*========================================================================*/
    // Fetch a row based on the last query
    // Added by Nova 12.06.08
    /*========================================================================*/
    static function fetch_row($query_id = "") {
    
    	if ($query_id == ""){
    		$query_id =  self::$db_result;
    	}
    	
        $record_row = mysql_fetch_array($query_id, MYSQL_ASSOC);
        return $record_row;
    }
    
    /*
     @author PhongCT
     @todo get one row by sql query
     @param $sql string query
     @return array row
     */
    static function get_row($sql = "") {
    
    	if ($sql != ""){
		self::query($sql);	
    	}
	
	$query_id =  self::$db_result;
	
        $record_row = mysql_fetch_array($query_id, MYSQL_ASSOC);
        return $record_row;
    }
    
	static function fetch($sql = false, $field = false, $default = false,$call_pos=''){
		if($sql){
			self::query($sql,$call_pos);
		}
		
		$query_id = self::$db_result;
		if ($query_id){
			if($result = @mysql_fetch_assoc($query_id)){
				if($field && isset($result[$field])){
					return $result[$field];
				}
				elseif ($default!==false){
					return $default;
				}
				return $result;
			}
			elseif ($default!==false){
				return $default;
			}
			return $default;
		}
		else{
			return false;
		}
	}
	
	static function fetch_all($sql=false,$call_pos=''){
		if($sql){			
			self::query($sql,$call_pos);
		}
		$query_id = self::$db_result;

		if ($query_id){
			$result=array();
			while($row = @mysql_fetch_assoc($query_id)){
				if(isset($row['id']))
					$result[$row['id']] = $row;
				else 
					$result[] = $row;
			}

			return $result;
		}
		else{
			return false;
		}
	}
	
	static function fetch_array($sql=false,$call_pos=''){
		if($sql){
			self::query($sql,$call_pos);
		}
		$query_id = self::$db_result;

		if ($query_id){
			$result=array();
			while($row = @mysql_fetch_array($query_id)){				
				$result[] = $row;
			}

			return $result;
		}
		else{
			return false;
		}
	}
	
	// lxquang them vao 06/06/2008
	// Sung dung trong quan ly message
	static function fetch_all_mess($sql=false,$call_pos=''){
		if($sql){
			self::query($sql,$call_pos);
		}
		$query_id = self::$db_result;

		if ($query_id){
			$result=array();
			while($row = @mysql_fetch_assoc($query_id)){
				$result[$row['mt_id']] = $row;
			}

			return $result;
		}
		else{
			return false;
		}
	}
	//end lxquang add
	
	static function fetch_all_array($sql=false,$call_pos=''){
		if($sql){
			self::query($sql,$call_pos);
		}
		$query_id = self::$db_result;

		if ($query_id){
			$result=array();
			while($row = @mysql_fetch_assoc($query_id)){
				$result[] = $row;
			}

			return $result;
		}
		else{
			return false;
		}
	}
	
	static function insert_id(){
		if (self::$db_connect_id){
			$result = mysql_insert_id(self::$db_connect_id);
			return $result;
		}
		else{
			return false;
		}
	}
	
	static function escape($sql){
		return addslashes($sql);
	}
	
	static function num_queries(){
		return self::$db_num_queries;
	}
	
	/**
	 *select assoc
	 *@author phongct
	 *
	 *@param string $sql : String sql
	 *@param boolean $groupResult
	 * 	$groupResult = fase: Array( [key1] => value1, [key2] => value 2 )
	 * 	$groupResult = true Array(  [key1] => Array ([0] =>  value1 ),  [key2] => Array ( [0] => value2 ) )
	 *
	 */
	function getAssoc( $sql, $groupResult=false){
		if ($sql != ""){
			self::query($sql);	
		}
		
		$query_id =  self::$db_result;
		
		$results = array ();
		
		if (@mysql_num_fields ($query_id) > 2) {
			while ( is_array ( $row = mysql_fetch_array($query_id) ) ) {
				reset ( $row );
				$key = current ( $row );
				unset ( $row [key ( $row )] );
				if ($groupResult) {
					$results [$key] [] = $row;
				} else {
					$results [$key] = $row;
				}
			}
		} elseif (@mysql_num_fields ($query_id) == 2) {
			while (is_array($row = mysql_fetch_array($query_id))) {
                if ($groupResult) {
                    $results[$row[0]][] = $row[1];
                } else {
                    $results[$row[0]] = $row[1];
                }
            }
		}
		
		return $results;
	}
	static function quote($str, $escaped = true){
	if($str === null)
            return 'null';
        elseif($str === 0)
            return $str;
        else
            return "'".($escaped ? mysql_real_escape_string($str) : $str)."'";	
	}
	
	
	static function select_mul_table($fiel,$table=array(),$condition){
	  $arr=array();
	  if($condition !='') $condition = ' where '.$condition;
	 
	  foreach  ($table as $item) {
	  
	     $result=self::query('SELECT '.$fiel.' FROM `'.$item['table'].'` '.$condition);
		 if($result){
					while($row = mysql_fetch_assoc($result)){	
						$row['href'] = Url::build($item['module'],array('Newsid'=>$row['id'],'xtname'=>System::safe_title($row['title'])));						$row['folder'] =$item['folder'];		
						$arr[] = $row;
					}
				}		   	  		
	     }
		 return $arr;
			
	}
	static function select_mul_tablesos($fiel,$table=array(),$condition){
	  $arr=array();
	  if($condition !='') $condition = ' where '.$condition;
	 
	  foreach  ($table as $item) {
	     $i =1;
	     $result=self::query('SELECT '.$fiel.' FROM `'.$item['table'].'` '.$condition);
		 if($result){
					while($row = mysql_fetch_assoc($result)){	
						$row['i']=$i;
						$i++;
						$row['href'] = Url::build($item['module'],array('Newsid'=>$row['id'],'xtname'=>System::safe_title($row['title'])));						$row['folder'] =$item['folder']; 
						$row['brief200'] = Str::sub_number_char(System::post_db_parse_html($row['brief']),350);
						$row['brief'] = Str::sub_number_char(System::post_db_parse_html($row['brief']),100);
		   				$row['time'] = date('H:i | d/m/Y',$row['time']);			
						$arr[] = $row;
					}
				}		   	  		
	     }
		 return $arr;
			
	}
}
//register_shutdown_function(array("DB","close"));
?>