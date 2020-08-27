function sendMail() {
    var link = "mailto:hapsknowledgemania@gmail.com"
        + "&subject=" + escape("This is my subject")
        + "&body=" + escape("this is body")
        ;

    window.location.href = link;
}