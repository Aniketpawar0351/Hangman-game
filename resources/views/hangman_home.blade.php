<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">


    
</head>

<body>


    <script>
        var wrongGuess = 0;
        var maxWrongGuesses = 6;
        var word = "<?php echo $word; ?>";


        function showPopup() {

            Swal.fire({
                title: "You lost!",
                html: "The correct word was: <span style='color: green;font-size:1.2em;'>" + word +
                    "</span>. Do you want to play again or quit?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "green",
                confirmButtonText: "Play Again",
                cancelButtonText: "Quit",
                closeOnConfirm: false,
                closeOnCancel: false,
                backdrop: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                } else {
                    window.location.reload();
                }
            });

        }

        function winPopup() {
            Swal.fire({
                title: "Congrats You Win!",
                html: "Do you want to play again or quit?",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: "green",
                confirmButtonText: "Play Again",
                cancelButtonText: "Quit",
                closeOnConfirm: false,
                closeOnCancel: false,
                backdrop: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                } else {
                    window.location.reload();
                }
            });
        }

        function drawHangman(wrongGuesses) {
            const hangman = document.getElementById('hangman');
            const images = hangman.getElementsByTagName('img');

            // Hide all images first
            for (let i = 0; i < images.length; i++) {
                images[i].style.display = 'none';
            }

            images[wrongGuesses].style.display = 'block';
        }



        function newGame() {
            window.location.reload();
        }

        function surrender() {
            showPopup();
        }


        var wordSet = new Set(word.toUpperCase());
        function myFunction(char, button) {

            if (wordSet.has(char)) {
                // character found
                var elements = document.querySelectorAll("#" + char + "1");
                for (var i = 0; i < elements.length; i++) {
                    var audio = new Audio(window.location.origin + '/sound/success.mp3');
                    audio.play(); // play sound
                    elements[i].textContent = char;
                    elements[i].classList.add("flip"); // add flip effect

                }

                button.style.backgroundColor = "green";
                button.disabled = true;

                button.classList.add("disabled");
                wordSet.delete(char); 


                if (wordSet.size == 0) {
                    winPopup();
                }
            } else {
                // character not found
                wrongGuess++;
                drawHangman(wrongGuess);
                var audio = new Audio(window.location.origin + '/sound/error-sound.mp3');
                audio.play(); 
                button.style.backgroundColor = "red";
                button.disabled = true;
                button.classList.add("disabled");
                if (wrongGuess >= maxWrongGuesses) {
                    wrongGuess = 0;
                    showPopup();

                }

            }
        }
    </script>

    <div>

        <div class="logo">
            <img src="img/logo.png" alt="Logo" />
        </div>

        <div id="hangman">
            <img src="img/hang0.gif">
            <img src="img/hang1.gif" style="display: none;">
            <img src="img/hang3.gif" style="display: none;">
            <img src="img/hang4.gif" style="display: none;">
            <img src="img/hang5.gif" style="display: none;">
            <img src="img/hang6.gif" style="display: none;">
            <img src="img/hang6.gif" style="display: none;">
        </div>



        <div id="word">
            @php
                
                $word = strtoupper($word); // randomly selected word from the database
                $size = strlen($word); 
                //echo $word;
                $underscores = str_repeat('_ ', $size); 
                
                for ($i = 0; $i < $size; $i++) {
                    $char = $word[$i];
                    echo '<span id="' . $char . '1">' . '_' . '</span>';
                }
            @endphp





        </div>

        <div class="line-1">
            <button class="button" id="Q" value="Q" onclick="myFunction(this.value, this)">Q</button>
            <button class="button" id="W" value="W" onclick="myFunction(this.value, this)">W</button>
            <button class="button" id="E" value="E" onclick="myFunction(this.value, this)">E</button>
            <button class="button" id="R" value="R" onclick="myFunction(this.value, this)">R</button>
            <button class="button" id="T" value="T" onclick="myFunction(this.value, this)">T</button>
            <button class="button" id="Y" value="Y" onclick="myFunction(this.value, this)">Y</button>
            <button class="button" id="U" value="U" onclick="myFunction(this.value, this)">U</button>
            <button class="button" id="I" value="I" onclick="myFunction(this.value, this)">I</button>
            <button class="button" id="O" value="O" onclick="myFunction(this.value, this)">O</button>
            <button class="button" id="P" value="P" onclick="myFunction(this.value, this)">P</button>
        </div>
        <div class="line-2">
            <button class="button" id="A" value="A" onclick="myFunction(this.value, this)">A</button>
            <button class="button" id="S" value="S" onclick="myFunction(this.value, this)">S</button>
            <button class="button" id="D" value="D" onclick="myFunction(this.value, this)">D</button>
            <button class="button" id="F" value="F" onclick="myFunction(this.value, this)">F</button>
            <button class="button" id="G" value="G" onclick="myFunction(this.value, this)">G</button>
            <button class="button" id="H" value="H" onclick="myFunction(this.value, this)">H</button>
            <button class="button" id="J" value="J" onclick="myFunction(this.value, this)">J</button>
            <button class="button" id="K" value="K" onclick="myFunction(this.value, this)">K</button>
            <button class="button" id="L" value="L" onclick="myFunction(this.value, this)">L</button>
        </div>
        <div class="line-3">

            <button class="button" id="Z" value="Z" onclick="myFunction(this.value, this)">Z</button>
            <button class="button" id="X" value="X" onclick="myFunction(this.value, this)">X</button>
            <button class="button" id="C" value="C" onclick="myFunction(this.value, this)">C</button>
            <button class="button" id="V" value="V" onclick="myFunction(this.value, this)">V</button>
            <button class="button" id="B" value="B" onclick="myFunction(this.value, this)">B</button>
            <button class="button" id="N" value="N" onclick="myFunction(this.value, this)">N</button>
            <button class="button" id="M" value="M" onclick="myFunction(this.value, this)">M</button>

        </div>
    </div>
    <div class="line-4">
        <div class="button-left">
            <button class="btn-green" onclick="newGame()">New Game</button>
        </div>
        <div class="button-right">
            <button class="btn-red" onclick="surrender()">Surrender</button>
        </div>
    </div>


</body>

</html>
