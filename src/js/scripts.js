	// SLIDER

// Pour savoir si .animatedWrap dépasse
var isOut = true;
// Pour savoir si le slider est activé
var sliderOn = false;

//attribue la taille du contenu animé à son conteneur
var imgWidth = $(".animatedWrap img").width();

// Prend la hauteur du bloc animé
var animHeight = $(".animatedWrap").height();

// Prend la largeur du bloc animé
var animWidth = $(".animatedWrap").width();

// Prend la largeur de la fenêtre
var windowWidth = $(window).width();

// Prend la hauteur de la fenêtre
var windowHeight = $(window).height();

// Pour savoir si le bloc animé dépasse du viewport
var dep = imgWidth - windowWidth;

// Ce qui n'est pas animé dans le conteneur mais doit quand même être pris en compte
var enPlus = $(".stickyContained .sectionTitleContainer").height();

// Bloc à partir duquel on veut que l'animation commence
var animPos = $(".photoSection").offset().top;

// Juste pour savoir où est le haut du viewport dans le document
var scroll = $(window).scrollTop();

//Pour savoir si le conteneur à partir duquel l'animatin commence a atteint le viewport
var inView = (scroll > animPos);

// Si le scroll est plus grand que la taille de ce qui dépasse + la position de l'image, pour savoir quand l'animation doit s'arrêter
var stop = (scroll  > animPos + animWidth - windowWidth);

// la quantité de pixels à retirer en margin
var distance = (scroll - animPos);

// détermine la hauteur du conteneur stikcy pour avoir le temps d'animer et que ça s'arrête au bon moment
var blockToHeight = enPlus + animHeight + animWidth - windowWidth;

	// BARRE

// Le conteneur des barres à 100%
var barreFullWidth = parseInt($('.fullBarre').css("width"));

// BARRES WORDPRESS

// Position du bloc à partir duquel l'animation commence.
var barreWordpressPos =  ($(".wordpress").offset().top) - windowHeight;

// Pour savoir si le bloc à partir duquel on veut que l'animation commence est dans le viewport
var barreWordpressInView = (scroll > barreWordpressPos);
var barreWordpressOutView = ((scroll + windowHeight/2) > barreWordpressPos);

// Le scroll ajoute 1px à chaque fois
var barreWordpressToScroll = (scroll - barreWordpressPos);

// Pour obtenir le max width de la barre en pixels et pouvoir arrêter au bon moment
var barreWordpressMaxWidth = parseInt($('.wordpress').css("max-width"));
var barreWordpressMaxWidthPX = barreFullWidth * barreWordpressMaxWidth / 100;

// Définit l'endroit où toute la max-width a été ajouté
var stopWordpress = barreWordpressPos + (barreWordpressMaxWidthPX /2);

// BARRE MACOS

var barreMacosPos =  ($(".macos").offset().top) - windowHeight;
var barreMacosInView = (scroll > barreMacosPos);
var barreMacosToScroll = (scroll - barreMacosPos);
var barreFullWidth = parseInt($('.fullBarre').css("width"));
var barreMacosMaxWidth = parseInt($('.macos').css("max-width"));
var barreMacosMaxWidthPX = barreFullWidth * barreMacosMaxWidth / 100;
var stopMacos = barreMacosPos + (barreMacosMaxWidthPX /2);

