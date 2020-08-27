console.log("Encyption System...");;


var res = ""
var input = document.getElementById('textInput-textArea')
var output = document.getElementById('output-textArea')
var type = document.getElementById('typeSelection-select')


function convert() {
    if (type.value == "Encode") {
        encode()
    } else {
        decode()
    }
}



function encode() {
    var inputText = input.value.split('')
    // console.log(inputText);
    for (let i = 0; i < inputText.length; i++) {
        // console.log(inputText[i]);

        switch (inputText[i]) {

            case '/':
                inputText[i] = "d3e"
                res += inputText[i]
                break

            case '{':
                inputText[i] = "wyd"
                res += inputText[i]
                break

            case '}':
                inputText[i] = "x#e"
                res += inputText[i]
                break

            case '[':
                inputText[i] = "cu@"
                res += inputText[i]
                break

            case ']':
                inputText[i] = "gs@"
                res += inputText[i]
                break

            case '!':
                inputText[i] = "#cf"
                res += inputText[i]
                break

            case '@':
                inputText[i] = "sDf"
                res += inputText[i]
                break

            case '$':
                inputText[i] = "Kgt"
                res += inputText[i]
                break

            case '^':
                inputText[i] = "HSw"
                res += inputText[i]
                break

            case '*':
                inputText[i] = "x#E"
                res += inputText[i]
                break

            case '&':
                inputText[i] = "aswe"
                res += inputText[i]
                break

            case `'`:
                inputText[i] = "sef"
                res += inputText[i]
                break

            case `"`:
                inputText[i] = "Ydf1"
                res += inputText[i]
                break

            case `|`:
                inputText[i] = "xw"
                res += inputText[i]
                break

            case `#`:
                inputText[i] = "xWS3"
                res += inputText[i]
                break

            case ' ':
                inputText[i] = "Aqs"
                res += inputText[i]
                break

            case '(':
                inputText[i] = "weD"
                res += inputText[i]
                break

            case ')':
                inputText[i] = "YSw"
                res += inputText[i]
                break

            case '\n':
                inputText[i] = "we2"
                res += inputText[i]
                break

            case '.':
                inputText[i] = "udH"
                res += inputText[i]
                break

            case ',':
                inputText[i] = "Msd"
                res += inputText[i]
                break

            case 'a':
                inputText[i] = "faw"
                res += inputText[i]
                break

            case 'b':
                inputText[i] = "bnde"
                res += inputText[i]
                break

            case 'c':
                inputText[i] = "tyuk"
                res += inputText[i]
                break

            case 'd':
                inputText[i] = "WdJ3"
                res += inputText[i]
                break

            case 'e':
                inputText[i] = "9YZl"
                res += inputText[i]
                break

            case 'f':
                inputText[i] = "14s"
                res += inputText[i]
                break

            case 'g':
                inputText[i] = "p"
                res += inputText[i]
                break

            case 'h':
                inputText[i] = "Tarj"
                res += inputText[i]
                break

            case 'i':
                inputText[i] = "oPW"
                res += inputText[i]
                break

            case 'j':
                inputText[i] = "aCX"
                res += inputText[i]
                break

            case 'k':
                inputText[i] = "HRW"
                res += inputText[i]
                break

            case 'l':
                inputText[i] = "ZVY"
                res += inputText[i]
                break

            case 'm':
                inputText[i] = "QNa"
                res += inputText[i]
                break

            case 'n':
                inputText[i] = "BOC"
                res += inputText[i]
                break

            case 'o':
                inputText[i] = "IAW"
                res += inputText[i]
                break

            case 'p':
                inputText[i] = "Q4U"
                res += inputText[i]
                break

            case 'q':
                inputText[i] = "WED"
                res += inputText[i]
                break

            case 'r':
                inputText[i] = "0Y3"
                res += inputText[i]
                break

            case 's':
                inputText[i] = "7Ag"
                res += inputText[i]
                break

            case 't':
                inputText[i] = "219"
                res += inputText[i]
                break

            case 'u':
                inputText[i] = "OPX"
                res += inputText[i]
                break

            case 'v':
                inputText[i] = "bNQ"
                res += inputText[i]
                break

            case 'w':
                inputText[i] = "W3S"
                res += inputText[i]
                break

            case 'x':
                inputText[i] = "G0Y"
                res += inputText[i]
                break

            case 'y':
                inputText[i] = "68i"
                res += inputText[i]
                break

            case 'z':
                inputText[i] = "mbL"
                res += inputText[i]
                break

            case 'A':
                inputText[i] = "3GA"
                res += inputText[i]
                break

            case 'B':
                inputText[i] = "Sas2"
                res += inputText[i]
                break

            case 'C':
                inputText[i] = "JdeF"
                res += inputText[i]
                break

            case 'D':
                inputText[i] = "1cd"
                res += inputText[i]
                break

            case 'E':
                inputText[i] = "6kfW"
                res += inputText[i]
                break

            case 'F':
                inputText[i] = "QYf"
                res += inputText[i]
                break

            case 'G':
                inputText[i] = "Fukl"
                res += inputText[i]
                break

            case 'H':
                inputText[i] = "PWs"
                res += inputText[i]
                break

            case 'I':
                inputText[i] = "91x"
                res += inputText[i]
                break

            case 'J':
                inputText[i] = "He3"
                res += inputText[i]
                break

            case 'K':
                inputText[i] = "EnC"
                res += inputText[i]
                break

            case 'L':
                inputText[i] = "xdW"
                res += inputText[i]
                break

            case 'M':
                inputText[i] = "FjA"
                res += inputText[i]
                break

            case 'N':
                inputText[i] = "MSA"
                res += inputText[i]
                break

            case 'O':
                inputText[i] = "AGJ"
                res += inputText[i]
                break

            case 'P':
                inputText[i] = "arK"
                res += inputText[i]
                break

            case 'Q':
                inputText[i] = "Pga"
                res += inputText[i]
                break

            case 'R':
                inputText[i] = "Awh"
                res += inputText[i]
                break

            case 'S':
                inputText[i] = "Kag"
                res += inputText[i]
                break

            case 'T':
                inputText[i] = "swj"
                res += inputText[i]
                break

            case 'U':
                inputText[i] = "Qjd"
                res += inputText[i]
                break

            case 'V':
                inputText[i] = "Akd"
                res += inputText[i]
                break

            case 'W':
                inputText[i] = "Isw"
                res += inputText[i]
                break

            case 'X':
                inputText[i] = "Oao"
                res += inputText[i]
                break

            case 'Y':
                inputText[i] = "Wqw"
                res += inputText[i]
                break

            case 'Z':
                inputText[i] = "Laq"
                res += inputText[i]
                break

            case '1':
                inputText[i] = "2xe"
                res += inputText[i]
                break

            case '2':
                inputText[i] = "qPk"
                res += inputText[i]
                break

            case '3':
                inputText[i] = "7fH"
                res += inputText[i]
                break

            case '4':
                inputText[i] = "asj"
                res += inputText[i]
                break

            case '5':
                inputText[i] = "kUa"
                res += inputText[i]
                break

            case '6':
                inputText[i] = "qwA"
                res += inputText[i]
                break

            case '7':
                inputText[i] = "Qoi"
                res += inputText[i]
                break

            case '8':
                inputText[i] = "2ts"
                res += inputText[i]
                break

            case '9':
                inputText[i] = "O0a"
                res += inputText[i]
                break

            case '0':
                inputText[i] = "Aqk"
                res += inputText[i]
                break

        }

    }

    // console.log(res);
    output.value = res
    res = ""
}



