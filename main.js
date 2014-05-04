
var fsStyle = "fs";

function handleLoad(screenSize) {
	//Initial load, session not found, determine viewport max size and reload
	if(screenSize == undefined) {
		window.location.href = "?screen=" + Math.max(window.screen.availWidth, window.screen.availHeight);
		return;
	}
	
	console.log("Screen size: " + screenSize);
	handleResize();
	
	//IE needs this
	window.onscroll = handleScroll;
}


function handleResize() {
	var b = document.body;
	var i = document.getElementsByTagName('img')[0];
	var a = document.getElementsByTagName('aside')[0];
	var c = i.naturalWidth/i.naturalHeight;	//Image ratio (4:3, 16:9)
	
	//Executed from main page, nothing to do
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
	
	//Not in full screen mode, no handling needed
	if(i.className.indexOf(fsStyle) == -1) return;
	
	var imgOffset = (i.height - window.innerHeight)/(getMaxScrollY());
	i.style.top = -getScrollTop() * imgOffset + "px";
	
	//console.log("SCROLL: Image (H=" + i.height + "), Window (H=" + getClientHeight() + "), Scroll (H=" + getScrollHeight() + ")");
}

function handleRoll(isFull) {
	var a = document.getElementsByTagName('aside')[0];
	var step = 10;
	
	//Not in full screen mode, no handling needed
	if(a.className.indexOf(fsStyle) == -1) return;
	
	//Is this initial launch? Determine direction
	if(isFull == undefined) isFull = (getScrollHeight() - a.offsetHeight - 2*step) <= getScrollTop() || getScrollTop() >= getMaxScrollY();
	
	window.scrollBy(0, isFull?-step:step);
	//console.log("ROLLING: " + isFull + "; " + getClientHeight() + "; " + getScrollHeight() + "; " + getScrollTop());
	
	if(isFull == false && (getScrollHeight() - a.offsetHeight - 2*step) > getScrollTop() && getScrollTop() < getMaxScrollY()) {
		setTimeout(function(){ handleRoll(isFull); }, 10);
		return;
	}
	
	if(isFull == true && getScrollTop() > 0) {
		setTimeout(function(){ handleRoll(isFull); }, 10);
		return;
	}
}

function getScrollHeight() {
	return Math.max(document.documentElement.scrollHeight, document.body.scrollHeight);
}

function getScrollTop() {
	return Math.max(document.documentElement.scrollTop, document.body.scrollTop);
}

function getMaxScrollY() {
	return getScrollHeight() - window.innerHeight;
}

