let website5 = `https://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=4e22589fc4ec4b18bd46a08505a59da8`
let newsAccordian5 = document.getElementById('newsAccordian5')
newsE()
//get Request

function newsE(){
  console.clear()
  const xhr5 = new XMLHttpRequest();
  xhr5.open('GET', `${website5}`, true);
  //On progress

  xhr5.onprogress = function(){
    console.log("Your Business news is Fetching...")
    let spin5 = ``
    let newsAccordian5 = document.getElementById('newsAccordian5')
    let spinHtml5 = `
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    `
    spin5 += spinHtml5
    newsAccordian5.innerHTML = spin5
  }

  //ON LOAD

  xhr5.onload = function (){
  	if(this.status === 200) {
  		let json5 = JSON.parse(this.responseText)

      let articles5 = json5.articles;

      console.log(articles5)

      let newsHtml5 = "";
      articles5.forEach(function (element, index){


          let news5 =`
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
          newsHtml5 += news5;
      })
      newsAccordian5.innerHTML = newsHtml5;
  	}
  	else{
  		console.log('some thing went Wrong')
  	}
  }

  xhr5.send()
}