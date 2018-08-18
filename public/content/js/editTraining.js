$(function() {
  $(".remove_video").on("click", function() {
  	$parent = $(this).parent().parent();
    //get file name
    $file_name = $parent.children("td").html();

    //get all file that was deleted previous
    $deleted_file = $("#removed_video").val();

    //insert all deleted file
    $("#removed_video").val($deleted_file+$file_name+"|");

    $parent.hide();

    return false;
  });

  $(".remove_ppt").on("click", function() {
  	$parent = $(this).parent().parent();
    //get file name
    $file_name = $parent.children("td").html();

    //get all file that was deleted previous
    $deleted_file = $("#removed_ppt").val();

    //insert all deleted file
    $("#removed_ppt").val($deleted_file+$file_name+"|");

    $parent.hide();

    return false;
  });
});