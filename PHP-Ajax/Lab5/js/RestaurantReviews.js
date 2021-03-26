$(document).ready(function () {
    $.getScript("js/Config.js");
    $.getScript("js/Common.js");
// show name of restaurant in dropdownlist
    $.ajax({
        type: "GET",
        url: showAllRestaurant,
        dataType: "json",
        success: function (drpRestaurant) {
            $.each(drpRestaurant, function (index, value)
            {
                $('#lblConfirmation').val(" ");
                $('#drpRestaurant').append('<option value="' + index + '">' + value + '</option>');
            }
            );
        },
        error: function (event, request, settings) {
            window.alert('AjaxError' + ' : ' + settings);
        }
    });
//click on dropdan list and show details of restaurant
    $('#drpRestaurant').on("change", function (event) {
        var rs = $("#drpRestaurant option:selected").val().trim();
        //Id = encodeURIComponent($("#drpRestaurant option:selected").val());
        rs = encodeURIComponent(rs);
        //alert(Id);
        $.ajax({
            type: "GET",
            url: getDetailsUrl+rs,
            dataType: "json",
            success: function (restaurant)
            {
                $('#drpRating').empty();
                for ($j = 1; $j < 6; $j++) {
                    
                    $('#drpRating').append("<option>"+$j+"</option>")

                }
                
                populateRestaurant(restaurant);
                $('#lblConfirmation').val(" ");
            },
            error: function (event, request, settings)
            {
                window.alert('AjaxError' + ' : ' + settings);
            }
        });
    });
    // click on save button and save in xml file    
    $('#btnSave').on("click", function (event) {
        var restaurant = getRestaurantObjectFromPage();
        restaurant.id=$("#drpRestaurant option:selected").val();
        //Id = encodeURIComponent($("#drpRestaurant option:selected").val().trim());
        //alert(Id);
        $.ajax({
            type: "POST",
            url: saveUrl,
            data: {restaurant: JSON.stringify(restaurant)},
            dataType: "json",
            success: function (id)
            {
                $('#lblConfirmation').text("New restaurant has been succefully saved");
            },
            error: function (event, request, settings)
            {
                window.alert('AjaxError' + ' : ' + settings);
            }
        });
    });
});

