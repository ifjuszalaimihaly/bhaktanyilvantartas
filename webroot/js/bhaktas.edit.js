var endvolunteer = function () {
    $("#endvolbtn").on("click", function () {
        var bhaktaId = $("input[name=bhakta_id]").val();
        var endDate = new Date($("#szolgalat-vege").val());
        var year = endDate.getFullYear();
        var month = endDate.getMonth() +1;
        var day = endDate.getDate();
        var url = "/bhaktas/endvolunteer/" + bhaktaId;
        var data = {year: year, month: month, day: day};
        var succesMassage = "Státusz státusz sikeresen módisítva";
        var success = function (message) {
            alert(message);
            $("#endvolform").remove();
            $("#communityrole-id").val("4");
            $("#legalstatus-id").val("");
        };
        var errorMessage = "Nem lehetett a státuszt visszaállítani, próbálja később";
        ajaxFunction(url,data,success(succesMassage),alert(errorMessage),null);
    });
}();
