// 使用者自訂多國語系參數
if( typeof(dyfI18nLangCustom) != 'object' ){
	dyfI18nLangCustom = {};
}

// 使用者自訂視窗設定
if( typeof(dyfJqueryUiDialogOptionCustom) != 'object') {
	dyfJqueryUiDialogOptionCustom = {};
}

// *************** 禁止更動以下參數 *************** //

if( typeof(dyfMoveFieldArea) != 'string' ){
	dyfMoveFieldArea = 'dyf-move-field-area';
}

// 多國語系物件
dyfI18nLang = {
	formTitle: '增加欄位',
	label: {
		fieldName: '欄位名稱',
		fieldTpye: '欄位類型',
		option: '項目'
	},
	option: {
		text: '(Text)單行文字',
		textarea: '(TextArea)多行文字',
		radio: '(Option)單選按鈕',
		checkbox: '(Checkbox)核取方塊',
		select: '(Select)下拉式選單'
	},
	button: {
		create: '建立欄位',
		cancel: '取消'
	},
	message: {
		errorLoadJqueryLibrary: '載入jQuery失敗，請先載入jQuery模組',
		errorLoadJqueryUiLibrary: '載入jQuery UI失敗，請先載入jQuery UI模組',
		errorDynaminOptions: '動態表單項目錯誤(可能未建立相關類型)',
		errorFieldValue: '請輸入正確資料'
	},
	text: {
		addOption: '按一下這裡新增選項',
		confirmClose: '確定關閉新增欄位?'
	}
};

// 檢查jQuery載入
if( (typeof($) != 'function') || (typeof(jQuery) != 'function') ){
	alert( dyfI18nLang.message.errorLoadJqueryLibrary );
	throw dyfI18nLang.message.errorLoadJqueryLibrary;
}

// 檢查jQuery UI載入
if( (typeof($.ui) != 'object') ) {
	alert( dyfI18nLang.message.errorLoadJqueryUiLibrary );
	throw dyfI18nLang.message.errorLoadJqueryUiLibrary;
}

// 合併自訂語系檔案
$.extend( true, dyfI18nLang, dyfI18nLangCustom );

// jQuery UI Dialog Widget 選項(若無其它設定，則其它選項依照jQuery UI Dialog Widget預設)
dyfJqueryUiDialogOption = {
	autoOpen: false,	// 自動開啟視窗
	modal: true,		// 成為上層視窗(背景加入透明遮罩，使用者點擊週圍不會關閉視窗)
	width: '800px',		// 視窗寬度
	height: 'auto',		// 視窗高度
	position: 'center'	// 視窗位置
};

// 合併自訂視窗設定
$.extend( true, dyfJqueryUiDialogOption, dyfJqueryUiDialogOptionCustom);