function decode() {
    var inputText = input.value.split(' ')
    console.log(inputText);
    for (let i = 0; i < inputText.length; i++) {
        // console.log(inputText[i]);

        switch (inputText[i]) {

            case 'd3e':
                inputText[i] = "/"
                res += inputText[i]
                break

            case 'wyd':
                inputText[i] = "{"
                res += inputText[i]
                break

            case '}':
                inputText[i] = "x#e"
                res += inputText[i]
                break

            case '[':
                inputText[i] = "cu@"
                res += inputText[i]
                break

            case ']':
                inputText[i] = "gs@"
                res += inputText[i]
                break

            case '!':
                inputText[i] = "#cf"
                res += inputText[i]
                break

            case '@':
                inputText[i] = "sDf"
                res += inputText[i]
                break

            case '$':
                inputText[i] = "Kgt"
                res += inputText[i]
                break

            case '^':
                inputText[i] = "HSw"
                res += inputText[i]
                break

            case '*':
                inputText[i] = "x#E"
                res += inputText[i]
                break

            case '&':
                inputText[i] = "aswe"
                res += inputText[i]
                break

            case `'`:
                inputText[i] = "sef"
                res += inputText[i]
                break

            case `"`:
                inputText[i] = "Ydf1"
                res += inputText[i]
                break

            case `|`:
                inputText[i] = "xw"
                res += inputText[i]
                break

            case `#`:
                inputText[i] = "xWS3"
                res += inputText[i]
                break

            case ' ':
                inputText[i] = "Aqs"
                res += inputText[i]
                break

            case '(':
                inputText[i] = "weD"
                res += inputText[i]
                break

            case ')':
                inputText[i] = "YSw"
                res += inputText[i]
                break

            case '\n':
                inputText[i] = "we2"
                res += inputText[i]
                break

            case '.':
                inputText[i] = "udH"
                res += inputText[i]
                break

            case ',':
                inputText[i] = "Msd"
                res += inputText[i]
                break

            case 'a':
                inputText[i] = "faw"
                res += inputText[i]
                break

            case 'b':
                inputText[i] = "bnde"
                res += inputText[i]
                break

            case 'c':
                inputText[i] = "tyuk"
                res += inputText[i]
                break

            case 'd':
                inputText[i] = "WdJ3"
                res += inputText[i]
                break

            case 'e':
                inputText[i] = "9YZl"
                res += inputText[i]
                break

            case 'f':
                inputText[i] = "14s"
                res += inputText[i]
                break

            case 'g':
                inputText[i] = "p"
                res += inputText[i]
                break

            case 'h':
                inputText[i] = "Tarj"
                res += inputText[i]
                break

            case 'i':
                inputText[i] = "oPW"
                res += inputText[i]
                break

            case 'j':
                inputText[i] = "aCX"
                res += inputText[i]
                break

            case 'k':
                inputText[i] = "HRW"
                res += inputText[i]
                break

            case 'l':
                inputText[i] = "ZVY"
                res += inputText[i]
                break

            case 'm':
                inputText[i] = "QNa"
                res += inputText[i]
                break

            case 'n':
                inputText[i] = "BOC"
                res += inputText[i]
                break

            case 'o':
                inputText[i] = "IAW"
                res += inputText[i]
                break

            case 'p':
                inputText[i] = "Q4U"
                res += inputText[i]
                break

            case 'q':
                inputText[i] = "WED"
                res += inputText[i]
                break

            case 'r':
                inputText[i] = "0Y3"
                res += inputText[i]
                break

            case 's':
                inputText[i] = "7Ag"
                res += inputText[i]
                break

            case 't':
                inputText[i] = "219"
                res += inputText[i]
                break

            case 'u':
                inputText[i] = "OPX"
                res += inputText[i]
                break

            case 'v':
                inputText[i] = "bNQ"
                res += inputText[i]
                break

            case 'w':
                inputText[i] = "W3S"
                res += inputText[i]
                break

            case 'x':
                inputText[i] = "G0Y"
                res += inputText[i]
                break

            case 'y':
                inputText[i] = "68i"
                res += inputText[i]
                break

            case 'z':
                inputText[i] = "mbL"
                res += inputText[i]
                break

            case 'A':
                inputText[i] = "3GA"
                res += inputText[i]
                break

            case 'B':
                inputText[i] = "Sas2"
                res += inputText[i]
                break

            case 'C':
                inputText[i] = "JdeF"
                res += inputText[i]
                break

            case 'D':
                inputText[i] = "1cd"
                res += inputText[i]
                break

            case 'E':
                inputText[i] = "6kfW"
                res += inputText[i]
                break

            case 'F':
                inputText[i] = "QYf"
                res += inputText[i]
                break

            case 'G':
                inputText[i] = "Fukl"
                res += inputText[i]
                break

            case 'H':
                inputText[i] = "PWs"
                res += inputText[i]
                break

            case 'I':
                inputText[i] = "91x"
                res += inputText[i]
                break

            case 'J':
                inputText[i] = "He3"
                res += inputText[i]
                break

            case 'K':
                inputText[i] = "EnC"
                res += inputText[i]
                break

            case 'L':
                inputText[i] = "xdW"
                res += inputText[i]
                break

            case 'M':
                inputText[i] = "FjA"
                res += inputText[i]
                break

            case 'N':
                inputText[i] = "MSA"
                res += inputText[i]
                break

            case 'O':
                inputText[i] = "AGJ"
                res += inputText[i]
                break

            case 'P':
                inputText[i] = "arK"
                res += inputText[i]
                break

            case 'Q':
                inputText[i] = "Pga"
                res += inputText[i]
                break

            case 'R':
                inputText[i] = "Awh"
                res += inputText[i]
                break

            case 'S':
                inputText[i] = "Kag"
                res += inputText[i]
                break

            case 'T':
                inputText[i] = "swj"
                res += inputText[i]
                break

            case 'U':
                inputText[i] = "Qjd"
                res += inputText[i]
                break

            case 'V':
                inputText[i] = "Akd"
                res += inputText[i]
                break

            case 'W':
                inputText[i] = "Isw"
                res += inputText[i]
                break

            case 'X':
                inputText[i] = "Oao"
                res += inputText[i]
                break

            case 'Y':
                inputText[i] = "Wqw"
                res += inputText[i]
                break

            case 'Z':
                inputText[i] = "Laq"
                res += inputText[i]
                break

            case '1':
                inputText[i] = "2xe"
                res += inputText[i]
                break

            case '2':
                inputText[i] = "qPk"
                res += inputText[i]
                break

            case '3':
                inputText[i] = "7fH"
                res += inputText[i]
                break

            case '4':
                inputText[i] = "asj"
                res += inputText[i]
                break

            case '5':
                inputText[i] = "kUa"
                res += inputText[i]
                break

            case '6':
                inputText[i] = "qwA"
                res += inputText[i]
                break

            case '7':
                inputText[i] = "Qoi"
                res += inputText[i]
                break

            case '8':
                inputText[i] = "2ts"
                res += inputText[i]
                break

            case '9':
                inputText[i] = "O0a"
                res += inputText[i]
                break

            case '0':
                inputText[i] = "Aqk"
                res += inputText[i]
                break

        }

    }

    // console.log(res);
    output.value = res
    res = ""
}