// hero slider
$('.hero-slider-wrapper').slick({
  	slidesToShow: 1,
  	speed: 300,
  	arrows: false,
  	infinite: true,
  	fade: true,
  	autoplay: true,
  	autoplaySpeed: 5000
});

// $('.fav-inner-container').on('init', function(event, slick){
// 	$(this).find('.slick-track').shuffle();
// });


// $('.fav-inner-container').slick({
//   	slidesToShow: 4,
// 	slidesToScroll: 1,
// 	speed: 300,
// 	arrows: true,
// 	infinite: false,
// 	responsive: [{
//       breakpoint: 980,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//       }
//     }]
// });

$('.arrow-fav.right-arrow').click(function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.fav-inner-container').slick('slickNext');
});
$('.arrow-fav.left-arrow').click(function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.fav-inner-container').slick('slickPrev');
});

$(document).ready(function() {
	$('.favagent-inner-container').shuffle();
});

// $(".container-default").scroll(function(){
// 	var _top = $(this).scrollTop();
// 	if(_top > 200){
// 		$('.header').addClass('scrolled')
// 	}
// 	else{
// 		$('.header').removeClass('scrolled')
// 	}
// });


$('.truncate-list').each(function () {
	var _height = $(this).height();
	var _heightData = $(this).attr('data-height');

	$(this).css('height',_heightData);

	if(_height > _heightData){
		$(this).addClass('truncated')
	}
});

var formatIDR = function(num){
  var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
  if(str.indexOf(".") > 0) {
    parts = str.split(".");
    str = parts[0];
  }
  str = str.split("").reverse();
  for(var j = 0, len = str.length; j < len; j++) {
    if(str[j] != ".") {
      output.push(str[j]);
      if(i%3 == 0 && j < (len - 1)) {
        output.push(".");
      }
      i++;
    }
  }
  formatted = output.reverse().join("");
  return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};

$('.format-idr').each(function () {
  var _amt = $(this).text();
  $(this).text(formatIDR(_amt));
});

// menubar
$(document).on('click','.menubar .has-sub',function(e){
    _this = $(this);
    _target = _this.find('.menusub-wrapper');
    $('.menusub-wrapper').not(_target).slideUp(100);
    _target.slideToggle(100)
});

$(document).on('click','.mobile-menu-wrapper .has-sub',function(e){
    _this = $(this);
    _target = _this.find('.mobile-menu-sub');
    $('.mobile-menu-sub').not(_target).slideUp(100);
    _target.slideToggle(100)
});

$(document).on('click','.js-burger',function(e){
    _this = $(this);
    _parent = _this.closest('.header');
    _mobile = _parent.find('.mobile-menu-wrapper');

    if(_mobile.hasClass('menu-open')){
		_mobile.animate({'height':'0'},300).removeClass('menu-open');
	}
	else{
		_mobile.animate({'height':'100vh'},300).addClass('menu-open');
	}

    $(this).toggleClass('opened');
    $('.mobile-menu-sub').slideUp(100);
});

$(document).on('click','.js-custom-dropdown',function(e){
    _this = $(this);
    _target = _this.find('.dropdown-list-wrapper');
    _grid = _target.find('.grid');
    _target.slideToggle(100);
    _grid.shuffle()
});

$(document).on('click','.dropdown-list-wrapper',function(e){
  e.preventDefault();
  e.stopPropagation();
});

$(document).on('click','.dropdown-list-wrapper .grid-item',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _parent = _this.closest('.custom-dropdown');
    _result = _parent.find('.result-dropdown');
    _logo = _parent.find('.logo-agent');
    _dropdown = _parent.find('.dropdown-list-wrapper');
    _text = _this.attr('data-agent');
    _src = _this.find('img').attr('src');
    _input = _parent.find('.hidden-input-agent');

    _this.addClass('active');
    $('.grid-item').not(_this).removeClass('active');
    _result.addClass('filled');
    _result.text(_text);
    _logo.find('img').attr('src',_src);
    _input.val(_text);
    _dropdown.slideUp(100);

});

function overlayOpen(){
  var _overlay = $('.overlay-wrapper-home');
  _overlay.addClass('open');

  var smallScreen = window.matchMedia("(max-width: 1360px)");
  if (smallScreen.matches){
    $('.container-default').animate({scrollTop: 50 }, 300);
  }
  else{
    $('.container-default').animate({scrollTop: 100 }, 300);
  }
}

