loadChat();
function loadChat(){
    $.ajax({
        url:"http://localhost/chattingApp/Api/getSingleChat.php",
        type: "get",
        data:{
            reciever_id: $("input[name='reciever_id']").val()
        },
        success:function(response){
            var data = JSON.parse(response);
            if(data.response){
                $('.message').html(data.response);
            } else{
                if(data.reciever_id = $("input[name='reciever_id']").val()){    
                    (data.message.length > 28) ? msg = data.message.substring(28)+'......' : msg=data.message;                
                    $('.message').html(msg);
                } else{
                    $('.message').html('');
                }
            }
        }
    });
}