// Saba Rokni 
//lab6 JavaScript file

function Book(author, title, genre) {

    this.author = author;
    this.title = title;
    this.genre = genre;
}

var bookArray = new Array();

var Book1 = new Book("William Shakespeare", "The Tempest", "Historical Fiction");
var Book2 = new Book("Stephen King", "The Shining", "Horror");
var Book3 = new Book("Anne Frank", "The Diary of Anne Frank", "Non-Fiction");
var Book4 = new Book("Rhonda Byrne", "The Secret", "Self-help book");

bookArray[0] = Book1;
bookArray[1] = Book2;
bookArray[2] = Book3;
bookArray[3] = Book4;


function addBooks() {
    for (let i = 0; i < 3; i++) {
        author = prompt("Enter  author of Book : ", "");
        title = prompt("Enter  title of Book : ", "");
        genre = prompt("Enter  genre of Book : ", "");

        bookArray.push(new Book(author, title, genre));
    }

}
addBooks()



function displayRecommendations() {
    for (let x = 0; x < bookArray.length; x++) {
        document.write("The Book " + (x + 1) + "<br/>");
        document.write("<li>" + bookArray[x].title + ", ");
        document.write(" Written By : " + bookArray[x].author + ", ");
        document.write(" gener : " + bookArray[x].genre)
        document.write("</li>")
    }

}
displayRecommendations();

