
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
    $('#drpRating').val(rs.Rating);
    $('#txtSummary').val(rs.Summary);
    $('#txtCity').val(rs.Location.City);
    $('#txtProvinceState').val(rs.Location.Province);
    $('#txtPostalZipCode').val(rs.Location.PostalCode);
    $('#txtStreetAddress').val(rs.Location.Street);
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



