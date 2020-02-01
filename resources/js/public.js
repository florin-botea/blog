window.axios = require('axios');
window.$ = window.jquery = require('jquery');
window.popper = require('popper.js');
require('bootstrap');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$('.prevent-multi-submit').submit(function(e){
	$(e.target).find('.btn-with-spinner').prop('disabled', true);
});

$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

$('oembed').each( function(i, el){
	let media = $(el);
	let mediaUrl = $(el).attr('url');
	media.append(`<iframe src="${mediaUrl}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`)
});

// join the id of dragged element in transfer-bus
// $('.js-content-manager-item').on('dragstart', function (e){
	// e.originalEvent.dataTransfer.setData("transfered_id", e.target.id);
// });s

// ???
// $('.js-content-manager, .js-content-manager-item').on('dragover', function (e){
  // e.preventDefault();
// });

// select the transfered element by id and put it on target
/*

$('.js-contenteditable').on('dblclick', function(e){
	e.target.setAttribute('contenteditable', true);
});

$('.js-contenteditable').on('click', function(e){
	e.stopPropagation();
});

$(window).click(function() {
	$('.js-contenteditable').attr('contenteditable', false);
});

// $('.js-form-content-manager').on('submit', function(e){
$('.fooo').on('click', function(e){
	// var scanned = $(e.target).find('.root');
	var scanned = $('.root');
	var schema = {};
	var nodes = [];
	console.log( _getContentRecursion(scanned) );

	return false;
})

*/