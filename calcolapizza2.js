$(window).load(function() {
    function a() {
        var a = 0
          , r = parseFloat($("#panielli").val().replace(",", "."));
        isNaN(r) || r < 1 || r % 1 != 0 ? ($("#panielli").parent().addClass("errato"),
        a = 1) : $("#panielli").parent().removeClass("errato");
        var e = parseFloat($("#peso").val().replace(",", "."));
        isNaN(e) || e <= 0 ? ($("#peso").parent().addClass("errato"),
        a = 1) : $("#peso").parent().removeClass("errato");
        var t = parseFloat($("#idro").val().replace(",", "."));
        isNaN(t) || t < 50 || t > 100 ? ($("#idro").parent().addClass("errato"),
        a = 1) : $("#idro").parent().removeClass("errato");
        var l = parseFloat($("#salepl").val().replace(",", "."));
        isNaN(l) || l < 0 || l > 70 ? ($("#salepl").parent().addClass("errato"),
        a = 1) : $("#salepl").parent().removeClass("errato");
        var i = parseFloat($("#liev").val().replace(",", "."));
        isNaN(i) || i < 3 || i > 96 ? ($("#liev").parent().addClass("errato"),
        a = 1) : $("#liev").parent().removeClass("errato");
        var s = parseFloat($("#frigo").val().replace(",", "."));
        $("#frigo").parent().attr("title", "Inserire un numero non negativo"),
        (isNaN(s) || s < 0 || s > i - 1) && 0 != s ? (s > i - 1 && $("#frigo").parent().attr("title", "Non superare il totale ore diminuito di 1"),
        $("#frigo").parent().addClass("errato"),
        a = 1) : $("#frigo").parent().removeClass("errato");
        var p = parseFloat($("#gradi").val().replace(",", "."));
        isNaN(p) || p < 15 || p > 35 ? ($("#gradi").parent().addClass("errato"),
        a = 1) : $("#gradi").parent().removeClass("errato");
        var n = p * (1 - .25 * o)
          , d = parseFloat($("#grassipl").val().replace(",", "."));
        isNaN(d) || d < 0 || d > 150 ? ($("#grassipl").parent().addClass("errato"),
        a = 1) : $("#grassipl").parent().removeClass("errato");
    }
    $("body").vegas({
        slides: [{
            src: "piza.jpg"
        }]
    }),
    a(),
    $("input[type='radio']").click(function() {
        a()
    }),
    $("input[type='checkbox']").click(function() {
        a()
    }),
    $("input").keyup(function() {
        a()
    })
});
