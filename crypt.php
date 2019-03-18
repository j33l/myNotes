<html>
<script>

let cipher = salt => {
    let textToChars = text => text.split('').map(c => c.charCodeAt(0))
    let byteHex = n => ("0" + Number(n).toString(16)).substr(-2)
    let applySaltToChar = code => textToChars(salt).reduce((a,b) => a ^ b, code)    

    return text => text.split('')
        .map(textToChars)
        .map(applySaltToChar)
        .map(byteHex)
        .join('')
}

let decipher = salt => {
    let textToChars = text => text.split('').map(c => c.charCodeAt(0))
    let saltChars = textToChars(salt)
    let applySaltToChar = code => textToChars(salt).reduce((a,b) => a ^ b, code)
    return encoded => encoded.match(/.{1,2}/g)
        .map(hex => parseInt(hex, 16))
        .map(applySaltToChar)
        .map(charCode => String.fromCharCode(charCode))
        .join('')
}

function changeIt(psw, inp) {
  
// To create a cipher
let myCipher = cipher(psw)
//Then cipher any text:
myCipher(inp)   // --> "7c606d287b6d6b7a6d7c287b7c7a61666f"

//To decipher, you need to create a decipher and use it:
let myDecipher = decipher(psw)
myDecipher(myCipher(inp))    // --> 'the secret string'
//console.log(myCipher(inp) );
//console.log(myDecipher(myCipher(inp)));
return myCipher(inp);
}

function changeItBack(inp, psw) {
  
// To create a cipher
let myCipher = cipher(psw)
//Then cipher any text:
myCipher(inp)   // --> "7c606d287b6d6b7a6d7c287b7c7a61666f"


let myDecipher = decipher(psw)
myDecipher(inp)    // --> 'the secret string'
//console.log(myCipher(inp) );
//console.log(myDecipher(myCipher(inp)));
return myDecipher(inp);
}
</script>
</html>
