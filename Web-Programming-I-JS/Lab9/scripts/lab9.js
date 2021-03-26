
$(document).ready(function () {
    // change the content of the h1
    $("h1").text('Lab9');


    // add the html code to create an h3 element andset its content
    var newItem = $("<h3>Working with jQuery</h3>");
    $("#header").html(newItem);


    // change the background colour of the selected elements
    $("input[type='button']").each(function (index, element) {
        $(element).addClass("btn-background");
    });


    // add a red border
    $("#buttons").addClass("red-border");


    //change the fontcolour to blue.
    $("p").each(function (index, element) {
        $(element).addClass("blue");
    });
    

    //add a green border around the first paragraph
    $("#first").on("click", function () {
        $("#paragraphs p:first").addClass("green-border");
    });


    //add an orange border around the last paragraph
    $("#last").on("click", function () {
        $("#paragraphs p:last").addClass("orange-border");
    });


    //add a purple border around the previous paragraph
    $("#prev").on("click", function () {
        $("#para3").prev().addClass("purple-border");
    });

    //add a yellow border around the next paragraph
    $("#next").on("click", function () {
        $("#para2").next().addClass("yellow-border");
    });

    // remove the element with the id=”footer”
    $("#remove").on("click", function () {
        $("#footer").remove();
    });
});