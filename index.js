async function getResponse(){
	let response = await fetch('http://localhost/dinamic-site/select.json')
	let content = await response.text()
	console.log(content)
}

getResponse()