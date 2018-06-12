document.onload = setTimeout(function () { 
  var currPath = window.location.pathname;
  if($('#logincheck').val()=='guest' && currPath!=='/' && currPath!=='/login' && currPath!=='/register'){ 
    // alert("Your Session has experied"); 
    $('#login-modal').modal(
      {
          backdrop: 'static',
          keyboard: false
      }
      );
  }
}, 5000);

function toggleMenu() {
    var element = document.getElementById("header-menu");
    if (element.className === "mobile")
        element.className = '';
    else element.className = 'mobile';
}

function toggleSubmenu(element) {
    if (element.className === 'visible')
        element.className = '';
    else element.className = 'visible'
}

$(document).ready(function(){
    var currPath = window.location.pathname;
  if (currPath=='/register' || currPath=='/login') {
    $('#login_section').hide();
  }
});


$(function() {
  $("#file-type").on("change", function() {
    if($("#file-type").val()=="book"){
        $("#file_format").text("pdf");
    }
    else if ($("#file-type").val()=="video"){
        $("#file_format").text("mp4");   
    }
    else if ($("#file-type").val()=="ppt"){
        $("#file_format").text("ppt,pptx");
    }
    else{
        $("#file_format").text("pdf,mp4,ppt,pptx");
    }
  }).trigger("change");
});

// $(function() {
//   $("#file_catagory").on("change", function() {
//     $catagory_id=$("#file_catagory").val();
//     $action=$("#file_catagory").attr('action');
//     $csrf=$("#csrf_catagory").data('token');
//     $("#file_sub_catagory").empty();

//     $.ajax({
//       url: $action,
//       type: 'POST',
//       async: false,
//       data: {
//         "catagory_id": $catagory_id,
//         "_token" : $csrf
//       },
//       success: function(data){
//         $subcatagories=data.status;

//         if($subcatagories.length>0){
//           $option='<option value="" selected disabled>--Select a Sub Catagory--</option>';
//           for($i=0;$i<$subcatagories.length;$i++){
//             $option+='<option value="'+$subcatagories[$i].id+'">'+$subcatagories[$i].catagory_name+'</option>';
//           }
//           $("#file_sub_catagory").append($option);
//           $("#sub_catagory").show();
//         }
//         else{
//           $("#sub_catagory").hide(); 
//         }
//       },
//       error: function(data){
//         console.log(data);
//       }
//     });
//   }).trigger("change");
// });

$("#file_catagory").on("change", function() {
    $catagory=$(this).val();

    if ($catagory=='add-catagory') {
      $('#add-catagory-modal').modal('toggle');
    }

    return true;

}).trigger("change");

$(document).on("click","#upload_file_button",function(e){
    // e.preventDefault();

    if($("#file_catagory").val()=="1" && $("#file_sub_catagory").val()==""){
        alert("Please select sub catagory");
    }
    else{
        if($("#file_catagory").val()=="1"){
            $("#catagory_id").val($("#file_sub_catagory").val());
        }
        else{
            $("#catagory_id").val($("#file_catagory").val());   
        }
        return true;
    }
    return false;
});

$(function() {
  $(".book-search").on("click", function() {
    $("#search_file_type").val('book');
  });

  $(".ppt-search").on("click", function() {
    $("#search_file_type").val('ppt');
  });

  $(".video-search").on("click", function() {
    $("#search_file_type").val('video');
  });

  $(".course-search").on("click", function() {
    $("#search_file_type").val('course');
  });

  $(".training-search").on("click", function() {
    $("#search_file_type").val('training');
  });
});

$(function() {
  $("#selected_user_type").on("change", function() {
    if($("#selected_user_type").val()=="corporate"){
        $("#organization").show();
        $("#occupation").hide();   
        $("#picture").hide(); 
    }
    else if($("#selected_user_type").val()=="author"){
        $("#organization").show();   
        $("#occupation").show();   
        $("#picture").show();   
    }
    else{
      $("#organization").hide();   
      $("#occupation").hide();   
      $("#picture").hide();  
    }
  }).trigger("change");
});

$(function() {
  var data='/zisad/';
  $("#more-training").on("click", function() {
      data='/training/catagory/' ;
  });
  $("#more-course").on("click", function() {
      data='/courses/catagory/' ;
  });
  $("#more-books").on("click", function() {
      data='/books/catagory/' ;
  });
  $("#more-videos").on("click", function() {
      data='/videos/catagory/' ;
  }); 
  $("#more-ppts").on("click", function() {
      data='/ppts/catagory/' ;
  });

  $(".catagory-button").on("click", function() {
      var notice=$(this).parent().children("a");
      $link=data+notice.attr('href');
      notice.attr('href',$link);
  });
});


$(document).ready(function() {
  // while(1){
  //   setTimeout(function () {
  //       console.log("Hello");
  //   }, 5000);
  // }
});