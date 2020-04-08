$(document).ready(function(){
    
    $("div[class^='span']").find(".row-form:first").css('border-top', '0px');
    $("div[class^='span']").find(".row-form:last").css('border-bottom', '0px');     
    var myVar3 = setInterval(function(){totalnonvuchatajax()}, 1000);       
    
    // collapsing widgets
    
        $(".toggle a").click(function(){
            
            var box = $(this).parents('[class^=head]').parent('div[class^=span]').find('div[class^=block]');
            
            if(box.length == 1){
                
                if(box.is(':visible')){        
                    
                    if(box.attr('data-cookie'))                    
                        $.cookies.set(box.attr('data-cookie'),'hidden');
                                        
                    $(this).parent('li').addClass('active');
                    box.slideUp(100);
                    
                }else{
                    
                    if(box.attr('data-cookie'))                    
                        $.cookies.set(box.attr('data-cookie'),'visible');
                                        
                    $(this).parent('li').removeClass('active');
                    box.slideDown(200);
                    
                }
            }
            
            return false;
        });
    
    // collapsing widgets
    
    // setting for list with button <<more>>
        
    var cList = 5; // count list items
    
    
    $(".withList").each(function(){

        if($(this).find('.list li').length > cList){
        
            $(this).find('.list li').hide().filter(':lt('+cList+')').show();
        
            $(this).append('<div class="footer"><button type="button" class="btn btn-small more">show more...</button></div>');
                        
        }
        
        if($(this).hasClass('scrollBox'))
                $(this).find('.scroll').mCustomScrollbar("update");
    });
    
    
    $(".more").live('click',function(){
        
        if(!$(this).hasClass('disabled')){
        
            cList = cList+5;

            var wl = $(this).parents('.withList');
            var list = wl.find('.list li');

            list.filter(':lt('+cList+')').show();

            if(list.length < cList) $(this).addClass('disabled');


            if($(wl).hasClass('scrollBox'))
                $(wl).find('.scroll').mCustomScrollbar("update");

        }
    });    
    // eof setting for list with button <<more>>
    
    
    
    $(".header_menu .list_icon").click(function(){
        
        var menu = $("body .wrapper .menu");
            
        if(menu.is(":visible")){
            menu.fadeOut(200);
            $("body > .modal-backdrop").remove();
        }else{
            menu.fadeIn(300);
            $("body").append("<div class='modal-backdrop fade in'></div>");
        }
        
        return false;
    });
    
    if($(".adminControl").hasClass('active')){
        $('.admin').fadeIn(300);
    }
    
    
    $(".adminControl").click(function(){
        
        if($(this).hasClass('active')){
            
            $.cookies.set('b_Admin_visibility','hidden');
            
            $('.admin').fadeOut(200);
            
            $(this).removeClass('active');
            
        }else{
            
            $.cookies.set('b_Admin_visibility','visible');
            
            $('.admin').fadeIn(300);
            
            $(this).addClass('active');
        }
        
    });
    
    
    $(".navigation .openable > a").click(function(){
        var par = $(this).parent('.openable');
        var sub = par.find("ul");

        if(sub.is(':visible')){
            par.find('.popup').hide();
            par.removeClass('active');            
        }else{
            par.addClass('active');            
        }
        
        return false;
    });
    
    $(".jbtn").button();
    
    $(".alert").click(function(){
        $(this).fadeOut(300, function(){            
                $(this).remove();            
        });
    });
    
    $(".buttons li > a").click(function(){
        
        var parent   = $(this).parent();
        
        if(parent.find(".dd-list").length > 0){
        
            var dropdown = parent.find(".dd-list");

            if(dropdown.is(":visible")){
                dropdown.hide();
                parent.removeClass('active');
            }else{
                dropdown.show();
                parent.addClass('active');
            }

            return false;
            
        }
        
    });


    $("#menuDatepicker").datepicker();
    
    
    $(".link_navPopMessages").click(function(){
        if($("#navPopMessages").is(":visible")){
            $("#navPopMessages").fadeOut(200);
        }else{
            $("#navPopMessages").fadeIn(300);
        }
        return false;
    });
    
    $(".link_bcPopupList").click(function(){
        if($("#bcPopupList").is(":visible")){
            $("#bcPopupList").fadeOut(200);
        }else{
            $("#bcPopupList").fadeIn(300);
        }
        return false;
    });    
    
    $(".link_bcPopupSearch").click(function(){
        if($("#bcPopupSearch").is(":visible")){
            $("#bcPopupSearch").fadeOut(200);
        }else{
            $("#bcPopupSearch").fadeIn(300);
        }
        return false;
    });        
    
    $("input[name=checkall]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('.checker span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('.checker span').addClass('checked').find('input[type=checkbox]').attr('checked',true);
            
    });    
    
    
    $(".fancybox").fancybox();

});

