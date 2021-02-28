function extractLinks(){
	let links = document.getElementsByTagName("a");
	let links_array = [];
	for(let i = 0; i < links.length; i++){
		if(links[i].href.length > 0){
			let link_obj = {};
			link_obj['index'] = i;
			link_obj['href'] = links[i].href;
			links_array.push(link_obj);
		}
	}
	let jsonObject = JSON.stringify(links_array);
}
