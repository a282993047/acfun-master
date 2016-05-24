$(document).ready(function(){
  function pageName(){
      var a = location.href;
      var b = a.split("/");
      var c = b.slice(b.length-1, b.length).toString(String).split(".");
      return c.slice(0, 1);
  }
  //sidebar active
  $("#function").addClass('active');
    $("#"+pageName()).addClass('active');

  $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'}); 

  //is follow
  $(".btn-follow").on("click",function(){
    var aid = $(this).attr('id');
    $("#ld2").css("display","block");
    $(this).addClass('btn-unavailable');
    $(this).siblings(".btn-notfollow").removeClass('btn-unavailable');
    $.ajax({
      url: "./includes/isfollow.php",  
      type: "post",
      data:{id:aid,token:1},
      error: function(){  
        alert('Error');  
      },  
      success: function(data){
        window.location.reload();
        console.log("Follow success");
      }
    });     
  });

  $(".btn-notfollow").on("click",function(){
    var aid = $(this).attr('id');
    $("#ld1").css("display","block");
    $(this).addClass('btn-unavailable');
    $(this).siblings(".btn-follow").removeClass('btn-unavailable');
    $.ajax({
      url: "./includes/isfollow.php",  
      type: "post",
      data:{id:aid,token:0},
      error: function(){
        alert('Error');  
      },  
      success: function(data){
        window.location.reload();
        console.log("UnFollow success");
      }
    }); 
  });

  $("#addtask").on("click",function(){
    var course = $(this).attr('course');
    var deadline = $('.form_datetime').val();
    var task = $("input[name='detail']").val();
    $.ajax({
      url: "./class/additem.php",
      type: "post",
      data:{cid:course,deadline:deadline,task:task},
      error: function(){
        alert('Error');
      },
      success: function(data){
        window.location.reload();
        //window.location.href="./class/additem.php";
      }
    });
  });
}); 