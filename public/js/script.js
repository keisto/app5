$(document).keydown(function(e) {
    var elid = $(document.activeElement).is('input:focus, textarea:focus, selectize-input');
    if(e.keyCode === 8 && !elid){
        return false;
    }
});

jQuery.fn.extend({
    animateCss: function (animationName, callback) {
        let animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
            if (callback) {
                callback();
            }
        });
        return this;
    }
});

jQuery.fn.updateSelectize = function() {

    // Convert the HTML options into a usable array/object for selectize
    var options = [];
    this.find('option').each( function( index ) {
        var option = {
            text:$(  this ).text(),
            value: $( this ).val()
        }
        options.push( option );
    } );

    // Get the Selectize instance
    selectize = this[0].selectize;
    selectize.clearOptions();
    selectize.load(function(callback){
        callback(options);
    });

    // Select the first option
    $.each( selectize.options, function( index, prop ) {
        first_option = index;
        return false;
    });
    // selectize.addItem(first_option);

    // Return the jQuery object for chaining
    return this;
};


/// Animations
// $('.menu').hide();
// $('body').animateCss('slideInRight', function () {
//     $('.menu').fadeIn();
//     $('.menu').animateCss('slideInLeft');
// });

// let containersArray = [];
// $('.container').each(function () {
//     containersArray.push($(this));
//     $(this).hide();
// });

// for(let i=0; i<containersArray.length; i++){
//     setTimeout(function () {
//         containersArray[i].show();
//         containersArray[i].animateCss('fadeInLeft');
//     }, i * 1000);
// }

// let columnsArray = [];
// $('.columns').each(function () {
//     columnsArray.push($(this));
//     $(this).hide();
// });
//
// for(let i=0; i<columnsArray.length; i++){
//     setTimeout(function () {
//         columnsArray[i].fadeIn();
//         columnsArray[i].animateCss('zoomInDown');
//     }, i * 1000);
// }
$('select').selectize();

$(document).ready(function() {
    $(".notify").each(function () {
        let $parent = $(this);
        $(this).children('.delete').click(function () {
            $parent.animateCss('rotateOutDownRight', function () {
                $parent.remove();
            });
        });
    });
});
/// Navigation functions
$(function() {
    let pageTitle = $('#page-title').text().trim().toLowerCase();
    if(pageTitle.split(' ')[1]){
        if(pageTitle.split(' ')[0] == 'dispatch') {
            pageTitle = 'dispatch';
        } else {
            pageTitle = pageTitle.split(' ')[0]+"-"+pageTitle.split(' ')[1];
        }

    }
    $("#"+pageTitle).children('a').addClass('is-active');
});

function toggleNavigation() {
  if($('body').css('padding-left') == '68px') {
      $('.menu').css({'width': '240px'});
      $('body').css({'padding-left': '240px'});
      setTimeout(function () {
          $('.menu .menu-list span:nth-child(2)').fadeIn('slow');
          $('#logo h4').fadeIn('slow');
      }, 1000);
      $('.container').addClass('is-fluid');

      // Remove Tool tips
      $('.menu li').each(function () {
          let el = $(this);
          if(el.attr('id') != null) {
              el.removeClass('tooltip').removeClass('is-tooltip-right');
              el.removeAttr('data-tooltip');
          }
      });

  } else {
      setTimeout(function () {
          $('.menu').css({'width': '68px'});
          $('body').css({'padding-left': '68px'});
          $('.container').removeClass('is-fluid');
      }, 1000);
      $('.menu .menu-list span:nth-child(2)').fadeOut('slow');
      $('#logo h4').fadeOut('slow');

      // Create Tool tips
      $('.menu li').each(function () {
         let el = $(this);
         if(el.attr('id') != null) {
             el.addClass('tooltip').addClass('is-tooltip-right');
             let tooltip =  el.attr('id').charAt(0).toUpperCase() + el.attr('id').substr(1);
             if(tooltip.split('-')[1]){
                 tooltip = tooltip.split('-')[0].charAt(0).toUpperCase()+tooltip.split('-')[0].substr(1)+" "
                     +tooltip.split('-')[1].charAt(0).toUpperCase() + tooltip.split('-')[1].substr(1);
             }
             el.attr('data-tooltip', tooltip);
         }
      });
  }
 }
