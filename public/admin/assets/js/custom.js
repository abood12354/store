$(document).ready(function(){
//check admin password
    $("#current_pwd").keyup(function(){
         var current_pwd=$("#current_pwd").val();

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url:'/check-current-password',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#verifyCurrentPwd").html("<span style='color: red'>Current password is incorrect</span>")
                  }
                  else if(resp=="true"){
                    $("#verifyCurrentPwd").html("<span style='color: green'>Current password is correct</span>")  
                  }

            },error:function(){
                alert("Error")
            }

        })

    })
});