console.log("This is World Library")

//Constructor
function Book(name, author, type) {
	this.name = name
	this.author = author;
	this.type = type;
}

//display Function
function Display() {

}

//add method
Display.prototype.add = function (book) {
	console.log("Adding To UI...")
	tableBody = document.getElementById('tableBody')
	let uiString = `
		<tr>
            <td>${book.name}</td>
            <td>${book.author}</td>
            <td>${book.type}</td>
        </tr>`
	tableBody.innerHTML += uiString
}

Display.prototype.clear = function () {
	let libraryForm = document.getElementById('libraryForm')
	libraryForm.reset();
}

Display.prototype.validate = function (book) {
	if (book.name.length < 2 || book.author.length < 2 || book.name.length > 20 || book.author.length > 20) {
		return false
	}
	else {
		return true
	}
}

Display.prototype.show = function (type, tit, displaymassage) {
	let message = document.getElementById('message')
	message.innerHTML = `
	<div class="alert alert-${type} alert-dismissible fade show" role="alert">
        <strong>${tit}!</strong> ${displaymassage}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
	`
	setTimeout(function () {
		message.innerHTML = ""
	}, 3000)
}

//add submit event listener
let libraryForm = document.getElementById('libraryForm')
libraryForm.addEventListener('submit', libraryFormSubmit)

function libraryFormSubmit(e) {
	e.preventDefault()
	console.log("You Have submitted Library Form")
	let name = document.getElementById('bookName').value;
	let author = document.getElementById('author').value;
	let type;
	let fiction = document.getElementById('fiction')
	let programming = document.getElementById('programming')
	let cooking = document.getElementById('cooking')

	if (fiction.checked) {
		type = fiction.value;
	}
	else if (programming.checked) {
		type = programming.value;
	}
	else if (cooking.checked) {
		type = cooking.value;
	}


	let book = new Book(name, author, type)

	let display = new Display();
	if (display.validate(book)) {
		console.log(book)
		display.add(book)
		display.clear()
		display.show('success', 'Success', 'Your Book is Successfully Added.')
	}
	else {
		display.show('danger', 'Failed', 'Sorry You cannot add this Book.')
	}

}