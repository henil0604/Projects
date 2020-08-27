
function newsF(){
	var localURL = localStorage.getItem('url')
	urlInput.innerHTML = localURL
	let urlInput = document.getElementById('urlInput').value
	let website6 = `${urlInput}`
	if (urlInput=="") {
		window.alert("Please Input Custom URL First")
	}
	else{
	localStorage.setItem('url', urlInput)
  const xhr6 = new XMLHttpRequest();
  xhr6.open('GET', `${website6}`, true);

  //On progress

  xhr6.onprogress = function(){
    console.log("Your Custom news is Fetching...")
    let spin6 = ``
    let newsAccordian6 = document.getElementById('newsAccordian6')
    let spinHtml6 = `
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    `
    spin6 += spinHtml6
    newsAccordian6.innerHTML = spin6
  }

  //ON LOAD

  xhr6.onload = function (){
  	if (this.status === 200) {
  		let json6 = JSON.parse(this.responseText)

      let articles6 = json6.articles;

      console.log(articles6)

      let newsHtml6 = "";
      articles6.forEach(function (element, index){
          let news6 =`
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
          newsHtml6 += news6;
      })
      newsAccordian6.innerHTML = newsHtml6;
  	}
  	else{
  		console.log('some thing went Wrong')
  	}
  }

  xhr6.send()
	}
}