$(window).load(function(){
    gallery();
    thumbs();
    headInfo();    
});
$(window).resize(function(){
    headInfo();    
    
    if($("body").width() > 980){        
        $("body .wrapper .menu").show();            
        $("body > .modal-backdrop").remove();
    }else{
        $("body .wrapper .menu").hide();
        $("body > .modal-backdrop").remove();
    }    
    
});


$('.wrapper').resize(function(){
    
    if($("body > .content").css('margin-left') == '220px'){
        if($("body > .menu").is(':hidden'))
            $("body > .menu").show();
    }
    
    gallery();
    thumbs();
    headInfo();
});

function headInfo(){
    var block = $(".headInfo .input-append");
    var input = block.find("input[type=text]");
    var button = block.find("button");
    
    input.width(block.width()-button.width()-44);    
}

function thumbs(){
    
    $(".thumbs").each(function(){        
        
        var maxImgHeight = 0;
        var maxTextHeight = 0;    
        
        $(this).find(".thumbnail").each(function(){
            var imgHeight = $(this).find('a > img').height();
            var textHeight = $(this).find('.caption').height();
            
            maxImgHeight = maxImgHeight < imgHeight ? imgHeight : maxImgHeight;
            maxTextHeight = maxTextHeight < textHeight ? textHeight : maxTextHeight;
        });
        
        $(this).find('.thumbnail > a').height(maxImgHeight);
        $(this).find('.thumbnail .caption').height(maxTextHeight);
    });
    

    
    var w_block = $(".thumbs").width()-20;
    var w_item  = $(".thumbs .thumbnail").width()+10;
    
    var c_items = Math.floor(w_block/w_item);
    
    var m_items = Math.floor( (w_block-w_item*c_items)/(c_items*2) );
    
    $(".thumbs .thumbnail").css('margin',m_items);

}

function gallery(){   

    var w_block = $(".gallery").width()-20;
    var w_item  = $(".gallery a").width();
    
    var c_items = Math.floor(w_block/w_item);
    
    var m_items = Math.round( (w_block-w_item*c_items)/(c_items*2) );    
    
    $(".gallery a").css('margin',m_items);
}

function loginBlock(block){
    
    $(".loginBlock:visible").animate({
        top: '200px',
        opacity: 0
    },'200','linear',function(){
        $(this).css('top','0px').css('display','none');
    });    
    $(block).css({opacity: 0, display: 'block',top: '0px'});    
    $(block).find('.checker').show();
    $(block).animate({opacity: 1, top: '100px'},'200');
}


function checkclass(ID){
    $('.checkclass').parents('span').removeClass('checked');
    $(ID).parents('span').addClass('checked');
    $(ID).parents('span').attr('val',$(ID).val());
}



function ouvre_popup(page,w,h,fullscren)
{
   if(parseInt(fullscren)>0){
     w=screen.width;
     h=screen.height;
   var fen=window.open(page, "",
                "width="+w+",height="+h+",location=0,resizable=0,menubar=0,scrollbars=0,left=0" +
                 ",top=0");
   }else{
     var fen=window.open(page, "",
                "width="+w+",height="+h+",location=0,resizable=0,menubar=0,scrollbars=0,left=" +
                ((screen.width - w)/2) + ",top=" + ((screen.height - h)/2));
   
   }
                
   //fen.resizeTo(w,h);
}




