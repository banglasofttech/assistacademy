$(function() {
  $(".author-login").on("click", function() {
    $("#user_type").val('author');
  });

  $(".learner-login").on("click", function() {
    $("#user_type").val('general_user');
  });

  $(".corporate-login").on("click", function() {
    $("#user_type").val('corporate');
  });
});

$(document).on("change","#course_duration",function(e){
	e.preventDefault();

  $total_filed=$('#course_duration').val();
  $type=$('#duration_type').val();

  if($type=='Hours'){
    $total_filed=$total_filed/1.5;
  }

	$('#study_instruction_table').empty();

  for (var i = 1; i <=$total_filed; i++) {
  	$column='<tr>'+
            '<td>'+
              '<label>Session '+i+'</label>'+
            '</td>'+
            '<td>'+
              '<div class="form-group">'+
                '<textarea class="form-control" placeholder="Enter Study Instruction of session '+i+'" name="study_instruction[]" required autofocus></textarea>'+
              '</div>'+
            '</td>'+
          '</tr>';
  	$('#study_instruction_table').append($column);
  }

  $column='<tr>'+
            '<td>'+
              '<label style="color:#fff;">Course Material: Video Links</label>'+
            '</td>'+
          '</tr>';
  $('#study_instruction_table').append($column);

}).trigger("change");

$(document).on("change","#duration_type",function(e){
  e.preventDefault();

  $total_filed=$('#course_duration').val();
  $type=$('#duration_type').val();

  if($type=='Hours'){
    $total_filed=$total_filed/1.5;
  }

  $('#study_instruction_table').empty();

  for (var i = 1; i <=$total_filed; i++) {
    $column='<tr>'+
            '<td>'+
              '<label>Session '+i+'</label>'+
            '</td>'+
            '<td>'+
              '<div class="form-group">'+
                '<textarea class="form-control" placeholder="Enter Study Instruction of session '+i+'" name="study_instruction[]" required autofocus></textarea>'+
              '</div>'+
            '</td>'+
          '</tr>';
    $('#study_instruction_table').append($column);
  }

  $column='<tr>'+
            '<td>'+
              '<label style="color:#fff;">Course Material: Video Links</label>'+
            '</td>'+
          '</tr>';
  $('#study_instruction_table').append($column);

}).trigger("change");