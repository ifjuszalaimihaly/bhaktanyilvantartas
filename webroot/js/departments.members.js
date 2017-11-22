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
            $("#"+targetListId+" li").last().css({"position": "relative","left": 0, "top": 0});
            var bhaktaId = itemId.substring(3);
            var departmentId = targetListId.substring(3);
            var host = $(location).attr("origin");
            var baseUrl = $($("script")[1]).attr("src").replace(/\/js\/.*/, '');
            var url = host + baseUrl + "/services/addbybhaktaanddepartment";
            $.ajax({
                url: url,
                method: "post",
                data: {bhaktaId: bhaktaId, departmentId: departmentId},
                success: function (result) {
                    var response = JSON.parse(result);
                    if(response["status"] == "success"){
                        alert("Új szolgálat sikeresen hozzáadva");
                    }
                    if(response.status == "fail"){
                        alert("Nem lehetett a szolgálatot hozzáadni, próbálja később");
                    }
                },
                error: function (result) {
                    alert("Nem lehetett a szolgálatot hozzáadni, próbálja később");
                }
            });
        }
    });
});