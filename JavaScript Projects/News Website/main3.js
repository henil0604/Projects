let website3 = `https://newsapi.org/v2/top-headlines?country=in&category=technology&apiKey=4e22589fc4ec4b18bd46a08505a59da8`
// https://newsapi.org/v2/top-headlines?sources=bbc-news&apikey=4e22589fc4ec4b18bd46a08505a59da8
let newsAccordian3 = document.getElementById('newsAccordian3')
newsC()
//get Request
function newsC(){
  console.clear()
  const xhr3 = new XMLHttpRequest();
  xhr3.open('GET', `${website3}`, true);

  //On progress

  xhr3.onprogress = function(){
    console.log("Your Technology news is Fetching...")
    let spin3 = ``
    let newsAccordian3 = document.getElementById('newsAccordian3')
    let spinHtml3 = `
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    `
    spin3 += spinHtml3
    newsAccordian3.innerHTML = spin3
  }

  //ON LOAD

  xhr3.onload = function (){
  	if (this.status === 200) {
  		let json3 = JSON.parse(this.responseText)

      let articles3 = json3.articles;

      console.log(articles3)

      let newsHtml3 = "";
      articles3.forEach(function (element, index){


          let news3 =`
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
          newsHtml3 += news3;
      })
      newsAccordian3.innerHTML = newsHtml3;
  	}
  	else{
  		console.log('some thing went Wrong')
  	}
  }

  xhr3.send()
}