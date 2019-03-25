$(document).ready(function() { 
   $('select#assigned_to').on('change', function() {
     var user_id = ($(this).val());
     var updated_user_id = $('#user_id').val(user_id);
          // alert(user_id);
   });
    $('#teamlead').click(function() { 
        $.blockUI({ 
            message: $('div#change_teamLead'), 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: null, 
            showOverlay: true, 
            onOverlayClick: $.unblockUI,
            centerY: false,
            css: { 
                width: '700px', 
                height: 'auto',
                top: '50px', 
                left: '', 
                right: '20%', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'white', 
                borderRadius: '50%',
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: 1, 
                color: '#fff' 
            } 
        }); 
    });
    
function loadingGif(){
 
      $.blockUI({ 
                  message: $('div#throbber'),
                  timeout: 7000,
                  fadeIn: 700,
                  fadeOut:700,
                  css: {
                    position: 'absolute',
                    opacity:1,
                    top:  ($(window).height() - 200) /2 + 'px', 
                    left: ($(window).width() - 100) /2 + 'px', 
                    width: '100px',  
                    top: 0,
                    bottom: 0, 
                    left:120, 
                    right:0,
                    margin:'auto',
                    border:'no-border',
                    height:'95px',
                    backgroundColor:'white',
                    display:'block',
                  }
              });
    }


// var growlUI = $(() => $.blockUI({ 
//             message: $('div.growlUI'), 
//             fadeIn: 700, 
//             fadeOut: 700, 
//             timeout: 2000, 
//             showOverlay: false, 
//             centerY: false, 
//             css: { 
//                 width: '350px', 
//                 top: '10px', 
//                 left: '', 
//                 right: '10px', 
//                 border: 'none', 
//                 padding: '5px', 
//                 backgroundColor: '#000', 
//                 '-webkit-border-radius': '10px', 
//                 '-moz-border-radius': '10px', 
//                 opacity: .6, 
//                 color: '#fff' 
//             } 
//         }) 
// )

$('button#save').on('click',function () {
   loadingGif();
      setTimeout( function(){
         $.unblockUI({
            onUnblock: () => $.growlUI('<div><i class="icon-check"></i>'+ ' <small>Your Update was Successful</small>'+'</div>') 
             });
           }, 7000);

      $('form').on('submit', function (e) {
         e.preventDefault();
             $.ajax({
               type: 'post',
               cache:false,
               async: false,
              //  contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
               url: `{!! route('projects.project.update', [$project->id]) !!}`,
               data: $('form').serialize(),
              // data: jQuery.param({ 
              //   assigned_to: $('#assigned_to').val(),
              //   user_id: $('#user_id').val(),
              // }),
               success: function (data) {
                   // $.unblockUI(data);
                 },
              // error: (error) => alert('error')
              });
           });
      });

    $('#cancel').click(function() { 
        $.unblockUI(); 
          return false; 
        });
}); 
