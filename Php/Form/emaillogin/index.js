let response = document.getElementById('response')
response.innerHTML = `Loading...`
newsResponse()

function newsResponse() {

    const country = document.getElementById('country-input')
    const catagory = document.getElementById('catagory-input')
    const api = "4e22589fc4ec4b18bd46a08505a59da8"
    if (api == "") {
        window.alert("First input Api Key")
    } else {
        var pattern = `https://newsapi.org/v2/top-headlines?country=${country.value}&category=${catagory.value}&apiKey=${api}`
        var pattern2 = `https://newsapi.org/v2/top-headlines?country=${country.value}&apiKey=${api}`
        if (catagory.value == "Top") {
            pattern = ""
            pattern += pattern2
        }

        console.log(pattern);

        var xhr7 = new XMLHttpRequest();
        xhr7.open('GET', `${pattern}`, true);
        //On Progress

        xhr7.onprogress = function onprogress() {
            console.log(`We Are Sending a Request to the Server For Your ${catagory.value} News.`)
            let response = document.getElementById('response')
            response.innerHTML = "";
            let spin7 = ``
            let response7 = document.getElementById('Response')
            response7.scrollIntoView()
            let spinHtml7 = `
            <div class="spinner-border text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            `
            spin7 += spinHtml7
            response7.innerHTML = spin7

            let refreshMainDiv = document.getElementById('refreshMainDiv')
            let refreshMainDivEmptyHTML = ``
            let refreshMainDivHTML = `
            <div id="refrash">
              <img onclick="newsResponse()" onmouseover="refreshHover()" onmouseout="refreshHoverOut()" class="Refresh" src="refresh.png"></img>
              </button>
              <br><br>
              <h6 class="card-subtitle mb-2 text-muted" id="refreshAlt"></h6>
            </div>
          `
            refreshMainDivEmptyHTML += refreshMainDivHTML;
            refreshMainDiv.innerHTML = refreshMainDivEmptyHTML;
        }

        //ON LOAD

        xhr7.onload = function (element) {
            if (this.status === 200) {
                let json7 = JSON.parse(this.responseText)

                let articles7 = json7.articles;
                let response7 = document.getElementById('Response')

                let totalResultsJSON = json7
                let totalResults = document.getElementById('totalResults')
                let totResultHTML = `
                <h6 class="card-subtitle mb-2 text-muted my-2">Total <b>${totalResultsJSON["totalResults"]}</b> Found but we can show you <b>${articles7.length}</b> results.</h6>
              `
                totalResults.innerHTML = totResultHTML;
                let newsHtml7 = "";
                articles7.forEach(function (element, index) {
                    if (element["content"] == null) {
                        let news7 = `
                    <div class="card mx-2 my-2" style="width: 32rem;">
                    <img src="${element["urlToImage"]}" style="max-height:300px " class="card-img-top"  alt="World Custom News">
                    <div class="card-body">
                        <h5 class="card-title">${element["title"]}</h5>
                        <p class="card-text" style="color:red;">Could not get this Content But You can <a id="scroll3" target="_blank" href="${element["url"]}" class="card-link">Read More Here</a></p>
                    </div>
                    </div>
                        `
                        newsHtml7 += news7;
                    }

                    else if (element["content"] == "") {
                        let news7 = `
                    <div class="card mx-2 my-2" style="width: 32rem;">
                    <img src="${element["urlToImage"]}" style="max-height:300px " class="card-img-top"  alt="World Custom News">
                    <div class="card-body">
                        <h5 class="card-title">${element["title"]}</h5>
                        <p class="card-text" style="color:red;">Could not get this Content But You can <a id="scroll3" target="_blank" href="${element["url"]}" class="card-link">Read More Here</a></p>
                    </div>
                    </div>
                        `
                        newsHtml7 += news7;
                    }

                    else if (element["content"] == "Subscribe Start Your Daily Mornings with Times of India Newspaper!Order Now") {
                        let news7 = `
                    <div class="card mx-2 my-2" style="width: 32rem;">
                    <img src="${element["urlToImage"]}" style="max-height:300px " class="card-img-top"  alt="World Custom News">
                    <div class="card-body">
                        <h5 class="card-title">${element["title"]}</h5>
                        <p class="card-text" style="color:red;">The content is written for a Bussinuss Purpose so we can't show this but You can <a href="${element["url"]}">Read More Here</a></a></p>
                    </div>
                    </div>
                        `
                        newsHtml7 += news7;
                    }

                    else {
                        let news7 = `
                    <div class="card mx-2 my-2" style="width: 32rem;">
                    <img src="${element["urlToImage"]}" style="max-height:300px " class="card-img-top" alt="World Custom News">
                    <div class="card-body">
                        <h5 class="card-title">${element["title"]}</h5>
                        <p class="card-text">${element["content"]}</p>
                        <a href="${element["url"]}" target="_blank" class="btn btn-primary">Read More</a>
                    </div>
                    </div>
                  `

                        newsHtml7 += news7;
                    }
                })
                response7.innerHTML = newsHtml7;

            }
            else {
                console.error(`${this.status} error occured!!! We will try to solve This Error!!!`)
                let response7 = document.getElementById('Response')
                response7.innerHTML = `${this.status} error occured!!! We will try to solve This Error!!!.`
                let totalResults = document.getElementById('totalResults')
                totalResults.innerHTML = ""
                let response = document.getElementById('response')
                response.innerHTML = ""
            }
        }
        xhr7.send()
        setTimeout(() => {
            window.scrollTo(0, 10);
        }, 1000);
    }
}
function feedbackResponse() {
    var feedbackResponseDiv = document.getElementById('feedbackResponseDiv')
    let feedbackResponseDivHTML = `
        <form method="POST" action="">
          <hr style="height: 1px; background-color: black;">
          <button type="button" onclick="feedBackClose()" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button> 
            <h3 class="card-subtitle mb-2 text-muted my-2">Feedback:</h3>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Feedback</span>
              </div>
              <textarea name="feedback" id="feedBackInput" type="text" class="form-control" style="min-height: 50px; min-width: 200px; max-height: 200px; height: 60px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter Your Feedback/Suggession/Bug Report Here"></textarea>
              <br><br>
              <button name="feedbacksubmit" class="btn btn-primary btn-sm" id="feedbackSubmitButton">Submit Feedback</button>
            </div>
            <br>
            <h5 id="feedbackResponseValue" class="card-subtitle mb-2 text-muted my-2"></h5>
            <br id="scroll2"><br>
        </form>
        `
    feedbackResponseDiv.innerHTML = feedbackResponseDivHTML
}
function feedBackSubmit(e) {
    e.preventDefault();
    var feedBackInput = document.getElementById('feedBackInput').value
    var feedbackResponseValue = document.getElementById('feedbackResponseValue')
    if (feedBackInput == "") {
        console.error("First Input Feedback")
    }
    else if (feedBackInput.length < 3) {
        console.error("Your Feedback is not sufficient!")
    }
    else {
        feedbackResponseValue.innerHTML = `
            Your Feedback:- ${feedBackInput}
          `
        localStorage.setItem('Feedback', feedBackInput)
        window.alert("Thanks For Your Feedback")
    }
}
function lastFeedBack(e) {
    e.preventDefault()
    var feedbackResponseValue = document.getElementById('feedbackResponseValue')
    var lastFeedBackValue = localStorage.getItem('Feedback')
    if (lastFeedBackValue === null) {
        lastFeedBackValue = "You had not add any Feedback Last time!"
    }
    feedbackResponseValue.innerHTML = `
          Your Last Feedback was:- ${lastFeedBackValue}
        `
}
function feedBackClose() {
    var feedbackResponseDiv = document.getElementById('feedbackResponseDiv')
    feedbackResponseDiv.innerHTML = ""
    let scroll = document.getElementById('MadeBy');
    scroll.scrollIntoView({ behavior: "smooth" })
}
function refreshHover() {
    let refreshAlt = document.getElementById('refreshAlt')
    refreshAlt.innerHTML = "Refresh ?"
}
function refreshHoverOut() {
    let refreshAlt = document.getElementById('refreshAlt')
    refreshAlt.innerHTML = ""
}
function copyApiKey() {
    var apiInput = document.getElementById('Apikey-input')
    apiInput.select()
    apiInput.setSelectionRange(0, 999999999)
    document.execCommand('copy')
    setTimeout(() => {
        alert("API key Copied: " + apiInput.value)
    }, 500);
    console.info("API key Copied: " + apiInput.value)
}

function mainHome() {
    let scroll5 = document.getElementById('scrollIsThis');
    scroll5.scrollIntoView({ behavior: 'smooth' })
}

function faq2() {
    let scroll = document.getElementById('how-to-use')
    scroll.scrollIntoView({ behavior: 'smooth' })
}