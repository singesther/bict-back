<script src="/frontend/assets/js/jquery.min.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<!-- <script src="/frontend/assets/js/jquery.nav.js"></script> -->
<script src="/frontend/assets/js/wow.min.js"></script>
<script src="/frontend/assets/js/jquery.localScroll.min.js"></script>
<script src="/frontend/assets/js/owl.carousel.js"></script>
<!-- <script src="/frontend/assets/js/plyr.js"></script> -->
<script src="/frontend/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="/frontend/assets/js/jquery.stellar.min.js"></script>
<!-- <script src="js/map.js"></script> -->
<!-- <script src="/frontend/js/custom.js"></script> -->
<!-- Register modal -->
<script type="text/javascript">
    $(document).ready(function() {
        if ($("#banner").length) {
            $('a[href*=\\#]').on('click', function(e){
                e.preventDefault();
                $('html, body').animate({
                    scrollTop : $(this.hash).offset().top
                }, 1000);
            });
        }
    });
</script>
<script>
    // Get the modal
    var register_modal = document.getElementById('register-link');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == register_modal) {
            register_modal.style.display = "none";
        }
    }
</script>

<!-- Login modal -->
<script>
    // Get the modal
    var modal = document.getElementById('login-link');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script type="text/javascript">
$(document).ready(function() {
    $(".send-btn").click(function() {
        $.ajax({
            type: "POST", //for creating new resource
            url: '{{URL::to('/maillist')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                email: $('.email').val(),
            },
            success: function(data) {
                if ((data.errors)){
                    $('.errorSubEmail').removeClass('hidden');
                    $('.errorSubEmail').text(data.errors.email);
                    console.log(data);
                }
                else {
                    $('.errorSubEmail').addClass('hidden');
                    toastr.success('Thank you for subscription, Your Email is well received!', 'Success Alert', { timeOut: 5000 });
                    $('.subscription-form').trigger("reset");
                }
            },
            error: function(data) {
                console.log('Error:', data);
                alert(data.responseText);
            }
        });
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
       $("li.disabled a").click(function() {
         return false;
       });
    });
</script>


<script type="text/javascript">

//Login modal 
$(document).ready(function() {
    $(".login-btn").click(function() {
        $.ajax({
            type: "POST",
            url: '{{URL::to('/login')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                email: $('#email-login').val(),
                password: $('#password-login').val(),
            },
            success: function(result) {
                if(result.error)
                {   
                    console.log(result);
                    $('.login-alert').text(result.error);
                    $('.login-alert').show();
                    $('.login-alert-email').hide();
                    $('.login-alert-password').hide();
                }
                else if(result.errors){
                    console.log(result);
                    if(result.errors.email){
                        $('.login-alert-email').text(result.errors.email);
                        $('.login-alert-email').show();
                        $('.login-alert-password').hide();
                    }else if(result.errors.password){
                        $('.login-alert-password').text(result.errors.password);
                        $('.login-alert-password').show();
                        $('.login-alert-email').hide();
                    }
                }
                else {
                    $('.login-modal-content').trigger("reset");
                    $('.login_modal').hide();
                    window.location.href = result.redirect;
                }
            },
            error: function(result) {
                console.log(result);
                $('.login-alert').text(result.error.email);
                $('.login-alert').show();
                $('.login-alert-email').hide();
                $('.login-alert-password').hide();
            }
        });
    });
});


//register modal 
$(document).ready(function() {
    $(".registerBtn").click(function(e) {
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: '{{URL::to('/register')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                name: $('#reg_name').val(),
                email: $('#reg_email').val(),
                tel: $('#reg_tel').val(),
                district: $('#reg_dis').val(),
                password: $('#reg_password').val(),
                password_confirmation: $('#reg_conf_password').val(),
            },
            success: function(result) {
                if(result.errors)
                {   
                    console.log(result.errors);
                    $('.register-alert').html('');
                    $.each(result.errors, function(key, value){
                        $('.register-alert').show();
                        $('.register-alert').append('<li>'+value+'</li>');
                    });
                }
                else {
                    $('.register-modal-content').trigger("reset");
                    $('.register_modal').hide();
                    window.location.href = result.redirect;
                }
            },
            error: function(result) {
                console.log(result);
                alert(result.responseText);
            }
        });
    });
});
</script>
