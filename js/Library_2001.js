function getValueId(id,type,svalue){
	if(document.getElementById(id)){
		
		if(typeof(type)=='undefined'){
			var type='value';
		}
		
		if(typeof(svalue)=='undefined'){
			var svalue='';
		}
		
		if(type=='value'){
			return document.getElementById(id).value;
		}
		else if(type=='checked'){
			return document.getElementById(id).checked;
		}
		else if(type=='assign'){
			return document.getElementById(id).value = svalue;
		}
		else{
			return '';
		}
	}
}

function checkForInt(evt){
	var charCode = ( evt.which ) ? evt.which : event.keyCode;
	return (( charCode >= 48 && charCode <= 57 ) || charCode == 8);
}

function select_checkbox(form, name, checkbox, select_color, unselect_color){
	tr_color = checkbox.checked?select_color:unselect_color;
	if(typeof(event)=='undefined' || !event.shiftKey){
		jQuery('#'+name+'_all_checkbox').attr('lastSelected',checkbox);
		if(select_color){
			jQuery('#'+name+'_tr_'+checkbox.value).css('backgroundColor',checkbox.checked?select_color:unselect_color);
		}
		update_all_checkbox_status(form, name);
		return;
	}
	
	var active = typeof(jQuery('#'+name+'_all_checkbox').attr('lastSelected'))=='undefined'?true:false;
	
	for (var i = 0; i < form.elements.length; i++) {
		if (!active && form.elements[i]==jQuery('#'+name+'_all_checkbox').attr('lastSelected')){
			active = 1;
		}
		if (!active && form.elements[i]==checkbox){
			active = 2;
		}
		if (active && form.elements[i].id == name+'_checkbox') {
			form.elements[i].checked = checkbox.checked;
			jQuery('#'+name+'_tr_'+form.elements[i].value).css('backgroundColor',checkbox.checked?select_color:unselect_color);
		}
		
		if(active && (form.elements[i]==checkbox && active==1) || (form.elements[i]==jQuery('#'+name+'_all_checkbox').attr('lastSelected') && active==2)){
			break;
		}
	}
	update_all_checkbox_status(form, name);
}


function selectAllCheckbox(form,name,status, select_color, unselect_color){
	for (var i = 0; i < form.elements.length; i++) {
		//alert(form.elements[i].name);
		if (form.elements[i].name == 'selected_ids[]') {
			if(status==-1){
				form.elements[i].checked = !form.elements[i].checked;
			}
			else{
				form.elements[i].checked = status;
			}
			if(select_color){
				jQuery('#'+name+'_tr_'+form.elements[i].value).css('backgroundColor',form.elements[i].checked?select_color:unselect_color);
			}
		}
	}
}

function update_all_checkbox_status(form, name){
	var status = true;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].name == 'selected_ids[]' && !form.elements[i].checked) {
			status = false;
			break;
		}
	}
	jQuery('#'+name+'_all_checkbox').attr('checked',status);
}

function docheck_select(slavor_id){
	var arr = jQuery(slavor_id).get();
	for (i = 0; i < arr.length; i++) {
		if (arr[i].checked) {			
			return true
		}
	}		
	return false
}

function DelSelectForm(form,class1){
	var chk = docheck_select('.'+class1);
	
	if(chk){	
		if(confirm('Bạn có chắc muốn xóa những mục đã đánh dấu không?')){
			jQuery('#'+form).submit();
		}else return;
		
	}else{
		alert('Chưa có mục nào được chọn');
	}
}

function del_item(url,id){
	if(confirm('Bạn có chắc muốn xóa không?')){
		window.location.href = url+id;
	}else return;
}

