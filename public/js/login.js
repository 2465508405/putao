$(document).ready(function(){
    $("input[name='commit']").click(function(){
        var name = $("input[name='login']").val();
        var password = $(".password").val();
        var remember = $("#remember_me").val();
        var _token = $("input[name='_token']").val();
        $.ajax({
            url:'auth/login',
            data:{name:name,password:password,_token:_token,remember:remember},
            type:'post',
            datatype:"json",
            success:function(data){
                if(data.code == 1){
                    window.location.href="/";
                }
            }
        })
    });
});