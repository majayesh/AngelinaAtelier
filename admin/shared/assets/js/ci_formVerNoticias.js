
$(document).ready(function(){
    
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $("#mytable tbody tr").show().filter(function(index) {
        return $(this).find("td:eq(0)").text().toLowerCase().indexOf(value) == -1;
        }).hide();
    });
    /*
    $("#search").keyup(function(){
        //alert("hola");
    _this = this;
    // Show only matching TR, hide rest of them
    $.each($("#mytable tbody tr"), function() {
    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
    $(this).hide();
    else
    $(this).show();
    });
    });
    */
});