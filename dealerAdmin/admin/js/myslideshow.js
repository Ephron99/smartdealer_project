// JavaScript code for slideshow
var currentIndex = 0;
var slides = document.querySelectorAll('.imgslide');
var totalSlides = slides.length;

function showSlide(index) {
    slides.forEach(function (slide) {
        slide.style.display = 'none';
    });

    slides[index].style.display = 'block';
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    showSlide(currentIndex);
}

// Show the first slide initially
showSlide(currentIndex);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlide, 3000);
///////////////////////////////////************************************ */

// JavaScript code for slideshow
var currentIndexmine = 0;
var slidesmine = document.querySelectorAll('.imgslidemine');
var totalSlidesmine = slidesmine.length;

function showSlidemine(indexmine) {
    slidesmine.forEach(function (slidemine) {
        slidemine.style.display = 'none';
    });

    slidesmine[indexmine].style.display = 'block';
}

function nextSlidemine() {
    currentIndexmine = (currentIndexmine + 1) % totalSlidesmine;
    showSlidemine(currentIndexmine);
}

function prevSlidemine() {
    currentIndexmine = (currentIndexmine - 1 + totalSlidesmine) % totalSlidesmine;
    showSlidemine(currentIndexmine);
}

// Show the first slide initially
showSlidemine(currentIndexmine);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlidemine, 3000);

///////////////////////////////////////////////************************************ */

// JavaScript code for slideshow
var currentIndexnews = 0;
var slidesnews = document.querySelectorAll('.imgslidenews');
var totalSlidesnews = slidesnews.length;

function showSlidenews(indexnews) {
    slidesnews.forEach(function (slidenews) {
        slidenews.style.display = 'none';
    });

    slidesnews[indexnews].style.display = 'block';
}

function nextSlidenews() {
    currentIndexnews = (currentIndexnews + 1) % totalSlidesnews;
    showSlidenews(currentIndexnews);
}

function prevSlidenews() {
    currentIndexnews = (currentIndexnews - 1 + totalSlidesnews) % totalSlidesnews;
    showSlidenews(currentIndexnews);
}

// Show the first slide initially
showSlidenews(currentIndexnews);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlidenews, 3000);

///////////////////////////////////////////////////////////////////////end of slide
// // JavaScript code for slideshow
var currentIndexnews = 0;
var slidesnews = document.querySelectorAll('.imgslidenews');
var totalSlidesnews = slidesnews.length;

function showSlidenews(indexnews) {
    slidesnews.forEach(function (slidenews) {
        slidenews.style.display = 'none';
    });

    slidesnews[indexnews].style.display = 'block';
}

function nextSlidenews() {
    currentIndexnews = (currentIndexnews + 1) % totalSlidesnews;
    showSlidenews(currentIndexnews);
}

function prevSlidenews() {
    currentIndexnews = (currentIndexnews - 1 + totalSlidesnews) % totalSlidesnews;
    showSlidenews(currentIndexnews);
}

// Show the first slide initially
showSlidenews(currentIndexnews);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlidenews, 3000);

///////////////////////********************************************************************************* */
// JavaScript code for slideshow
var currentIndexx = 0;
var slidesx = document.querySelectorAll('.imgslidex');
var totalSlidesx = slidesx.length;

function showSlidex(indexx) {
    slidesx.forEach(function (slidex) {
        slidex.style.display = 'none';
    });

    slidesx[indexx].style.display = 'block';
}

function nextSlidex() {
    currentIndexx = (currentIndexx + 1) % totalSlidesx;
    showSlidex(currentIndex);
}

function prevSlidex() {
    currentIndexx = (currentIndexx - 1 + totalSlidesx) % totalSlidesx;
    showSlidex(currentIndex);
}

// Show the first slide initially
showSlidex(currentIndexx);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlidex, 3000);

//////////////////////////////******************************************************** */

// JavaScript code for slideshow
var currentIndexuser = 0;
var slidesuser = document.querySelectorAll('.imgslideuser');
var totalSlidesuser = slidesuser.length;

function showSlideuser(indexuser) {
    slidesuser.forEach(function (slideuser) {
        slideuser.style.display = 'none';
    });

    slidesuser[indexuser].style.display = 'block';
}

function nextSlideuser() {
    currentIndexuser = (currentIndexuser + 1) % totalSlidesuser;
    showSlideuser(currentIndexuser);
}

function prevSlideuser() {
    currentIndexuser = (currentIndexuser - 1 + totalSlidesuser) % totalSlidesuser;
    showSlideuser(currentIndexuser);
}

// Show the first slide initially
showSlideuser(currentIndexuser);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlideuser, 3000);


//////////////////////////////******************************************************** */


