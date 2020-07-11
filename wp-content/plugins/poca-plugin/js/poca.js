jQuery(document).ready(function($){
    var post_per_page = 2;
    var category = '';

        function ajax_cat_call(){
            $.ajax({
                url: poca_ajax_obj.ajax_url,
                method : 'post',
                data :        
                {
                    'action' : 'poca_request',
                    'post_per_page' : post_per_page,
                    'nonce' : poca_ajax_obj.ajax_nonce,
                    'category' : category,
                },    
                success: function( data ) {
                    $('#poca-portfolio').html(data);
                },    
                error : function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }
        //JS for filter categories
        $(document).on('click', '.portfolio-menu button',function(){      
            //alert('hello world');
            post_per_page = 2
            category=$(this).data('filter');
            ajax_cat_call();
        });
        
        // JS for load-more
        $(document).on('click', '#load',function(){   
            category = $('.portfolio-menu .active').data('filter');   
            //alert('hello world');
            post_per_page +=2;
            ajax_cat_call();           
           
        });
});