$(".chatForm").submit(function(e){
    e.preventDefault();
    var formData =  $(this).serialize();
    console.log(formData);
    $.ajax({
        url : "http://localhost/chattingApp/controllers/chatController.php",
        type : "post",
        data:formData,
        success: function(response){
            $("input[name='message']").val('');
        }
    });
});

var img = $("#friend_img").attr('src');
// setInterval(() => {
//     loadChats();
// }, 1000);
loadChats();
function loadChats(){
    $.ajax({
        url:"http://localhost/chattingApp/Api/getChats.php",
        type: "get",
        data:{
            reciever_id: $("input[name='reciever_id']").val()
        },
        success:function(response){
            var data = JSON.parse(response);
            if(data.response){
                $(".chat-box").html('');
            } else{
                $.each(data, function(key,val){
                    if(val.reciever_id == $("input[name='reciever_id']").val()){
                        $(".chat-box").append("<div class='sent'><div class='message'> <p>"+val.message+"</p></div></div>");
                    } else{
                        $(".chat-box").append("<div class='recieved'><img src='"+img+"'> <div class='message'> <p>"+val.message+"</p></div></div>");
                    }
                });
            }
        }
    });
}