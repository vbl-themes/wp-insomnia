function handleLoad(screenSize) {
	if(screenSize == undefined) {
		window.location.href = "?screen=" + Math.max(window.screen.availWidth, window.screen.availHeight);
		return;
	}
	
	console.log("SCREEN SIZE: " + screenSize);
	
	handleResize();
	window.onscroll = handleScroll;
}


function handleResize() {
	var b = document.body; // clientWidth
	var i = document.getElementsByTagName('img')[0]; // width
	var a = document.getElementsByTagName('aside')[0];
	var c = i.naturalWidth/i.naturalHeight;	//Image ratio (4:3, 16:9)
	var fsStyle = "fs";
	
	if(a == undefined) return;
	
	//Resizing via classlist not supported
	if(i.classList == undefined) return;

	//Is article wrapped?
	if (a.offsetLeft <= a.offsetTop && window.innerHeight/window.innerWidth < i.height/i.width) {
		if(i.className.indexOf(fsStyle) == -1 && b.clientWidth >= i.width) {
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
	
	
	var imgOffset = (i.height - getClientHeight())/(getScrollHeight() - getClientHeight());
	i.style.top = -getScrollTop() * imgOffset + "px";
	
	console.log("SCROLL: Image (H=" + i.height + "), Window (H=" + getClientHeight() + "), Scroll (H=" + getScrollHeight() + ")");
}

function getScrollHeight() {
	if(document.documentElement.scrollHeight > 0) return document.documentElement.scrollHeight;
	if(document.body.scrollHeight > 0) return document.body.scrollHeight;
}

function getScrollTop() {
	if(document.documentElement.scrollTop > 0) return document.documentElement.scrollTop;
	if(document.body.scrollTop > 0) return document.body.scrollTop;
}

function getClientHeight() {
	return window.innerHeight;
}

