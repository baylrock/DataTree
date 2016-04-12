/**
 * Created by baylrock on 07.03.2016.
 */

$(document).ready(function() {

    $.ajax ({
        type: "POST",
        dataType: "json",
        url: "build_json.php",
        success: function (data)
        {
            console.log (data);
            $.each(data, function(i, val) {
                if (typeof val == "object") {
                    $(".list-group").append("<a href=\"#\" class=\"list-group-item\">" + i + " " + val["name"] + "</a>");
                } else {
                    $(".list-group").append("<a href=\"#\" class=\"list-group-item\">" + i + " " + val + "</a>");
                }
            });
        }
    });

   $(".row").click(function() {

   })
});

