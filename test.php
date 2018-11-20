<!DOCTYPE html>
    <html>

    <head>


         <meta charset="utf-8" />
<script type="text/javascript" language="JavaScript">
    function shuffle(array) {
        var counter = array.length;

        // While there are elements in the array
        while (counter > 0) {
            // Pick a random index
            var index = Math.floor(Math.random() * counter);

            // Decrease counter by 1
            counter--;

            // And swap the last element with it
            var temp = array[counter];
            array[counter] = array[index];
            array[index] = temp;
        }

        return array;
    }


    Object.defineProperty(Array.prototype, 'chunk_inefficient', {
        value: function(chunkSize) {
            var array=this;
            return [].concat.apply([],
                array.map(function(elem,i) {
                    return i%chunkSize ? [] : [array.slice(i,i+chunkSize)];
                })
            );
        }
    });


    var words = ["mandate" , "encourage" , "kingsmen"];
    var wordsToShuffledLettersArray = shuffle(words.join("").split(""));
    var wordsDivided = wordsToShuffledLettersArray.chunk_inefficient(Math.round(wordsToShuffledLettersArray.length / 3));




</script>
    </head>
    <body>
    </body>
    </html>