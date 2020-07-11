jQuery(document).ready(function($){
    var page = 1;
    $('#load').on('click',function(){      
        //alert('hello world');
        page++;
        $.ajax({
            url: poca_ajax_obj.ajax_url,
            method : 'post',
            data :        
            {
                'action' : 'poca_request',
                'post_per_page' : 2,
                'page' : page,
                'nonce' : poca_ajax_obj.ajax_nonce,
            },

            success: function( data ) {
                $('#poca-portfolio').append(data);
            },

            error : function(errorThrown){
                console.log(errorThrown);
            }
        });
    });
});