function openwindowsk(page,w,h,fullScreen) {
                                var width = w;
                                var height = h;
                                if(!fullScreen){
                                    if(window.innerWidth)
                                    {
                                            var left = (screen.width -w)/2;
                                            var top = (screen.height -h)/2;
                                            //alert(top)
                                    }
                                    else
                                    {
                                            var left = (document.body.clientWidth-w)/2;
                                            var top = (document.body.clientHeight-h)/2;
                                            //alert(left)
                                    }  
                                }
                                else{
                                    w=screen.width;
                                    h=screen.height;
                                }
                                
                                
                                //alert(w)
                                window.showModalDialog(page,'page','menubar=no; scrollbars=yes; dialogTop='+top+'; dialogLeft='+left+'; dialogWidth='+w+'; dialogHeight='+h+'');
                                //showModalDialog(page, "", " dialogWidth="+width+"; dialogHeight="+height+"");
}


function openwindows(page,w,h,fullScreen) {
    if(fullScreen){
        w=screen.width-10;
        h=screen.height-10;
        
    }
    //alert(page)
    $.fancybox({
        				'autoScale'			: true,
                        'modal'			    : true,
                        'href'              :page,
                        'width'             : w,
		                'height'            : h,
                        'overlayOpacity'     : 0.2,
        				'transitionIn'		: 'none',
        				'transitionOut'		: 'none',
        				'type'				: 'iframe'
			      });
}

function closewindows()
{
    //parent.jQuery.fancybox.close();
    //self.parent.location.reload();
    //opener.location.reload();
    
    //self.close();
   self.parent.location.reload();
   //TINY.box.hide();
}

function closewindowscompose()
{
    //parent.jQuery.fancybox.close();
    //self.parent.location.reload();
    //opener.location.reload();
    
    //self.close();
    
  self.parent.location.href='index.php?page=pagenote&display=sent';
   //TINY.box.hide();
}


function closewindows2(page,display)
{
    //parent.jQuery.fancybox.close();
    //self.parent.location.reload();
    //opener.location.reload();
    
    //self.close();
    
  self.parent.location.href='index.php?page='+page+'&display='+display;
   //TINY.box.hide();
}


function openEdit(page,w,h,fullScreen){
    if($('.checkclass').parents('span.checked').length>0){
        var mod=$('.checkclass').parents('span.checked').attr('val');
        var lien='?mod='+mod;
        if(page.indexOf('?')>-1) lien='&mod='+mod;
        page=page+lien;
        openwindows(page,w,h,fullScreen);
    }else{
        alert('Aucun element a ete choisi? Veuillez selectionner un element')
    }
}
function openDelete(page){
    if($('.checkclass').parents('span.checked').length>0){
        if(confirm('voulez-vous vraiment supprimer ce element?')){
            var supp=$('.checkclass').parents('span.checked').attr('val');
            var lien='?supp='+supp;
            if(page.indexOf('?')>-1) lien='&supp='+supp;
            page=page+lien;
            document.location.href=page;
        }
   }else{
        alert('Aucun element a ete choisi? Veuillez selectionner un element')
    } 
}


function totalnonvuchatajax(){
        var thisid=$('#chatnonvu').attr('user-data');
        var thisobject=$('#chatnonvu');
        $.ajax({
         type:"POST",
         data:'from='+thisid,
         url:"chat/chatscript.php?action=totalnonvuchatajax",
          success:function(data){
            //alert(data)
            if(parseInt(data)>0){
              thisobject.html(data)
            }else{thisobject.html(data)}
         },
        error:function(data){
         },
     })
    
}


function envoie_sms(){
        if($("#message").val()!=""){
                $.ajax({
                type: 'POST',
                url: 'smspage_action.php?action=envoie',
                data: $('#myForm').serialize(),
                dataType:'json',
                beforeSend:function(){
                    
                  },
                success: function( resp ) {
                    alert(resp.msgId);
                    
                   
                }
              }).fail(function(jqXHR, textStatus) {
                      alert('Message non envoy\u00e9')
                      
                  });     
            
        }
        else{
            alert("Tous les champs doivent etre saisis")
        }
        
      //return false;
    }
-->