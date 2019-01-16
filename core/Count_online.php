
<?php
class Count{
  static   function hit_count()	//Tổng số lượt truy cập
			{
				$CountFile = "core/hit.log";
				$CF = fopen ($CountFile, "r");
				if(filesize ($CountFile))
				$Hits = fread ($CF, filesize ($CountFile) );
				else 
				 $Hits =1;
				fclose ($CF);
				if(!isset($_COOKIE['hit_count']) )
				{			
					$Hits++;
				$CB = fopen ($CountFile, "w+");
				fwrite ($CB , $Hits);
				fclose ($CB);
				
				System::my_setcookie("hit_count", "admin", time() + 3600);
					
				}
			
				
				
				
				return $Hits;
			}
			
			
			function counter_online()	//Đang Online và Online nhiều nhất
			{
				$rip = $_SERVER['REMOTE_ADDR'];
				$sd = time();
				$count = 1;
				$maxu = 1;
				$kt=1;
				$file1 = "core/ip.log";
				$lines=array();
				$lines = System::GetCacheFile($file1);
				//var_dump($lines);
				$line2 = "";
				$arr=array();
				foreach ($lines as $line_num => $line)
				{
					if($line_num == 0)
					{
						$maxu=$line;
						$arr[0] = 1;
						
					}
					else
					{
						//echo $line."<br>";
						$nam = $line['ip'];		
												
						$val = $line['time'];;
						$diff = $sd-$val;	
																	
						if( $nam != $rip && $diff <300)
						{
							$count = $count+1;
							$arr[] = $line;
							
					
						}else{
						  if($diff <300 ){
						  					$count = $count+1;
											$a=array();
											$a['ip'] = $rip;											
											$a['time'] = $sd;
						                   	$arr[]= $a;
						                    }
						}
						
						
					}
				}
				
				
				if($count > $maxu)
				$maxu = $count;
				$arr[0]= $maxu;
				
				System::PutCacheFile($file1,$arr);
				//tang count va maxu len cho nhieu
				
				
				$result=array();
				$result['online']=$count;
				$result['max_online']=$count;
					
				return $result; 
			}
}
?>

