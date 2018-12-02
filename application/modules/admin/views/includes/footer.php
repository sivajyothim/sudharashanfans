<div class="content-footer white " id="content-footer">
    <div class="d-flex p-3">
        <span class="text-sm text-muted flex">&copy; Copyright. Berelabs</span>
        <div class="text-sm text-muted">v</div>
    </div>
</div>
<script src="<?php echo LIBS_PATH; ?>jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$('.multi_select').click(function () { if ($('.multi_select').is(':checked')) { $('.multi_select').prop('checked', true);  $('[name="multiple[]"]').prop('checked', true);  } else {  $('.multi_select').prop('checked', false); $('[name="multiple[]"]').prop('checked', false);   }  });
function activateData(s,t){updateStatus(s,t);}
function deActivateData(s,t){updateStatus(s,t);}
function updateStatus(s,t)
{
    var data_array=new Array();
    $('input[name="multiple[]"]:checked').each(function(){data_array.push($(this).val());});
    var checklist=""+data_array;
    if(!isNaN(s) && (s=='1' || s=='0' || s=='5') && checklist!='')
    {
        
        $('.statusActivate,.statusDeActivate,.statusDisable').prop('disabled',true);
         $.ajax({
             dataType:'JSON',
             method:'POST',
             data:JSON.stringify({'table':t,'status':s,'inputdata':checklist}),
             url:'<?php echo ADMIN_LINK;?>Welcome/dataActivationStatus',
             success:function(w){
                 console.log(w);
                    switch(w.code)
                    {
                        case 200:
                            var dispmsg=w.description;
                            if(t=='order')
                            {
                             dispmsg='Orders delivered successfully';
                            }
                            $('.display_message_class').html(dispmsg).addClass('alert alert-success');
                            setTimeout(function(){window.location=location.href;},5000);
                            break;
                        case 204:
                        case 301:
                        case 422:
                        case 575:
                         $('.display_message_class').html(w.description).addClass('alert alert-danger');
                         setTimeout(function(){$('.display_message_class').html('').removeClass('alert alert-warning');},5000);
                            break;
                    }
                 
             },
              error:function(e){console.log(e);$('.display_message_class').html(e).addClass('alert alert-warning');}
         });
    }
    else
      {
            $('.display_message_class').html('* Please choose atleast one checkbox').addClass('alert alert-warning');
            setTimeout(function(){$('.display_message_class').html('').removeClass('alert alert-warning');},5000);
       }
}
</script>