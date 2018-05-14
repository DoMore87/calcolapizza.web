$(function(){
	$("#calcolamelo").submit(function(e) {

      var url = "http://domenicomoreschini.altervista.org/cp/calcola.php";

      $.ajax({
             type: "POST",
             dataType:"JSON",
             url: url,
             data: $("#calcolamelo").serialize(),
             success: function(data)
             {
                $("#farina").html(data.Farina + " g");
                $("#aqua").html(data.Acqua + " g");
                $("#sale").html(data.Sale + " g");
                $("#grassi").html(data.Olio + " g");
                $("#pdr").html(data.Pdr + " g");
                $("#lievito").html(data.Lievito + " g");
                $("#risultati").show();
             }
           });
      e.preventDefault();
  });
});
