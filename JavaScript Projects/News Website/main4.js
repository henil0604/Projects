let website4 = `https://newsapi.org/v2/top-headlines?country=in&category=sports&apiKey=4e22589fc4ec4b18bd46a08505a59da8`
let newsAccordian4 = document.getElementById('newsAccordian4')
newsD()
//get Request
function newsD(){
  console.clear()
  const xhr4 = new XMLHttpRequest();
  xhr4.open('GET', `${website4}`, true);
  //On progress

  xhr4.onprogress = function(){
    console.log("Your Sports news is Fetching...")
    let spin4 = ``
    let newsAccordian4 = document.getElementById('newsAccordian4')
    let spinHtml4 = `
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    `
    spin4 += spinHtml4
    newsAccordian4.innerHTML = spin4
  }

  //ON LOAD

  xhr4.onload = function (){
  	if(this.status === 200) {
  		let json4 = JSON.parse(this.responseText)

      let articles4 = json4.articles;

      console.log(articles4)

      let newsHtml4 = "";
      articles4.forEach(function (element, index){


          let news4 =`
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
                  <p id="mainTxt">${element["content"]}. <a href="${element["url"]} target="_blank">Read More Here</a></p>
                </div>
              </div>
            </div>
          `
          newsHtml4 += news4;
      })
      newsAccordian4.innerHTML = newsHtml4;
  	}
  	else{
  		console.log('some thing went Wrong')
  	}
  }

  xhr4.send()
}