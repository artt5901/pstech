<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#t_username').blur(function() {
    var username = $(this).val();
 
      $.ajax({
		url: "ajax_teacher.php",
      	method: "POST",
      	data: {user:username},
		dataType:"text",
      	success: function(html)
		{
          $('#availability').html(html); 
      	}
    });
  });
});
</script>