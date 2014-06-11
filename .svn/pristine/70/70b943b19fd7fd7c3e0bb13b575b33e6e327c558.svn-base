/*
 * 清除Textbox上遮挡的文字 
 */
function BindLabClear(id,text){
	$(id+" input").keyup(function(){
	if(($(id+" input").attr("value")=="")){
		$(id+" label").text(text);
	}
	else{
		$(id+" label").text("");
	}});
	
	//检查自动加载
	if(($(id+" input").attr("value")!="")){
		$(id+" label").text("");
	}
}

function ChangeTab(oldtab,newtab){
	$(oldtab).hide('normal');
	$(newtab).show('normal');
}