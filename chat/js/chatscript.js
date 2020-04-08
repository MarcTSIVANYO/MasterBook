var windowFocus = true;
var originalTitle='heloo';
var changetitleval=0;
$(function() {
    //alert('kjkjkjk')
    originalTitle = document.title;
    $([window, document]).blur(function(){
		windowFocus = false;
        //alert('ffdfff')
	}).focus(function(){
		windowFocus = true;
		document.title = originalTitle;
	});
    
    
    var myVar1 = setInterval(function(){userconnecte()}, 5000);
    var myVar = setInterval(function(){appendchatbody()}, 1000);
    var myVar2 = setInterval(function(){beatchat()}, 1000);
    var myVar3 = setInterval(function(){nonvuchatajax()}, 1000);
    
 
    //var myVar4 = setTimeout(function(){changetitlefunction(changetitleval);},1000);
    
    $("#champlist").scrollTop($("#champlist")[0].scrollHeight);

    $("#audioalert").get(0).volume=100;
    
   $('#chat_user_list').liveFilter('#input-filter', 'li', {
        filterChildSelector: 'a'
      });
})
function appendchatbody(){
 $.ajax({
         type:"POST",
         url:"chatscript.php?action=appendchatbody",
         success:function(data){
            $('#chatbody').append(data);
            if(data!=''){
               //$("#champlist").scrollTop($("#champlist")[0].scrollHeight);
            } 
        },
         error:function(data){
            $('#chatbody').append(data)
         },
    })

}
function insertchat(){
    $.ajax({
         type:"POST",
         data:'message='+$('#composerMessage').val(),
         url:"chatscript.php?action=insertchat",
         success:function(data){
             $('#composerMessage').val('');
         },
        error:function(data){
         },
     })
    
}

function keydowntextarea(event){
    if(event.keyCode == 13 && event.shiftKey == 0){
      insertchat();  
    }
}

function beatchat(){
    $.ajax({
         type:"POST",
         url:"chatscript.php?action=beatchat",
          success:function(data){
            if(parseInt(data)>0) $("#audioalert").trigger('play');
            //alert(data)
         },
        error:function(data){
         },
     })
    
}



function userconnecte1(){
   $.ajax({
         type:"POST",
         url:"chatscript.php?action=userconnecte",
          success:function(data){
            //if(parseInt(data)>0) $("#audioalert").trigger('play');
            $('.userconnecte').html(data);
            //alert(data)
         },
        error:function(data){
         },
     })
}


function userconnecte(){
   $('.connecte').each(function(){
    //alert($(this).attr('user-data'))
    var thisobjet=$(this)
          $.ajax({
             type:"POST",
             url:"chatscript.php?action=userconnecte&id_pers="+thisobjet.attr('user-data'),
              success:function(data){
                if(parseInt(data)>0){
                    thisobjet.show();
                } else{
                    thisobjet.hide();
                }
             },
            error:function(data){
             },
         })
   })
}



function nonvuchatajax(){
    $('.userliste').each(function(){
        var thisid=$(this).attr('user-data');
        var thisobject=$(this).find('.bg');
        $.ajax({
         type:"POST",
         data:'from='+thisid,
         url:"chatscript.php?action=nonvuchatajax",
          success:function(data){
            if(parseInt(data)>0){
              thisobject.html('').append('<span  class="badge msg">'+data+'</span>')  
              if(windowFocus == false){
                      document.title='Vous avez recu un msg'  
                }else{
                document.title== originalTitle;
              }
            }else{thisobject.html('')}
         },
        error:function(data){
         },
     })
    })
}


function changetitlefunction(kount){
    //alert(kount)
    $.ajax({
         type:"POST",
         url:"chatscript.php?action=meschatnonvu",
         success:function(data){
             if(parseInt(data)>0){
                //alert(kount)
                if(windowFocus == false){
                      document.title='Vous avez recu un msg'  
                }else{
                document.title== originalTitle;
              }
             }
         },
        error:function(data){
         },
     })
    
}



function voirchat(from){
    $.ajax({
         type:"POST",
         data:'from='+from,
         url:"chatscript.php?action=voirchat",
         success:function(data){
             
         },
        error:function(data){
         },
     })
    
}