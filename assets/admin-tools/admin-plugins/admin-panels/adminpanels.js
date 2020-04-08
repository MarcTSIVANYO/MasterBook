;(function($,window,document,undefined){$.fn.adminpanel=function(options){var defaults={grid:'.admin-grid',draggable:false,mobile:false,preserveGrid:false,onPanel:function(){console.log('callback:','onPanel');},onStart:function(){console.log('callback:','onStart');},onSave:function(){console.log('callback:','onSave');},onDrop:function(){console.log('callback:','onDrop');},onFinish:function(){console.log('callback:','onFinish');},};var options=$.extend({},defaults,options);var plugin=$(this);var pluginID=plugin.attr('id');var pluginGrid=options.grid;var dragSetting=options.draggable;var mobileSetting=options.mobile;var preserveSetting=options.preserveGrid;var panels=plugin.find('.panel');var settingsKey='panel-settings_'+ location.pathname;var positionsKey='panel-positions_'+ location.pathname;var settingsGet=localStorage.getItem(settingsKey);var positionsGet=localStorage.getItem(positionsKey);$('.panel').on('click','.panel-controls > a',function(e){e.preventDefault();if($('body.ui-drag-active').length){return;}
methods.controlHandlers.call(this,options);});var methods={init:function(options){var This=$(this);if(typeof options.onStart=='function'){options.onStart();}
if(!positionsGet){localStorage.setItem(positionsKey,methods.findPositions());}else{methods.setPositions();}
if(!settingsGet){localStorage.setItem(settingsKey,methods.modifySettings());}
$(pluginGrid).each(function(i,e){$(e).attr('id','grid-'+ i);});if(preserveSetting){var Panel="<div class='panel preserve-grid'></div>";$(pluginGrid).each(function(i,e){$(e).append(Panel);});}
methods.createControls(options);methods.createMobileControls(options);methods.applySettings();if(dragSetting===true){plugin.sortable({items:plugin.find('.panel:not(".sort-disable")'),connectWith:pluginGrid,cursor:'default',revert:250,handle:'.panel-heading',opacity:1,delay:100,tolerance:"pointer",scroll:true,placeholder:'panel-placeholder',forcePlaceholderSize:true,forceHelperSize:true,start:function(e,ui){$('body').addClass('ui-drag-active');ui.placeholder.height(ui.helper.outerHeight()- 4);},beforeStop:function(){if(typeof options.onDrop=='function'){options.onDrop();}},stop:function(){$('body').removeClass('ui-drag-active');},update:function(event,ui){methods.toggleLoader();methods.updatePositions(options);}});}
if(typeof options.onFinish=='function'){options.onFinish();}},createMobileControls:function(options){var controls=panels.find('.panel-controls');var arr={};$.each(controls,function(i,e){var This=$(e);var ID=$(e).parents('.panel').attr('id');var controlW=This.width();var titleW=This.siblings('.panel-title').width();var headingW=This.parent('.panel-heading').width();var mobile=(controlW+ titleW);arr[ID]=mobile;});console.log(arr)
$.each(arr,function(i,e){var This=$('#'+ i);var headingW=This.width()- 75;var controls=This.find('.panel-controls');if(mobileSetting===true||headingW<e){This.addClass('mobile-controls');var options={html:true,placement:"left",content:function(e){var Content=$(this).clone();return Content;},template:'<div data-popover-id="'+i+'" class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}
controls.popover(options);}else{controls.removeClass('mobile-controls');}});$('.mobile-controls .panel-heading > .panel-controls').on('click',function(){$(this).toggleClass('panel-controls-open');});},applySettings:function(options){var obj=this;var localSettings=localStorage.getItem(settingsKey);var parseSettings=JSON.parse(localSettings);var panelColors="panel-primary panel-success panel-info panel-warning panel-danger panel-alert panel-system panel-dark panel-default";$.each(parseSettings,function(i,e){$.each(e,function(i,e){var panelID=e['id'];var panelTitle=e['title'];var panelCollapsed=e['collapsed'];var panelHidden=e['hidden'];var panelColor=e['color'];var Target=$('#'+ panelID);if(panelTitle){Target.children('.panel-heading').find('.panel-title').text(panelTitle);}
if(panelCollapsed===1){Target.addClass('panel-collapsed').children('.panel-body, .panel-menu, .panel-footer').hide();}
if(panelColor){Target.removeClass(panelColors).addClass(panelColor).attr('data-panel-color',panelColor);}
if(panelHidden===1){Target.addClass('panel-hidden').hide().remove();}});});},createControls:function(options){var panelControls='<span class="panel-controls"></span>';var panelTitle='<a href="#" class="panel-control-title"></a>';var panelColor='<a href="#" class="panel-control-color"></a>';var panelCollapse='<a href="#" class="panel-control-collapse"></a>';var panelFullscreen='<a href="#" class="panel-control-fullscreen"></a>';var panelRemove='<a href="#" class="panel-control-remove"></a>';var panelCallback='<a href="#" class="panel-control-callback"></a>';var panelDock='<a href="#" class="panel-control-dockable" data-toggle="popover" data-content="panelDockContent();"></a>';var panelExpose='<a href="#" class="panel-control-expose"></a>';var panelLoader='<a href="#" class="panel-control-loader"></a>';panels.each(function(i,e){var This=$(e);var panelHeader=This.children('.panel-heading');$(panelControls).appendTo(panelHeader);var title=This.attr('data-panel-title');var color=This.attr('data-panel-color');var collapse=This.attr('data-panel-collapse');var fullscreen=This.attr('data-panel-fullscreen');var remove=This.attr('data-panel-remove');var callback=This.attr('data-panel-callback');var paneldock=This.attr('data-panel-dockable');var expose=This.attr('data-panel-expose');var loader=This.attr('data-panel-loader');if(!loader){var panelMenu=panelHeader.find('.panel-controls');$(panelLoader).appendTo(panelMenu);}
if(expose){var panelMenu=panelHeader.find('.panel-controls');$(panelExpose).appendTo(panelMenu);}
if(paneldock){var panelMenu=panelHeader.find('.panel-controls');$(panelDock).appendTo(panelMenu);}
if(callback){var panelMenu=panelHeader.find('.panel-controls');$(panelCallback).appendTo(panelMenu);}
if(!remove){var panelMenu=panelHeader.find('.panel-controls');$(panelRemove).appendTo(panelMenu);}
if(!title){var panelMenu=panelHeader.find('.panel-controls');$(panelTitle).appendTo(panelMenu);}
if(!color){var panelMenu=panelHeader.find('.panel-controls');$(panelColor).appendTo(panelMenu);}
if(!collapse){var panelMenu=panelHeader.find('.panel-controls');$(panelCollapse).appendTo(panelMenu);}
if(!fullscreen){var panelMenu=panelHeader.find('.panel-controls');$(panelFullscreen).appendTo(panelMenu);}});},controlHandlers:function(e){var This=$(this);var action=This.attr('class');var panel=This.parents('.panel');var panelHeading=panel.children('.panel-heading');var panelTitle=panel.find('.panel-title');var panelEditTitle=function(){var toggleBox=function(){var panelEditBox=panel.find('.panel-editbox');panelEditBox.slideToggle('fast',function(){panel.toggleClass('panel-editbox-open');if(!panel.hasClass('panel-editbox-open')){panelTitle.text(panelEditBox.children('input').val());methods.updateSettings(options);}});};if(!panel.find('.panel-editbox').length){var editBox='<div class="panel-editbox"><input type="text" class="form-control" value="'+ panelTitle.text()+'"></div>';panelHeading.after(editBox);var panelEditBox=panel.find('.panel-editbox');panelEditBox.children('input').on('keyup',function(){panelTitle.text(panelEditBox.children('input').val());});panelEditBox.children('input').on('keypress',function(e){if(e.which==13){toggleBox();}});toggleBox();}else{toggleBox();}};var panelColor=function(){if(!panel.find('.panel-colorbox').length){var colorBox='<div class="panel-colorbox"> <span class="bg-white" data-panel-color="panel-default"></span> <span class="bg-primary" data-panel-color="panel-primary"></span> <span class="bg-info" data-panel-color="panel-info"></span> <span class="bg-success" data-panel-color="panel-success"></span> <span class="bg-warning" data-panel-color="panel-warning"></span> <span class="bg-danger" data-panel-color="panel-danger"></span> <span class="bg-alert" data-panel-color="panel-alert"></span> <span class="bg-system" data-panel-color="panel-system"></span> <span class="bg-dark" data-panel-color="panel-dark"></span> </div>'
panelHeading.after(colorBox);}
var panelColorBox=panel.find('.panel-colorbox');panelColorBox.on('click','> span',function(e){var dataColor=$(this).data('panel-color');var altColors='panel-primary panel-info panel-success panel-warning panel-danger panel-alert panel-system panel-dark panel-default panel-white';panel.removeClass(altColors).addClass(dataColor).data('panel-color',dataColor)
methods.updateSettings(options);});panelColorBox.slideToggle('fast',function(){panel.toggleClass('panel-colorbox-open');});};var panelCollapse=function(){panel.toggleClass('panel-collapsed');panel.children('.panel-body, .panel-menu, .panel-footer').slideToggle('fast',function(){methods.updateSettings(options);});};var panelFullscreen=function(){if($('body.panel-fullscreen-active').length){$('body').removeClass('panel-fullscreen-active');panel.removeClass('panel-fullscreen');if(dragSetting===true){plugin.sortable("enable");}}
else{$('body').addClass('panel-fullscreen-active');panel.addClass('panel-fullscreen');if(dragSetting===true){plugin.sortable("disable");}}
$('.panel-controls').removeClass('panel-controls-open');$('.popover').popover('hide');setTimeout(function(){$(window).trigger('resize');},100);};var panelRemove=function(){if(PNotify){(new PNotify({addclass:'admin-panel-note',animate_speed:'fast',title:'Are you sure?',hide:false,type:'info',addclass:"mt50",buttons:{closer:false,sticker:false},confirm:{confirm:true,buttons:[{text:"Yup, Do it.",addClass:"btn-sm btn-primary light mt10",},{text:"Cancel",addClass:"btn-sm btn-primary mt10",}],},history:{history:false}})).get().on('pnotify.confirm',function(){panel.addClass('panel-removed').hide();methods.updateSettings(options);}).on('pnotify.cancel',function(){return;});}else if(bootbox.confirm){bootbox.confirm("Are You Sure?!",function(e){if(e){setTimeout(function(){panel.addClass('panel-removed').hide();methods.updateSettings(options);},200);}});}else{panel.addClass('panel-removed').hide();methods.updateSettings(options);}};var panelCallback=function(){if(typeof options.onPanel=='function'){options.onPanel();}};var panelExpose=function(){};if($(this).hasClass('panel-control-collapse')){panelCollapse();}
if($(this).hasClass('panel-control-title')){panelEditTitle();}
if($(this).hasClass('panel-control-color')){panelColor();}
if($(this).hasClass('panel-control-fullscreen')){panelFullscreen();}
if($(this).hasClass('panel-control-remove')){panelRemove();}
if($(this).hasClass('panel-control-callback')){panelCallback();}
if($(this).hasClass('panel-control-expose')){panelExpose();}
if($(this).hasClass('panel-control-dockable')){return}
if($(this).hasClass('panel-control-loader')){return;}
methods.toggleLoader.call(this);},toggleLoader:function(options){var This=$(this);var panel=This.parents('.panel');panel.addClass('panel-loader-active');setTimeout(function(){panel.removeClass('panel-loader-active');},650);},modifySettings:function(options){var settingsArr=[];panels.each(function(i,e){var This=$(e);var panelObj={};var panelID=This.attr('id');var panelTitle=This.children('.panel-heading').find('.panel-title').text();var panelCollapsed=(This.hasClass('panel-collapsed')?1:0);var panelHidden=(This.is(':hidden')?1:0);var panelColor=This.data('panel-color');panelObj['id']=This.attr('id');panelObj['title']=This.children('.panel-heading').find('.panel-title').text();panelObj['collapsed']=(This.hasClass('panel-collapsed')?1:0);panelObj['hidden']=(This.is(':hidden')?1:0);panelObj['color']=(panelColor?panelColor:null);settingsArr.push({'panel':panelObj});});var checkedSettings=JSON.stringify(settingsArr);return checkedSettings;},findPositions:function(options){var grids=plugin.find(pluginGrid);var gridsArr=[];grids.each(function(index,ele){var panels=$(ele).find('.panel');var panelArr=[];$(ele).attr('id','grid-'+ index);panels.each(function(i,e){var panelID=$(e).attr('id');panelArr.push(panelID);});gridsArr[index]=panelArr;});var checkedPosition=JSON.stringify(gridsArr);return checkedPosition;},setPositions:function(options){var obj=this;var localPositions=localStorage.getItem(positionsKey);var parsePosition=JSON.parse(localPositions);$(pluginGrid).each(function(i,e){var rowID=$(e)
$.each(parsePosition[i],function(i,ele){$('#'+ ele).appendTo(rowID);});});},updatePositions:function(options){localStorage.setItem(positionsKey,methods.findPositions());if(typeof options.onSave=='function'){options.onSave();}},updateSettings:function(options){localStorage.setItem(settingsKey,methods.modifySettings());if(typeof options.onSave=='function'){options.onSave();}}}
return this.each(function(){methods.init.call(plugin,options);});};})(jQuery,window,document);