// update toutes les variables
function checkSizes() {
		// SLIDER
	imgWidth = $(".animatedWrap img").width();
	animHeight = $(".animatedWrap").height();
	animWidth = $(".animatedWrap").width();
	windowWidth = $(window).width();
	dep = imgWidth - windowWidth;
	enPlus = $(".stickyContained .sectionTitleContainer").outerHeight();
	animPos = $(".photoSection").offset().top;
	scroll = $(window).scrollTop();
	inView = (scroll > animPos);
	stop = (scroll  > animPos + animWidth - windowWidth);
	distance = (scroll - animPos);
	blockToHeight = enPlus + animHeight + animWidth - windowWidth;


	if (imgWidth > windowWidth) {
		isOut = true;
	}

	else if (imgWidth < windowWidth) {
		isOut = false;
	}

		// BARRES

	barreFullWidth = parseInt($('.fullBarre').css("width"));

	// BARRE CSS

	barreCssPos = ($(".css").offset().top) - windowHeight;
	barreCssInView = (scroll > barreCssPos);
	barreCssOutView = ((scroll - windowHeight/3) > barreCssPos);
	barreCssToScroll = (scroll - barreCssPos);
	barreCssMaxWidth = parseInt($('.css').css("max-width"));
	barreCssMaxWidthPX = barreFullWidth * barreCssMaxWidth / 100;
	stopCss = barreCssPos + (barreCssMaxWidthPX /3);

	// BARRE JS

	barreJsPos = ($(".js").offset().top) - windowHeight;
	barreJsInView = (scroll > barreJsPos);
	barreJsOutView = ((scroll - windowHeight/3) > barreJsPos);
	barreJsToScroll = (scroll - barreJsPos);
	barreJsMaxWidth = parseInt($('.js').css("max-width"));
	barreJsMaxWidthPX = barreFullWidth * barreJsMaxWidth / 100;
	stopJs = barreJsPos + (barreJsMaxWidthPX /3);

	// BARRE WORDPRESS

	barreWordpressPos = ($(".wordpress").offset().top) - windowHeight;
	barreWordpressInView = (scroll > barreWordpressPos);
	barreWordpressOutView = ((scroll - windowHeight/3) > barreWordpressPos);
	barreWordpressToScroll = (scroll - barreWordpressPos);
	barreWordpressMaxWidth = parseInt($('.wordpress').css("max-width"));
	barreWordpressMaxWidthPX = barreFullWidth * barreWordpressMaxWidth / 100;
	stopWordpress = barreWordpressPos + (barreWordpressMaxWidthPX /3);


	// BARRE MACOS

	barreMacosPos = ($(".macos").offset().top) - windowHeight;
	barreMacosInView = (scroll > barreMacosPos);
	barreMacosToScroll = (scroll - barreMacosPos);
	barreFullWidth = parseInt($('.fullBarre').css("width"));
	barreMacosMaxWidth = parseInt($('.macos').css("max-width"));
	barreMacosMaxWidthPX = barreFullWidth * barreMacosMaxWidth / 100;
	stopMacos = barreMacosPos + (barreMacosMaxWidthPX /3);

	// BARRE WINDOWS

	barreWindowsPos = ($(".windows").offset().top) - windowHeight;
	barreWindowsInView = (scroll > barreWindowsPos);
	barreWindowsToScroll = (scroll - barreWindowsPos);
	barreFullWidth = parseInt($('.fullBarre').css("width"));
	barreWindowsMaxWidth = parseInt($('.windows').css("max-width"));
	barreWindowsMaxWidthPX = barreFullWidth * barreWindowsMaxWidth / 100;
	stopWindows = barreWindowsPos + (barreWindowsMaxWidthPX /3);

	// BARRE FINAL CUT

	barreFinalcutPos = ($(".finalcut").offset().top) - windowHeight;
	barreFinalcutInView = (scroll > barreFinalcutPos);
	barreFinalcutToScroll = (scroll - barreFinalcutPos);
	barreFullWidth = parseInt($('.fullBarre').css("width"));
	barreFinalcutMaxWidth = parseInt($('.finalcut').css("max-width"));
	barreFinalcutMaxWidthPX = barreFullWidth * barreFinalcutMaxWidth / 100;
	stopFinalcut = barreFinalcutPos + (barreFinalcutMaxWidthPX /3);

	// BARRE LIGHTROOM

	barreLightroomPos = ($(".lightroom").offset().top) - windowHeight;
	barreLightroomInView = (scroll > barreLightroomPos);
	barreLightroomToScroll = (scroll - barreLightroomPos);
	barreFullWidth = parseInt($('.fullBarre').css("width"));
	barreLightroomMaxWidth = parseInt($('.lightroom').css("max-width"));
	barreLightroomMaxWidthPX = barreFullWidth * barreLightroomMaxWidth / 100;
	stopLightroom = barreLightroomPos + (barreLightroomMaxWidthPX /3);

	// BARRE PHOTOSHOP

	barrePhotoshopPos = ($(".photoshop").offset().top) - windowHeight;
	barrePhotoshopInView = (scroll > barrePhotoshopPos);
	barrePhotoshopToScroll = (scroll - barrePhotoshopPos);
	barreFullWidth = parseInt($('.fullBarre').css("width"));
	barrePhotoshopMaxWidth = parseInt($('.photoshop').css("max-width"));
	barrePhotoshopMaxWidthPX = barreFullWidth * barrePhotoshopMaxWidth / 100;
	stopPhotoshop = barrePhotoshopPos + (barrePhotoshopMaxWidthPX /3);

	// BARRE ILLUSTRATOR

	barreIllustratorPos =  ($(".illustrator").offset().top) - windowHeight;
	barreIllustratorInView = (scroll > barreIllustratorPos);
	barreIllustratorToScroll = (scroll - barreIllustratorPos);
	barreFullWidth = parseInt($('.fullBarre').css("width"));
	barreIllustratorMaxWidth = parseInt($('.illustrator').css("max-width"));
	barreIllustratorMaxWidthPX = barreFullWidth * barreIllustratorMaxWidth / 100;
	stopIllustrator = barreIllustratorPos + (barreIllustratorMaxWidthPX /3);
}