// 動態表單物件
dynamicForm = {
	head: '',
	style: '',
	html: '',
	ghtml: '',
	gid: 0,
	dynamicOptions: new Array({
		value: 'text', text: dyfI18nLang.option.text
	},{
		value: 'textarea', text: dyfI18nLang.option.textarea
	},{
		value: 'radio', text: dyfI18nLang.option.radio
	},{
		value: 'checkbox', text: dyfI18nLang.option.checkbox
	},{
		value: 'select', text: dyfI18nLang.option.select
	}),
	createDialog: function(){
		
		dyfJqueryUiDialogOption.buttons = [{
			text: dyfI18nLang.button.create,
			click: function(){
				
				// 關閉視窗
				if( dynamicForm.moveFields() ){
					dynamicForm.clearData();
				}
			}
		},{
			text: dyfI18nLang.button.cancel,
			click: function(){
				// 關閉Dialog視窗
				if( $('#dyf-field-name').val().length == 0 || confirm( dyfI18nLang.text.confirmClose ) ){
					// 關閉視窗
					dynamicForm.clearData();
				}
			}
		}];
		$('#dyf-dialog-form').dialog(dyfJqueryUiDialogOption);
		$('#dyf-dialog-form').dialog('open');
	},
	// 將欄位傳送至指定區域
	moveFields: function(){
		var error = false;
		
		this.gid = $.now();
		this.ghtml  = '';
		this.ghtml += '<div class="dyf-gen-row-group">';
		switch($('#dyf-field-type').val()){
			
			// 單行文字
			case 'text':
				this.ghtml += '<label class="dyf-gen-row-label" for="dyf-gen-text-value-'+ this.gid +'" style="cursor: pointer; vertical-align: top;">'+ $('#dyf-field-name').val() +'</label>';
				this.ghtml += '<input type="text" id="dyf-gen-text-value-'+ this.gid +'" name="dyf-gen-text-value-'+ this.gid +'" value="" />';
				break;
				
			// 多行文字
			case 'textarea':
				this.ghtml += '<label class="dyf-gen-row-label" for="dyf-gen-textarea-value-'+ this.gid +'" style="cursor: pointer; vertical-align: top;">'+ $('#dyf-field-name').val() +'</label>';
				this.ghtml += '<textarea id="dyf-gen-textarea-value-'+ this.gid +'" name="dyf-gen-textarea-value-'+ this.gid +'" rows="6" cols="50" style="display: inline-table;"></textarea>';
				break;
			
			// 單選按鈕
			case 'radio':
				if($('input[name^=dyf_radio]:eq(0)').val().length == 0){
					dynamicForm.errorField($('input[name^=dyf_radio]:eq(0)'));
					error = true;
				}
				
				this.ghtml += '<label class="dyf-gen-row-label" style="vertical-align: top;">'+ $('#dyf-field-name').val() +'</label>';
				this.ghtml += '<span class="dyf-gen-radio-group" style="display: inline-table;">';
				for(var i=0; i<$('input[name^=dyf_radio]').size()-1; i++){
					if( $('input[name^=dyf_radio]:eq('+ i +')').val() == '' ){
						continue;
					}
					this.ghtml += '<div class="dyf-gen-radio-row">';
					this.ghtml += '<input type="radio" id="dyf-gen-radio-value-'+ this.gid +'-'+ i +'" name="dyf-gen-radio-value-'+ this.gid +'" value="'+ $('input[name^=dyf_radio]:eq('+ i +')').val() +'" />';
					this.ghtml += '<label for="dyf-gen-radio-value-'+ this.gid +'-'+ i +'" style="cursor: pointer;">';
					this.ghtml += '&nbsp;'+ $('input[name^=dyf_radio]:eq('+ i +')').val();
					this.ghtml += '</label>';
					this.ghtml += '</div>';
				}
				this.ghtml += '</span>';
				break;
			
			// 核取方塊
			case 'checkbox':
				if($('input[name^=dyf_checkbox]:eq(0)').val().length == 0){
					dynamicForm.errorField($('input[name^=dyf_checkbox]:eq(0)'));
					error = true;
				}
			
				this.ghtml += '<label class="dyf-gen-row-label" style="vertical-align: top;">'+ $('#dyf-field-name').val() +'</label>';
				this.ghtml += '<span class="dyf-gen-checkbox-group" style="display: inline-table;">';
				for(var i=0; i<$('input[name^=dyf_checkbox]').size()-1; i++){
					if( $('input[name^=dyf_checkbox]:eq('+ i +')').val() == '' ){
						continue;
					}
					this.ghtml += '<div class="dyf-gen-checkbox-row">';
					this.ghtml += '<input type="checkbox" id="dyf-gen-checkbox-value-'+ this.gid +'-'+ i +'" name="dyf-gen-radio-value-'+ this.gid +'_'+ i +'" value="'+ $('input[name^=dyf_checkbox]:eq('+ i +')').val() +'" />';
					this.ghtml += '<label for="dyf-gen-checkbox-value-'+ this.gid +'-'+ i +'" style="cursor: pointer;">';
					this.ghtml += '&nbsp;'+ $('input[name^=dyf_checkbox]:eq('+ i +')').val();
					this.ghtml += '</label>';
					this.ghtml += '</div>';
				}
				this.ghtml += '</span>';
				break;
				
			// 下拉式選單
			case 'select':
				if($('input[name^=dyf_select]:eq(0)').val().length == 0){
					dynamicForm.errorField($('input[name^=dyf_select]:eq(0)'));
					error = true;
				}
				var size = 0;
				this.ghtml += '<label class="dyf-gen-row-label" for="dyf-gen-select-value-'+ this.gid +'" style="cursor: pointer; vertical-align: top;">'+ $('#dyf-field-name').val() +'</label>';
				this.ghtml += '<span class="dyf-gen-select-group" style="display: inline-table;">';
				this.ghtml += '<select id="dyf-gen-select-value-'+ this.gid +'" name="dyf-gen-text-value-'+ this.gid +'" style="min-height: 30px; line-height: 30px;">';
				for(var i=0; i<$('input[name^=dyf_select]').size()-1; i++){
					if( $('input[name^=dyf_select]:eq('+ i +')').val() == '' ){
						continue;
					}
					size++;
					this.ghtml += '<option value="'+ $('input[name^=dyf_select]:eq('+ i +')').val() +'">'+ $('input[name^=dyf_select]:eq('+ i +')').val() +'</option>';
				}
				if( size == 0 ){
					return;
				}
				this.ghtml += '</select>';
				this.ghtml += '</span>';
				break;
			default:
				alert( dyfI18nLang.message.errorDynaminOptions );
				throw dyfI18nLang.message.errorDynaminOptions;
				break;
		}
		this.ghtml += '</div>';
		
		if( $('#dyf-field-name').val().length == 0 ){
			dynamicForm.errorField($('#dyf-field-name'));
			error = true;
		}
		
		// 結果回傳
		if( !error ){
			$('#'+ dyfMoveFieldArea).append(this.ghtml);
			return true;
		}
		return false;
	},
	// Check: 檢查欄位資料
	errorField: function(element){
		element.css({
			'border-color': '#f00',
			'border-style': 'dashed'
		});
		element.keyup(function(){
			$('#dyf-dialog-form .dyf_error_message').css({
				display: 'none'
			});
				
			element.css({
				'border-color': '',
				'border-style': ''
			});
		});
		if( element.next('span.dyf_error_message').size() == 0 ){
			element.after('<span class="dyf_error_message">'+ dyfI18nLang.message.errorFieldValue +'</span>');
		} else {
			element.next('span.dyf_error_message').css({
				display: 'inline-block'
			});
		}
	},
	// Method: 切換欄位類型
	typeChange: function(type){
		dyfTools.createOptionFields(type);
	},
	// Method: 關閉視窗
	clearData: function(){
		$('#dyf-field-name').val('');
		$('#dyf-field-type').prop('selectedIndex', 0);
		$('#dyf-field-type').change();
		$('#dyf-dialog-form').dialog("destroy");
	}
};

