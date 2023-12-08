gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

ScrollTrigger.defaults({
    toggleActions: "play pause resume reset"
})

var height;

function setHeight() {
    var height = 100 * points.length;
}
ScrollTrigger.addEventListener("refreshInit", setHeight);

var points = gsap.utils.toArray('.point');
var pointssell = gsap.utils.toArray('.pointsell');
var indicators = gsap.utils.toArray('.circle');
var indicatorsItem = gsap.utils.toArray('.circleItem');

var height = 100 * points.length;
var heightsell = 100 * pointssell.length;

gsap.set(".circle", { backgroundColor: "white" });

//Getting top of the title
let containerGSAPTitle = document.getElementById("container-gsap-title");
let containerGSAPTitleRect = containerGSAPTitle.getBoundingClientRect();

//Getting top of the buttons
let gsapContainer = document.getElementById("container-gsap");

let containerTopTitle = containerGSAPTitleRect.top + window.scrollY + 250;

let backToTop = containerTopTitle;
let triggerStart = containerGSAPTitle;
let scrollSpeed = 255;
let topStart = 50;
let sectionHeightOffset = 30;

if(window.innerWidth <= 810){ // tablets version
	backToTop = containerGSAPTitleRect.top + window.scrollY;
	scrollSpeed = 180;
	topStart = 70;
	sectionHeightOffset = 65;
}

if(window.innerWidth == 820) { // ipad air
	scrollSpeed = 140;
	sectionHeightOffset = 80;
}

if(window.innerWidth == 912) { // surface pro
	scrollSpeed = 120;
	sectionHeightOffset = 100;
}

if(window.innerWidth <= 420){ // phones version
	backToTop = containerGSAPTitleRect.top + window.scrollY + 50;
	scrollSpeed = 220;
	topStart = 0;
	sectionHeightOffset = 30;
}

if(window.innerWidth == 412){
	sectionHeightOffset = 40;
}

if(window.innerWidth == 540){ //surface duo
	sectionHeightOffset = 15;
}


var tl = gsap.timeline({
    scrollTrigger: {
        trigger: triggerStart,
        start: `top +=${topStart}px`,
        end: () => `+=${scrollSpeed}%`,
        scrub: true,
        pin: ".container-gsap",
        pinSpacing: true
    }
})

points.forEach(function (elem, i) {
    gsap.set(elem, { top: 0 })
    tl.to(indicators[i], { backgroundColor: "#1ED65F", ease: "linear" }, i)
    tl.to(indicatorsItem[i], { backgroundColor: "#1ED65F", ease: "linear" }, i)

    if (i != points.length) {
		
        tl.to(indicators[i], {
            backgroundColor: "white",
            duration: 0.30
        })

        tl.to(indicatorsItem[i], {
            backgroundColor: "white",
            duration: 0.30
        })

        tl.to('.sc-01,.sc-02,.sc-03,.sc-04,.sc-05',
            {
                autoAlpha: 1,
                translateY: '-=' + (elem.clientHeight - sectionHeightOffset)
            })
    }

});

let buyingButton = document.getElementById("pills-home-tab");
let sellingButton = document.getElementById("pills-profile-tab");

buyingButton.addEventListener("click", () => {
	
	gsap.to(window, { scrollTo: backToTop });
});

sellingButton.addEventListener("click", () => {
	
	gsap.to(window, {scrollTo: backToTop });
});


