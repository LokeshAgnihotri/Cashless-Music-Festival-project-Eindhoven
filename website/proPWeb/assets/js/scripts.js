//var accordions = document.getElementsByClassName("accordion");
//var accordion-content = document.getElementsByClassName('accordion-content');
//
//for (var i = 0; i < accordions.length; i++) {
//  accordions[i].onclick = function() {
//    this.classList.toggle("is-open");
//	   this.nextElementSibling.classList.toggßle("show");
//
//    var content = this.nextElementSibling;
//    if (content.style.maxHeight) {
//      // accordion is currently open, so close it
//      content.style.maxHeight = null;
//    } else {
//      // accordion is currently closed, so open it
//      content.style.maxHeight = content.scrollHeight + "px";
//    }
//  };
//}

//-----------------------------------------


// event card starts here

$(document).ready(function () {
	$(".acc h3").click(function () {
		$(this).next(".event-header").slideToggle();
		$(this).children().toggleClass("active");
		$(this).parent().siblings().children(".event-header").slideUp();
		$(this).parent().siblings().removeClass("active");

	});
});
// faq start here
$(document).ready(function () {
	$(".acc h3").click(function () {
		$(this).next(".faq-content").slideToggle();
		$(this).parent().toggleClass("active");
		$(this).parent().siblings().children(".faq-content").slideUp();
		$(this).parent().siblings().removeClass("active");
	});
});

// navbar start here
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('nav-toggle');

navBarToggle.addEventListener('click', function () {
	mainNav.classList.toggle('active');
});

// navbar ends here

//------------------------------------