dyfTools = {
	html: '',
	type: false,
	element: false,
	// 產生欄位
	createOptionFields: function(type){
		this.type = type;
		dyfTools.html = '<div class="dyf-row-group">';
		switch(type){
			case 'radio':
				$('#dyf-option-group').show();
				dyfTools.html += '<input type="'+ this.type +'" disabled="true" />';
				break;
			case 'checkbox':
				$('#dyf-option-group').show();
				dyfTools.html += '<input type="'+ this.type +'" disabled="true" />';
				break;
			case 'select':
				$('#dyf-option-group').show();
				break;
			default:
				$('#dyf-option-group').hide();
				break;
		}
		dyfTools.html += '<input type="text" name="dyf_'+ this.type +'[]" value="" />';
		dyfTools.html += '</div>';
		
		$('#dyf-option-area').html(dyfTools.html);
		dyfTools.appendOptionField();
	},
	// 堆疊欄位
	appendOptionField: function(){
		dyfTools.html = '<div class="dyf-row-group">';
		switch(this.type){
			case 'radio':
				$('#dyf-option-group').show();
				dyfTools.html += '<input type="'+ this.type +'" disabled="true" />';
				break;
			case 'checkbox':
				$('#dyf-option-group').show();
				dyfTools.html += '<input type="'+ this.type +'" disabled="true" />';
				break;
			default:
				
				break;
		}
		dyfTools.html += '<input type="text" name="dyf_'+ this.type +'[]" onFocus="dyfTools.checkOptionField(this)" placeholder="'+ dyfI18nLang.text.addOption +'" value="" />';
		dyfTools.html += '<span class="ui-button-icon-primary ui-icon ui-icon-closethick" onClick="dyfTools.removeOptionField(this)">&nbsp;</span>';
		dyfTools.html += '</div>';
		$('#dyf-option-area').append(dyfTools.html);
	},
	// 檢查欄位
	checkOptionField: function(element){
		this.element = element;
		if( $(this.element).index('input[name^=dyf_'+ this.type +']') == $('input[name^=dyf_'+ this.type +']').size()-1 ){
			this.appendOptionField();
			
			$(this.element).attr('placeholder', '');
			$(this.element).parent().children('.ui-icon-closethick').css('display', 'inline-table');
		}
	},
	// 移除欄位
	removeOptionField: function(element){
		this.element = element;
		if( $(element).parent().children('input[name^=dyf_'+ this.type +']').index('input[name^=dyf_'+ this.type +']') != $('input[name^=dyf_'+ this.type +']').size()-1 ){
			$(element).parent().remove();
		}
	}
}

