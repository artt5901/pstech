<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#branch').change(function() {
    var id_branch = $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax_student.php",
      data: {id:id_branch,function:'branch'},
      success: function(data){
          $('#class_id').html(data); 
      }
    });
  });
 
</script>