function closeAll(){
  $('.dropdown-list-wrapper').slideUp(100);
}

$(document).on('click','.search-form',function(e){
  e.stopPropagation();
  overlayOpen();
  $('.menusub-wrapper').slideUp(100);
});

$(".search-agent-input").on('keyup', function(){
	var value = $(this).val().toLowerCase();
	var _parent = $(this).closest('.dropdown-list-wrapper');
	var _agent = _parent.find('.grid-item');
  	_agent.each(function () {
      	if ($(this).attr('data-agent').toLowerCase().search(value) > -1) {
          	$(this).show();
      	} else {
          	$(this).hide();
      	}
  	});

    if(!_agent.is(':visible'))
    {
      $('.no-agent').show()
    }
    else{
      $('.no-agent').hide()
    }
});

$(document).click(function(e){
	var container = $(".menubar .has-sub a");

	if(! container.is(e.target)){
    	$('.menusub-wrapper').slideUp(100);
  	}
  	if(! $(e.target).hasClass('search-form')){
    	$('.overlay-wrapper-home').removeClass('open');
  	}
  	if(! $(e.target).hasClass('js-custom-dropdown')){
    	$('.dropdown-list-wrapper').slideUp(100);
  	}
  	if(! $(e.target).hasClass('js-filter-agent')){
    	$('.wrapper-filter-agent').hide(100);
  	}
  	else{
    	return false
  	}

});

$(document).on('input', '.range-input', function() {

	var _output = $('.output');
	_output.each(function () {
	  var _amt = $('.range-input').val();
	  _output.text(formatIDR(_amt));
	});

});

// filter agent
$(document).on('click','.js-filter-agent',function(e){
    _this = $(this);
    _parent = _this.closest('.filter-agent');
    _target = _parent.find('.wrapper-filter-agent');
    _grid = _target.find('.grid');
    _target.toggle(100);
    _grid.shuffle()
});

$(document).on('click','.wrapper-filter-agent .grid-item',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _text = _this.attr('data-agent');
    $('.js-hidden-checkbox[data-checkbox="'+_text+'"]').trigger("click");

});

$(document).on('change','.input-agent-mobile',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _option = _this.find('option');
    _text = _option.filter(':selected').attr('data-agent');
    console.log(_text)
    $('.js-hidden-checkbox[data-checkbox="'+_text+'"]').trigger('click');

});

$(document).on('click','.custom-agent-choice .delete-agent',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _parent2 = _this.closest('.custom-agent-choice');
    _text = _parent2.attr('data-choice');
    $('.js-hidden-checkbox[data-checkbox="'+_text+'"]').trigger('click');

});

$(document).on('click','.region-name',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _parent = _this.closest('.region-wrapper');
    _dropdown = _parent.find('.region-list');

    $('.region-wrapper').not(_parent).removeClass('open');
    _parent.toggleClass('open');
    $('.region-list').not(_dropdown).slideUp(100);
    _dropdown.slideToggle(100);

});

// filter
$(document).on('click','.js-show-filter',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _parent = _this.closest('.inner-container');
    _filter = _parent.find('.left-search');
    _span = _this.find('.filter-text');

    if(_filter.hasClass('open')){
		_filter.animate({'height':'0'},300).removeClass('open');
		_span.text('Show Filter');
	}
	else{
		_filter.animate({'height':'1264px'},300).addClass('open');
		_span.text('Hide Filter');
	}

});

$(document).on('click','.js-hide-filter',function(e){
    e.preventDefault();
    e.stopPropagation();

    _this = $(this);
    _parent = _this.closest('.inner-container');
    _filter = _parent.find('.left-search');
    _span = _this.find('.filter-text');

    _filter.animate({'height':'0'},300).removeClass('open');
	_span.text('Show Filter');

});

// custom scrollbar
// $(".region-list").mCustomScrollbar({
//     theme:"dark-thin"
// });

$(document).on('change','.js-custom-select',function(e){

	_parent = $(this).closest('.form-group-select');
	_place = _parent.find('.fake-placeholder');

	_place.hide();

});

$(function() {
    $(".partner-logo img").lazyload();
});