function slider() {
	checkSizes();

	// 
	$(".animatedWrap").css("max-width", "none");

	// attribue la largeur de l'image à la largeur de .animatedWrap
	$(".animatedWrap").css("width", imgWidth);

	// attribue suffisamment de place au conteneur sticky pour que ça puisse scroller
	$(".stickyContained").css("height", animHeight + enPlus);

	// attribue la hauteur de la section la hauteur de l'image + ce qui dépasse
	$(".photoSection").css("height", blockToHeight);

	// Si c'est entre inView et stop, dis à .animatedWrap de se déplacer du bon margin
	if (inView && !stop) {
		$(".animatedWrap").css("margin-left", -distance);
	}

	// fix le margin qui se remet pas à zéro quand on scroll en haut trop rapidement
	if (!inView) {
		$(".animatedWrap").css("margin-left", "0");
	}

	// Pareil mais quand on scroll en bas trop rapidement
	if (inView && stop) {
		$(".animatedWrap").css("margin-left", -dep);
	}

	// Pour savoir que le slider est activé
	sliderOn = true;
}

function disableSlider() {
	$(".animatedWrap").css("margin-left", "0");
	$(".animatedWrap").css("max-width", imgWidth);
	$(".animatedWrap").css("margin", "auto");
	$(".photoSection").css("height", "auto");
	$(".stickyContained").css("height", animHeight + enPlus);
	sliderOn = false;
}

function responsiveSlider() {
	checkSizes();

	if (isOut) {
		slider();
	}

	else if (!isOut) {
		disableSlider();
	}
}

