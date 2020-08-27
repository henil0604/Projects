let website2 = `https://newsapi.org/v2/top-headlines?country=in&category=health&apiKey=4e22589fc4ec4b18bd46a08505a59da8`
// https://newsapi.org/v2/top-headlines?sources=bbc-news&apikey=4e22589fc4ec4b18bd46a08505a59da8
let newsAccordian2 = document.getElementById('newsAccordian2')
newsB()
//get Request
function newsB(){
  console.clear()
  const xhr2 = new XMLHttpRequest();
  xhr2.open('GET', `${website2}`, true);
  //On progress

  xhr2.onprogress = function(){
    console.log("Your Health news is Fetching...")
    let spin2 = ``
    let newsAccordian2 = document.getElementById('newsAccordian2')
    let spinHtml2 = `
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    `
    spin2 += spinHtml2
    newsAccordian2.innerHTML = spin2
  }

  //ON LOAD

  xhr2.onload = function (){
  	if (this.status === 200) {
  		let json2 = JSON.parse(this.responseText)

      let articles2 = json2.articles;

      console.log(articles2)

      let newsHtml2 = "";
      articles2.forEach(function (element, index){
          let news2 =`
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
          newsHtml2 += news2;
      })
      newsAccordian2.innerHTML = newsHtml2;
  	}
  	else{
  		console.log('some thing went Wrong')
  	}
  }

  xhr2.send()
} 