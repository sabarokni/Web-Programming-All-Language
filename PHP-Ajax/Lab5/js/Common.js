
function clearInfo()
{   
    $('#drpRating').val("");
    $('#txtSummary').val("");
    $('#txtCity').val("");
    $('#txtProvinceState').val("");
    $('#txtPostalZipCode').val("");
    $('#txtStreetAddress').val("");
}
function clearDrpRating()
{
    $('#drpRating').val("");
}


function populateRestaurant(rs) {
    $('#drpRating').val(rs.rating);
    $('#txtSummary').val(rs.summary);
    $('#txtCity').val(rs.city);
    $('#txtProvinceState').val(rs.ProvinceState);
    $('#txtPostalZipCode').val(rs.PostalZipCode);
    $('#txtStreetAddress').val(rs.StreetAddress);
}

function getRestaurantObjectFromPage()
{
    var restaurant = new Object();
    restaurant.StreetAddress = $('#txtStreetAddress').val();
    restaurant.city = $('#txtCity').val();
    restaurant.ProvinceState = $('#txtProvinceState').val();
    restaurant.PostalZipCode= $('#txtPostalZipCode').val();
    restaurant.summary=$('#txtSummary').val();
    restaurant.rating=$('#drpRating').val();  
    return restaurant;
}


