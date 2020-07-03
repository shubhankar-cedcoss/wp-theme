jQuery(document).ready(function($) {       //wrapper
    $(".pref").change(function() {         //event
        alert('Congratulations!! Your JQuery is wokring');
        var this2 = this;                  //use in callback
        $.post(my_ajax_obj.ajax_url, {     //POST request
           _ajax_nonce: my_ajax_obj.nonce, //nonce
            action: "my_tag_count",        //action
            title: this.value              //data
        }, function(data) {                //callback
            this2.nextSibling.remove();    //remove the current title
            $(this2).after(data);          //insert server response
        });
    });
});

jQuery(document).ready(function($){
    $('#form_submit').on('click',function(){
        //alert('hello world');
        $name = $('#first_name').val();
        //alert($name);
        $email = $('#email').val();
        //alert($email);
        $subject = $('#subject').val();
        //alert($subject);

        $.ajax({
            url : my_ajax_obj.ajax_url,

            method : 'POST',

            data :        
            {
                'name' : $name,
                'email' : $email,
                'subject' : $subject,
                'action' : 'my_form',
            },

            success : function(data){
                console.log(data);
            },
            error : function(errorThrown){
                console.error(errorThrown);
            }
        });
    });
});
	