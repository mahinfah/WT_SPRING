function analyze() {

    // Get the text entered by the user
    let inputText = document.getElementById("text").value;

  
    if (inputText.trim() === "") {
        document.getElementById("result").innerHTML = "Please enter some text.";
        return;
    }


    let totalCharacters = inputText.length;

      let totalWords = inputText.trim().split(/\s+/).length;

     let reversedText = inputText.split("").reverse().join("");


    let output = 

        "Total Characters: " + totalCharacters + "<br>" +
      
        "Total Words: " + totalWords + "<br>" +
        
        "Reversed Text: " + reversedText;

    document.getElementById("result").innerHTML = output;
}