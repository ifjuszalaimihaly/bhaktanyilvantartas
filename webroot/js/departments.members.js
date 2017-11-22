var sourceListId;
var targetListId;
$(".drag").draggable({
    drag: function (i, el) {
        sourceListId = $(this).parent().attr("id");
    }
});
$(".drop").each(function (i, el) {
    $(this).droppable({
        drop: function (event, ui) {
            targetListId = $(this).attr("id");
            var itemId = ui.draggable.attr("id");
            $("#" + itemId).appendTo("#" + targetListId);
            $("#" + targetListId + " li").last().css({"position": "relative", "left": 0, "top": 0});
            if (sourceListId != targetListId) {
                var bhaktaId = itemId.substring(3);
                var departmentId = targetListId.substring(3);
                var url = "/services/addbybhaktaanddepartment";
                var data = {bhaktaId: bhaktaId, departmentId: departmentId};
                var successMessage = "Új szolgálat sikeresen hozzáadva"
                var errorMessage = "Nem lehetett a szolgálatot hozzáadni, próbálja később";
                ajaxFunction(url,data,alert(successMessage),alert(errorMessage),null);
            }
        }
    });
});