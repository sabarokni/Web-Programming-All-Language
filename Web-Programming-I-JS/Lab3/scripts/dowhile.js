var secret= 7;
var guess ;
do {
  guess= prompt ("guess a number between 1 to 10 :");
  if(guess!= secret){
      alert("Your answer is incorrect. Please enter again")
  }
}while (guess != secret);
document.writeln("congratulations! This is correct");