function animatedBarres() {

	function barreCss() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreCssInView) && (barreCssToScroll*3 < barreCssMaxWidthPX)) {
			$(".css").css("width", barreCssToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreCssInView) {
			$(".css").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopCss) {
			$(".css").css("width", barreCssMaxWidthPX);
		}

	}
	barreCss();

	function barreJs() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreJsInView) && (barreJsToScroll*3 < barreJsMaxWidthPX)) {
			$(".js").css("width", barreJsToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreJsInView) {
			$(".js").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopJs) {
			$(".js").css("width", barreJsMaxWidthPX);
		}

	}
	barreJs();


	function barreWordpress() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreWordpressInView) && (barreWordpressToScroll*3 < barreWordpressMaxWidthPX)) {
			$(".wordpress").css("width", barreWordpressToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreWordpressInView) {
			$(".wordpress").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopWordpress) {
			$(".wordpress").css("width", barreWordpressMaxWidthPX);
		}

	}
	barreWordpress();

	function barreMacos() {
		checkSizes(); 

		if ((barreMacosInView) && (barreMacosToScroll*3 < barreMacosMaxWidthPX)) {
			$(".macos").css("width", barreMacosToScroll*3);
		}

		if (!barreMacosInView) {
			$(".macos").css("width", "0px");
		}

		if (scroll > stopMacos) {
			$(".macos").css("width", barreMacosMaxWidthPX);
		}
	}
	barreMacos();

	function barreWindows() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreWindowsInView) && (barreWindowsToScroll*3 < barreWindowsMaxWidthPX)) {
			$(".windows").css("width", barreWindowsToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreWindowsInView) {
			$(".windows").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopWindows) {
			$(".windows").css("width", barreWindowsMaxWidthPX);
		}
	}
	barreWindows();

	function barreFinalcut() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreFinalcutInView) && (barreFinalcutToScroll*3 < barreFinalcutMaxWidthPX)) {
			$(".finalcut").css("width", barreFinalcutToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreFinalcutInView) {
			$(".finalcut").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopFinalcut) {
			$(".finalcut").css("width", barreFinalcutMaxWidthPX);
		}
	}
	barreFinalcut();

	function barreLightroom() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreLightroomInView) && (barreLightroomToScroll*3 < barreLightroomMaxWidthPX)) {
			$(".lightroom").css("width", barreLightroomToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreLightroomInView) {
			$(".lightroom").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopLightroom) {
			$(".lightroom").css("width", barreLightroomMaxWidthPX);
		}
	}
	barreLightroom();

	function barrePhotoshop() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barrePhotoshopInView) && (barrePhotoshopToScroll*3 < barrePhotoshopMaxWidthPX)) {
			$(".photoshop").css("width", barrePhotoshopToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barrePhotoshopInView) {
			$(".photoshop").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopPhotoshop) {
			$(".photoshop").css("width", barrePhotoshopMaxWidthPX);
		}
	}
	barrePhotoshop();

	function barreIllustrator() {
		checkSizes(); 

		// *3 pour aller deux fois plus vite
		if ((barreIllustratorInView) && (barreIllustratorToScroll*3 < barreIllustratorMaxWidthPX)) {
			$(".illustrator").css("width", barreIllustratorToScroll*3);
		}

		// reset quand on scroll en haut trop rapidement
		if (!barreIllustratorInView) {
			$(".illustrator").css("width", "0px");
		}

		// met le max-width quand on scroll en bas trop rapidement
		if (scroll > stopIllustrator) {
			$(".illustrator").css("width", barreIllustratorMaxWidthPX);
		}
	}
	barreIllustrator();
}


// Pour que l'animation débute sur le texte et le soulignement en même temps
$("nav a").hover(function(){$(this).toggleClass('hover_a');});
$(".social a").hover(function(){$(this).toggleClass('hover_a');});
$(".unsplashLink a").hover(function(){$(this).toggleClass('hover_a');});
// $(".fullprojectLink a").hover(function(){$(this).toggleClass('hover_a');});
$(".cvLink").hover(function(){$(this).toggleClass('hover_a');});
$(".expandedLink").hover(function(){$(this).toggleClass('hover_a');});

// Obligé pour avoir une animation et pas de # dans l'URL
$('.getDown svg polygon').on('click', function(e){
    $("html, body").animate({scrollTop: $("#gotoprojects").offset().top}, 400);
});

$('.getUp svg polygon').on('click', function(e){
    $("html, body").animate({scrollTop: $("html").offset().top}, 400);
});
// $('.projectLink').on('click', function(e){
//     $("html, body").animate({scrollTop: $("#gotoprojects").offset().top}, 400);
// });
$('.photoLink').on('click', function(e){
    $("html, body").animate({scrollTop: $(".photoSection").offset().top}, 400);
});
$('.statsLink').on('click', function(e){
    $("html, body").animate({scrollTop: $(".statsSection").offset().top}, 400);
});


var Mobile;

//Détermine si mobile ou pas
function checkMobile() {

	if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		Mobile = true;
	}
	else {
		Mobile = false;
	}
}

// pour désactiver la première section en full height sur mobile
function mQ() {
	checkMobile();
	checkSizes();

	// for some reason ça marche qu'au refresh, autrement windowHeight ne s'update pas et ça compare l'ancienne valeur
	if (!Mobile && windowHeight > 600) {
		$(".fullHeight").css("height", "calc(100vh - 128px)");
	}

	else if (!Mobile && windowHeight < 600) {
		$(".fullHeight").css("height", "auto");
	}
}

$(document).ready(function() {
	responsiveSlider();
	animatedBarres();
	mQ();
});

$(window).scroll(function() {
	responsiveSlider();
	animatedBarres();
	mQ();
});

$(window).resize(function() {
	responsiveSlider();
	animatedBarres();
	mQ();
});