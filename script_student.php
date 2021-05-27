<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#branch').change(function() {
    var id_branch = $(this).val();

    $.ajax({
      type: "POST",
      url: "ajax_student.php",
      data: {
        id: id_branch,
        function: 'branch'
      },
      success: function(data) {
        $('#class_id').html(data);
        
        
      }
    });
  });

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#c_id').change(function() {
      var id_course = $("#c_id").val();
      var id_class = $("#class_id").val();

      $.ajax({
        url: "ajax_course.php",
        method: "POST",
        data: {
          c_id: id_course , class_id :id_class
        },
        dataType: "text",
        success: function(html) {
          $('#availability').html(html);
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#time_id').change(function() {
      var id_time = $("#time_id").val();
      var id_day = $("#day_id").val();
      var id_class = $("#class_id").val();

      $.ajax({
        url: "ajax_course.php",
        method: "POST",
        data: {
          time_id:id_time , day_id:id_day , class_id:id_class
        },
        dataType: "text",
        success: function(html) {
          $('#availability1').html(html);
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#t_id').change(function() {
      var id_time = $("#time_id").val();
      var id_day = $("#day_id").val();
      var id_teacher = $("#t_id").val();

      $.ajax({
        url: "ajax_course.php",
        method: "POST",
        data: {
          time_id:id_time , day_id:id_day , t_id:id_teacher
        },
        dataType: "text",
        success: function(html) {
          $('#availability2').html(html);
        }
      });
    });
  });
</script>

<script>
function refreshPage(){
    window.location.reload();
} </script>