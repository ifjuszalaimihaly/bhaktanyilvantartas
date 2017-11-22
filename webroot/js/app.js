$(document).foundation();
var ajaxFunction = function (urlFuffix, data, successFunction, failFunction, errorFunction) {
    var host = $(location).attr("origin");
    var baseUrl = $($("script")[1]).attr("src").replace(/\/js\/.*/, '');
    var url = host + baseUrl +  urlFuffix;
    $.ajax({
        url: url,
        method: "post",
        data: data,
        success: function (result) {
            var response = JSON.parse(result);
            if (response["status"] == "success") {
                console.log("success")
                successFunction;
                return;
            }
            if (response.status == "fail") {
                console.log("fail");
                failFunction;
                return;
            }
        },
        error: function (result) {
            console.log("error");
            if(errorFunction != null){
                errorFunction
            } else {
                failFunction;
            }
        }
    });
}
