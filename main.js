function handleLoad() {
	handleResize();
	window.onscroll = handleScroll;
}


function handleResize() {
	var b = document.body; // clientWidth
	var i = document.getElementsByTagName('img')[0]; // width
	var a = document.getElementsByTagName('article')[0];
	var c = i.naturalWidth/i.naturalHeight;	//Image ratio (4:3, 16:9)
	var fsStyle = "fs";

	//Is article wrapped?
	if (a.offsetLeft <= a.offsetTop && window.innerHeight/window.innerWidth < i.height/i.width) {
		if(i.classList.contains(fsStyle) == false && b.clientWidth > i.width) {
			i.classList.add(fsStyle);
			a.classList.add(fsStyle);
			window.scrollTo(0, 0);
		}
		else if(i.className.indexOf(fsStyle) != -1 && window.innerHeight * c + a.clientWidth + 50 < window.innerWidth) {
			i.classList.remove(fsStyle);
			a.classList.remove(fsStyle);
		}
	}
	else {
		i.classList.remove(fsStyle);
		a.classList.remove(fsStyle);
	}
}


function handleScroll() {
	var i = document.getElementsByTagName('img')[0];
	if(i.className.indexOf("fs") == -1) return;
	
	var imgOffset = (i.height - window.innerHeight)/(document.documentElement.scrollHeight - document.documentElement.clientHeight);
	i.style.top = -document.documentElement.scrollTop * imgOffset + "px";
}