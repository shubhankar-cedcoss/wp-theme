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