console.log("WELCOME TO WORLD NEWS")
let website = `https://newsapi.org/v2/top-headlines?country=in&category=science&apiKey=4e22589fc4ec4b18bd46a08505a59da8`
let newsAccordian = document.getElementById('newsAccordian')
newsA()

//get Request
function newsA(){
  console.clear()
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `${website}`, true);
  //On Progress

  xhr.onprogress = function(){
    console.log("Your Science News Is Fetching")
    let spin = ``
    let newsAccordian = document.getElementById('newsAccordian')
    let spinHtml = `
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    `
    spin += spinHtml
    newsAccordian.innerHTML = spin
  }

  //ON LOAD

  xhr.onload = function (){
  	if (this.status === 200) {
  		let json = JSON.parse(this.responseText)

      let articles = json.articles;

      console.log(articles)

      let newsHtml = "";
      articles.forEach(function (element, index){


          let news =`
            <div class="card">
              <div class="card-header" id="heading${index}">
                <h2 class="mb-0">
                  <button class="btn btn-link show" type="button" id="mainTxtTit" data-toggle="collapse" data-target="#collapse${index}" aria-expanded="true" aria-controls="collapse${index}">
                  => ${element["title"]}
                  </button>
                </h2>
              </div>
              <div id="collapse${index}" class="collapse" aria-labelledby="heading${index}" data-parent="#newsAccordian">
                <div class="card-body">
                  <p id="mainTxt">${element["content"]}. <a href="${element["url"]}" target="_blank">Read More Here</a></p>
                </div>
              </div>
            </div>
          `
          newsHtml += news;
      })
      newsAccordian.innerHTML = newsHtml;
  	}
  	else{
  		console.log('some thing went Wrong')
  	}
  }
  xhr.send()
}