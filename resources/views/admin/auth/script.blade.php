<script>
// login form
    $('form#form_login').on('submit', function (e) {
        if($('#form_login #email').val() != '' && $('#form_login #password').val() != ''){
            e.preventDefault();
        var url = $('form#form_login').attr('action'); // api login route

        // get access token from login api
        var a1 = $.ajax({
            method: 'post',
            url: url,
            dataType: 'json',
            data: $("#form_login").serialize(), // Serialized Data,
            }),
            // success get access token to save it in cookie
        a2 = a1.then(function(data) {
                // .then() returns a new promise
                console.log(data);
                return $.ajax({
                    method: 'post',
                    url: '/admincp/login',
                    dataType: 'json',
                    data: {
                        remember_me: $('#form_login #remember').is(':checked'),
                        'access_token' : data.response.access_token.token,
                        'admin' : data.response.access_token.admin,
                        "_token": "{{ csrf_token() }}"
                    }
                });
        });

        a2.done(function(data) {
            // access token saved in cookie then go to admin panel successfully
            window.location.href = "/admincp/dashboard";
        });
        a2.fail(function(jqXHR, textStatus, errorThrown) {
            // If fail
            console.log(jqXHR, textStatus + ': ' + errorThrown);
            $('#alert_login_error').remove();
            $('#form_login').prepend(
                `
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" id="alert_login_error" role="alert">			
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
                    <span>${textStatus + ': ' + jqXHR.responseJSON.error.message}.</span>		
                </div>
                `
            );
        });
        }

        
    });

    // reset password form
    $('form#password_reset_form').on('submit', function (e) {
        if($('#password_reset_form #email').val() != ''){
            e.preventDefault();
        var url = $('form#password_reset_form').attr('action'); // api login route

        // get access token from login api
        var a1 = $.ajax({
            method: 'post',
            url: url,
            dataType: 'json',
            data: $("#password_reset_form").serialize(), // Serialized Data,
            });
        
        a1.done(function(data) {
            // access token saved in cookie then go to admin panel successfully
            $('#alert_password_success').remove();
            $('#alert_password_error').remove();
            $('#password_reset_form').prepend(
                `
                <div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" id="alert_password_success" role="alert">			
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
                    <span>mail send successfully,please check your mail to reset password.</span>		
                </div>
                `
                ); 
            
            setTimeout(function () {
                window.location.href = "/admincp/password/update"; 
            }, 5000);
        
        });
        a1.fail(function(jqXHR, textStatus, errorThrown) {
            // If fail
            // console.log(textStatus + ': ' + errorThrown);
            $('#alert_password_error').remove();
            $('#password_reset_form').prepend(
                `
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" id="alert_password_error" role="alert">			
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
                    <span>${textStatus + ': ' + errorThrown}</span>		
                </div>
                `
            );
        });
        }

        
    });

    // reset password form
    $('form#update_password_form').on('submit', function (e) {
        if($('#update_password_form #email').val() != ''){
            e.preventDefault();
        var url = $('form#update_password_form').attr('action'); 

        // get access token from login api
        var a1 = $.ajax({
            method: 'post',
            url: url,
            dataType: 'json',
            data: $("#update_password_form").serialize(), // Serialized Data,
            });
        
        a1.done(function(data) {
            // access token saved in cookie then go to admin panel successfully
            $('#alert_password_success').remove();
            $('#alert_password_error').remove();
            $('#update_password_form').prepend(
                `
                <div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" id="alert_password_success" role="alert">			
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
                    <span>Password Updated Successfully!</span>		
                </div>
                `
                ); 
            
            setTimeout(function () {
                window.location.href = "/admincp/login"; 
            }, 5000);
        
        });
        a1.fail(function(jqXHR, textStatus, errorThrown) {
            // console.log(jqXHR.responseJSON.errors);
            // If fail
            // console.log(textStatus + ': ' + errorThrown);
            $('#alert_password_error').remove();
            $('#update_password_form').prepend(
                `
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" id="alert_password_error" role="alert">			
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
                    <span>${textStatus + ': ' + jqXHR.responseJSON.errors}</span>		
                </div>
                `
            );
        });
        }

        
    });

</script>