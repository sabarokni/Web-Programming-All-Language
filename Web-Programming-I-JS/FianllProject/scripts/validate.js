
//validate module
var validate = (function () {


    function validateForm(v){

        //create private and public functions/objects/variables to validate the form
        // v.preventDefault();
        var validation = true;


        //display warning if firstName is not entered
        if (profile.firstName.value === "") {
            document.getElementById('firstNameWraning').innerHTML = "*Please enter a First Name*";
            validation = false;
        }


        //display warning if lastName is not entered
        if (profile.lastName.value === "") {
            document.getElementById('lastNameWarning').innerHTML = "*Please enter a Last Name*";
            validation = false;
        }


        //display warning if address 1 is not entered
        if (profile.address1.value === "") {
            document.getElementById('address1Warning').innerHTML = "*Please enter a Address*";
            validation = false;
        }


        //display warning if city is not entered
        if (profile.city.value === "") {
            document.getElementById('cityWarning').innerHTML = "*Please enter a City*";
            validation = false;
        }


        //display warning if Province not choosen
        if (profile.province.options.selectedIndex === 0) {
            document.getElementById('provinceWarning').innerHTML = "*Please select a Province*";
            validation = false;
        }


        //display warning if country not choosen
        if (profile.country.options.selectedIndex === 0) {
            validation = false;
            document.getElementById('countryWarning').innerHTML = "*Please select a Country*";
        }


        if (validation) {
            alert("Thank You");

        }

        return false;

    }


    return {
        validateForm
    }
    

}());
// };