// JavaScript code for slideshow
var currentIndexusers = 0;
var slidesusers = document.querySelectorAll('.imgslideusers');
var totalSlidesusers = slidesusers.length;

function showSlideusers(indexusers) {
    slidesusers.forEach(function (slideusers) {
        slideusers.style.display = 'none';
    });

    slidesusers[indexusers].style.display = 'block';
}

function nextSlideusers() {
    currentIndexusers = (currentIndexusers + 1) % totalSlidesusers;
    showSlideusers(currentIndexusers);
}

function prevSlideusers() {
    currentIndexusers = (currentIndexusers - 1 + totalSlidesusers) % totalSlidesusers;
    showSlideusers(currentIndexusers);
}

// Show the first slide initially
showSlideusers(currentIndexusers);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlideusers, 3000);


//////////////////////////////******************************************************** */




// JavaScript code for slideshow
var currentIndexuserr = 0;
var slidesuserr = document.querySelectorAll('.imgslideuserr');
var totalSlidesuserr = slidesuserr.length;

function showSlideuserr(indexuserr) {
    slidesuserr.forEach(function (slideuserr) {
        slideuserr.style.display = 'none';
    });

    slidesuserr[indexuserr].style.display = 'block';
}

function nextSlideuserr() {
    currentIndexuserr = (currentIndexuserr + 1) % totalSlidesuserr;
    showSlideuserr(currentIndexuserr);
}

function prevSlideuserr() {
    currentIndexuserr = (currentIndexuserr - 1 + totalSlidesuserr) % totalSlidesuserr;
    showSlideuserr(currentIndexuserr);
}

// Show the first slide initially
showSlideuserr(currentIndexuserr);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlideuserr, 3000);

//////////////////////////////******************************************************** */

//////////////////////////////******************************************************** */

// JavaScript code for slideshow
var currentIndexuserrr = 0;
var slidesuserrr = document.querySelectorAll('.imgslideuserrr');
var totalSlidesuserrr = slidesuserrr.length;

function showSlideuserrr(indexuserrr) {
    slidesuserrr.forEach(function (slideuserrr) {
        slideuserrr.style.display = 'none';
    });

    slidesuserrr[indexuserrr].style.display = 'block';
}

function nextSlideuserrr() {
    currentIndexuserrr = (currentIndexuserrr + 1) % totalSlidesuserrr;
    showSlideuserrr(currentIndexuserrr);
}

function prevSlideuserrr() {
    currentIndexuserrr = (currentIndexuserrr - 1 + totalSlidesuserrr) % totalSlidesuserrr;
    showSlideuserrr(currentIndexuserrr);
}

// Show the first slide initially
showSlideuserrr(currentIndexuserrr);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlideuserrr, 3000);

//////////////////////////////******************************************************** */

//////////////////////////////******************************************************** */

// JavaScript code for slideshow
var currentIndexjoin = 0;
var slidesjoin = document.querySelectorAll('.imgslidejoin');
var totalSlidesjoin = slidesjoin.length;

function showSlidejoin(indexjoin) {
    slidesjoin.forEach(function (slidejoin) {
        slidejoin.style.display = 'none';
    });

    slidesjoin[indexjoin].style.display = 'block';
}

function nextSlidejoin() {
    currentIndexjoin = (currentIndexjoin + 1) % totalSlidesjoin;
    showSlidejoin(currentIndexjoin);
}

function prevSlidejoin() {
    currentIndexjoin = (currentIndexjoin - 1 + totalSlidesjoin) % totalSlidesjoin;
    showSlidejoin(currentIndexjoin);
}

// Show the first slide initially
showSlidejoin(currentIndexjoin);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlidejoin, 3000);


///////////////////////////////********************************************* */

// JavaScript code for slideshow
var currentIndexhuma = 0;
var slideshuma = document.querySelectorAll('.imgslidehuma');
var totalSlideshuma = slideshuma.length;

function showSlidehuma(indexhuma) {
    slideshuma.forEach(function (slidehuma) {
        slidehuma.style.display = 'none';
    });

    slideshuma[indexhuma].style.display = 'block';
}

function nextSlidehuma() {
    currentIndexhuma = (currentIndexhuma + 1) % totalSlideshuma;
    showSlidehuma(currentIndexhuma);
}

function prevSlidehuma() {
    currentIndexhuma = (currentIndexhuma - 1 + totalSlideshuma) % totalSlideshuma;
    showSlidehuma(currentIndexhuma);
}

// Show the first slide initially
showSlidehuma(currentIndexhuma);

// Auto-advance to the next slide every 3 seconds (adjust as needed)
setInterval(nextSlidehuma, 3000);

////////////////////////////////////////////************************************************** */

