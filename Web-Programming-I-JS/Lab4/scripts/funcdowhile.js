function guessTheNumber(secret) {
  var guess;
  do {
    guess = prompt("guess a number between 1 to 10 :");
    if (guess != secret) {
      alert("Your answer is incorrect. Please enter again")
    }
  } while (guess != secret);
  document.writeln("congratulations! This is correct.  The Number is :  " + secret);

}
guessTheNumber(7);