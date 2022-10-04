// to enable the enqueue of this optional JS file,
// you'll have to uncomment a row in the functions.php file
// just read the comments in there mate
//console.log("Custom js file loaded");


//add here your own js code. Vanilla JS welcome.
function copyToClipboard(text) {

    // Create a "hidden" input
    var aux = document.createElement("input");

    // Assign it the value of the specified element
    aux.setAttribute("value", text);

    // Append it to the body
    document.body.appendChild(aux);

    // Highlight its content
    aux.select();

    // Copy the highlighted text
    document.execCommand("copy");

    // Remove it from the body
    document.body.removeChild(aux);

}

function decodeHTMLEntities(text) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = text;
    return textArea.value;
}

document.querySelectorAll(".code-block .btn-copy").forEach(element => {
    element.addEventListener("click", function (e) {
        let html = decodeHTMLEntities(this.closest(".code-block").querySelector('pre.code').innerHTML);
        copyToClipboard(html);
    })
});






/*
(function ($) {
})(jQuery);
*/