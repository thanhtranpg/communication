<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
$catid = System::getParam('catid');
$start = System::getParamInt('start',0);
$limit = System::getParamInt('limit');
$where = ' Where status = 1';
if( !empty($catid)){
	$where .= ' and catid = '.$catid;
}

$sql_count = "SELECT count(id) as total_row FROM ".PREFIX_TABLE."ourwork $where ";
$total = DB::fetch($sql_count, 'total_row', 0);
$sql = "SELECT * FROM ".PREFIX_TABLE."ourwork $where  ORDER BY id desc limit $start,$limit";
			$arr = DB::fetch_all($sql);		
			$our_work_content = "";
			if (!empty($arr))
			{
				foreach ($arr as $item){
					$our_work_content .= '<div class="tab-content__item" data-aos="fade-up" onclick="javascript:load_pop_up(\''.$item['title'].'\');">';
					$our_work_content .= '
					<figure class="figure tab-content__figure" style="background-image: url(\''.ImageUrl::getItemImage('610',true,true,$item['image'],$item['id'],'ourwork').'?v='.uniqid().'\')"></figure>
                        <div class="tab-content__inner">
                            <h5 class="tab-content__title title heading--underline">'.$item['title'].'</h5>
                        </div>';
                    $our_work_content .= '</div>';
				}
				if( $total > $start + $limit){
					$often = $start + $limit;
					if( $start == 0 ) {
						$limit = 6;
					}
					
					$our_work_content .= '
					 <div class="bt_load_more_our_work tab-content__item tab-content__see-more" data-aos="fade-up" onclick="javascript:load_our_work_more(\''.$catid.'\','.$often.','. $limit . ',this);" >
		                        <figure class="figure tab-content__figure" style="background-image: url(\'/www/assets/imgs/OurWorks/Picture1.png\')"></figure>
		                        <div class="tab-content__inner">
		                            <h5 class="tab-content__title title heading--underline">SEE MORE</h5>
		                        </div>
		                    </div>';
					
				}
			}
echo $our_work_content;
?>