
$('.loginForm').submit(function(e){
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url : "http://localhost/chattingApp/controllers/loginController.php",
        type : "post",
        data:formData,
        // beforeSend:function(XHR){
        //     $('button[name="login"]').html(' <i class="fa fa-spinner fa-spin" style="margin-right:8px"></i>Loading.....');
        //     $('button[name="login"]').addClass('disabled');
        // },
        success:function(response){
            var data = JSON.parse(response);
            if(data.success == true){
                window.location = "http://localhost/chattingApp/users.php";
            } else {
                $('.display-error').css('display','block');
                $('.display-error').html('<li>'+data.error+'</li>');
            }
            
        }
    });
});