var isDarkBackground = false;
var darkBackgroundClass = 'darkBackground';
function switchBackground() {
	var body = document.getElementsByTagName('body')[0];
	if (isDarkBackground) {
		body.classList.remove(darkBackgroundClass);
	
	} else {
		body.classList.add(darkBackgroundClass);
	}
	isDarkBackground = !isDarkBackground;
}