$(document).ready(function(e) {
	
	// 額外增加標頭
	dynamicForm.head  = '<style> </style>';
	$('head').append(dynamicForm.head);
	
	// 額外增加樣式
	dynamicForm.style += '#dyf-dialog-form { display: none; }';
	dynamicForm.style += '#dyf-dialog-form label { display: inline-block; min-width: 100px; }';
	dynamicForm.style += '#dyf-dialog-form label, #dyf-dialog-form input, #dyf-dialog-form select { line-height: 30px; font-size: 16px; }';
	dynamicForm.style += '#dyf-dialog-form input[type=text], #dyf-dialog-form select { min-width: 250px; padding: 4px 6px; border: 1px solid #ccc; border-radius: 4px; }';
	dynamicForm.style += '#dyf-dialog-form #dyf-option-group { display: none; }';
	dynamicForm.style += '#dyf-dialog-form .dyf-widget-group-row .dyf-option-area { display: inline-table; }';
	dynamicForm.style += '#dyf-dialog-form .dyf-row-group .ui-icon-closethick { display: none; line-height: 16px; cursor: pointer; }';
	dynamicForm.style += '#dyf-dialog-form .dyf_error_message { display: inline-block; color: #f00; font-size: 18px; }';
	dynamicForm.style += '#'+ dyfMoveFieldArea +' .dyf-gen-row-label { display: inline-block; padding: 4px 6px; min-width: 125px; display: inline-block; cursor: pointer; }';
	$('style').append(dynamicForm.style);
	
	// HTML框架
	dynamicForm.html  = '<div id="dyf-dialog-form" class="dyf-dialog-form" title="'+ dyfI18nLang.formTitle +'">';
	dynamicForm.html += '<form>';
	dynamicForm.html += '<fieldset>';
	dynamicForm.html += '<div class="dyf-widget-group-row">';
	dynamicForm.html += '<label for="dyf-field-name">'+ dyfI18nLang.label.fieldName +'</label>';
	dynamicForm.html += '<input type="text" name="dyf_field_name" id="dyf-field-name" class="dyf-widget-content" />';
	dynamicForm.html += '</div>';
	dynamicForm.html += '<div class="dyf-widget-group-row">';
	dynamicForm.html += '<label for="dyf-field-type">'+ dyfI18nLang.label.fieldTpye +'</label>';
	dynamicForm.html += '<select id="dyf-field-type" name="dyf_field_type" class="dyf-widget-content" onChange="dynamicForm.typeChange(this.value)">';
	// 動態欄位類型
	for(var i=0; i<dynamicForm.dynamicOptions.length; i++){
	dynamicForm.html += '<option value="'+ dynamicForm.dynamicOptions[i].value +'">'+ dynamicForm.dynamicOptions[i].text +'</option>';
	}
	dynamicForm.html += '</select>';
	dynamicForm.html += '</div>';
	dynamicForm.html += '<div id="dyf-option-group" class="dyf-widget-group-row">';
	dynamicForm.html += '<label for="dyf-option-area">'+ dyfI18nLang.label.option +'</label>';
	dynamicForm.html += '<span id="dyf-option-area" class="dyf-option-area">&nbsp;</span>';
	dynamicForm.html += '</div>';
	dynamicForm.html += '</fieldset>';
	dynamicForm.html += '</form>';
	dynamicForm.html += '</div>';
	$('body').first().prepend(dynamicForm.html);
	
	if( dyfJqueryUiDialogOption.autoOpen === true ){
		dynamicForm.createDialog();
	}
});