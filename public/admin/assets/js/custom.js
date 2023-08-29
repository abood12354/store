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
    //update cms status

    $(document).on("click",".updateCmsPageStatus",function(){
        var status=$(this).children("i").attr("status");
        var page_id=$(this).attr("page_id");
        $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url:'/update-cms-pages-status',
        data:{status:status,page_id:page_id},
        success:function(resp){

            if(resp['status']==0){
                $("#page_"+page_id).html("<i class='fas fa-toggle-off'style='color: gray' status='Inactive'></i>")

            }else if(resp['status']==1){
                $("#page_"+page_id).html("<i class='fas fa-toggle-on' style='color: rgb(0, 115, 255)' status='Active'></i>")
            }
        },error:function(){
            
            alert("Error")
        }

        })

    })
 // confirm deletion of CMS page
        $(document).on("click",".confirmDelete",function(){

            var name = $(this).attr('name');
            if(confirm('Are you sure you want to delete '+name+'?')){
                return true;
            }
            return false;

        });

    //update sub admin status
    $(document).on("click",".updateSubadminStatus",function(){
        var status=$(this).children("i").attr("status");
        var subadmin_id=$(this).attr("subadmin_id");
        $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url:'/update-subadmin-status',
        data:{status:status,subadmin_id:subadmin_id},
        success:function(resp){

            if(resp['status']==0){
                $("#subadmin-"+subadmin_id).html("<i class='fas fa-toggle-off'style='color: gray' status='Inactive'></i>")

            }else if(resp['status']==1){
                $("#subadmin-"+subadmin_id).html("<i class='fas fa-toggle-on' style='color: rgb(0, 115, 255)' status='Active'></i>")
            }
        },error:function(){
            
            alert("Error")
        }

        })

    })
     // confirm deletion of sub admin
     $(document).on("click",".confirmDelete",function(){

        var name = $(this).attr('username');
        if(confirm('Are you sure you want to delete '+name+'?')){
            return true;
        }
        return false;

    });

    //update category status

    $(document).on("click",".updateCategoryStatus",function(){
        var status=$(this).children("i").attr("status");
        var category_id=$(this).attr("category_id");
        $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url:'/update-category-status',
        data:{status:status,category_id:category_id},
        success:function(resp){

            if(resp['status']==0){
                $("#category_"+category_id).html("<i class='fas fa-toggle-off'style='color: gray' status='Inactive'></i>")

            }else if(resp['status']==1){
                $("#category_"+category_id).html("<i class='fas fa-toggle-on' style='color: rgb(0, 115, 255)' status='Active'></i>")
            }
        },error:function(){
            
            alert("Error")
        }

        })

    })
});