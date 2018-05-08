$(function(){
	$("#calcolamelo").submit(function(e) {

      var url = "http://domenicomoreschini.altervista.org/cp/calcola.php"; // the script where you handle the form input.

      $.ajax({
             type: "POST",
             dataType:"JSON",
             url: url,
             data: $("#calcolamelo").serialize(), // serializes the form's elements.
             success: function(data)
             {
                 //alert(data); // show response from the php script.
                 //$("#risultati").html(data.gradi);
                 //$("#risultati").append($("<input/>").attr('type','text').val(data.gradi));
                 //$("#risultati").append($("<input/>").attr('type','text').val(data.panielli));
                 $("#risultati").find("#farina").html(data.gradi+" °");
                 $("#risultati").show();
                 
             }
           });

      e.preventDefault(); // avoid to execute the actual submit of the form.
  });
});
