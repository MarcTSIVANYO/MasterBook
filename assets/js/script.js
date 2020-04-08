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
function openwindowstiny(page,w,h,fullScreen) {
    if(fullScreen){
        w=screen.width-10;
        h=screen.height-10;
        
    }
    TINY.box.show({
                     iframe:page,
                     boxid:'frameless',
                     width:w,
                     height:h,
                     fixed:true,
                     maskid:'bluemask',
                     maskopacity:40,
                     closejs:function(){}
                   })
}

function openwindows(page,w,h,fullScreen) {
    if(fullScreen){
        w=screen.width-10;
        h=screen.height-10;
        
    }
    jQuery.fancybox({
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



function ouvre_popup(page,w,h)
{
    window.open(page, "",
                "width="+w+",height="+h+",menubar=no,scrollbars=0,left=" +
                ((screen.width - w)/2) + ",top=" + ((screen.height - h)/2));
}
function closewindows()
{
    //parent.jQuery.fancybox.close();
    self.parent.location.reload();
    
    //self.close();
   //self.parent.location.reload();
   //TINY.box.hide();
}


function validform(){
    var errorform=0;
    $("input[saisie]").each(function(){
        if($(this).val()==""){
           errorform++;
        }
    })
    if(errorform > 0){
            alert('Tous les champs (*) sont obligatoires')
            return false; 
        }else{
             return true;
        }
}


function nonvuchatajax(){
    //alert('ggggg')
    //alert(kount)
    jQuery.ajax({
         type:"GET",
         url:"ajax.php?action=nonvuchatajax",
         success:function(data){
             if(parseInt(data)>0){
                jQuery('#bgmsg').text(data);
                //jQuery('#tooltipmsg').attr('title',data+' nouveau(x) nmessage(s)')
                
                //alert(data)
              }else{
                //jQuery('#bgmsg').text(data)
              }
              //alert(data)
             },
        error:function(data){}
     })  
}



function previewimage(no) {
   //alert(document.getElementById("uploadpreview"+no).src)
   var oFReader = new FileReader();
            //alert(document.getElementById("uploadpreview"+no).src);
            oFReader.readAsDataURL(document.getElementById("uploadimage"+no).files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadpreview"+no).src = oFREvent.target.result;
                
            };
            
}

