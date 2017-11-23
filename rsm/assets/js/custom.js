/* 
 * Custom JS functions, within Anonymous function (not global)
 */
;(function($){
	  
    //---
    // Initialize functions when on DOM ready 
    //---
    $(document).ready(function(){
      
      // remove any FOUC classes
      $('.no-fouc').removeClass('no-fouc');

      //initiate placeholder.js (only runs in browsers that don't support placeholders)
      $('input, textarea').placeholder();

      // initialize mobile menu slideout
      $(".menu-collapse").sideNav();

      //intitialize utility menu slideout
      $(".utility-collapse").sideNav({
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor (where anchors are used)
      });

      //initialize toggle_panel for primary mobile menu
      toggle_panel('.site-header__mobile-nav', '.site-header__mobile-nav .site-header__mobile-nav__toggle', '.site-header__mobile-nav .site-header__mobile-nav__dropdown', 'dropdown-visible');

      // various functions
      init_LazyLoad();
      initChocolat();
      init_MosaicMasonryGallery();
      init_Rellax();
      init_FullscreenModal();
      //init_StickyHeaderWaypoints('.site-header__main', '.site-header__main');
      
      //init_StickyKitElements('.sticky-kit-test-parent', '.sticky-el', 100, 200);

      //scroll to anchor on click
      $('a').bind('click', function(event) {
        if (this.pathname === window.location.pathname &&
          this.protocol === window.location.protocol &&
          this.host === window.location.host) {
          
          event.preventDefault();
          var hash = this.hash;
          scrollToHash(hash);
        } 
      });



    });

    //---
    // Initialize functions on Window LOAD
    //---
    $(window).load(function(){
      
      // Before & After slider plugin from Zurb
      // This seems very finicky. Keep an eye out for its performance and find an alternate if needed.
      $('.before-after-viewer').imagesLoaded( function() {
          $('.before-after-viewer').twentytwenty();
      });
      $(window).trigger("resize.twentytwenty");


      staggerAnimation('.rsm-mosaic-gallery .anchor.fadeIn-element', 'fadeInUp', '100%', 75); //conflicts with .lazy()
      //init_ScrollingHeaderClass();
    });

   

    //---
    // Initialize functions on Window SCROLL
    //---
    //$(window).on('scroll', function(){
      //init_ScrollingHeaderClass();
    //});


    //---
    // Setup JS Media Queries via Modernizr.
    // Note these aren't completely responsive for when manually resizing your browser window.
    //
    // Use as simple if statement. Ex: 
    //   if (min_width(768)) {
    //     ... 
    //   }
    //--p
    var min_width;
    if (Modernizr.mq('(min-width: 0px)')) {
      // Browsers that support media queries
      min_width = function (width) {
      return Modernizr.mq('(min-width: ' + width + 'px)');
      };
    }
    else {
      // Fallback for browsers that does not support media queries
      min_width = function (width) {
      return $(window).width() >= width;
      };
    }
    var min_height;
    if (Modernizr.mq('(min-height: 0px)')) {
      // Browsers that support media queries
      min_height = function (height) {
      return Modernizr.mq('(min-height: ' + height + 'px)');
      };
    }
    else {
      // Fallback for browsers that does not support media queries
      min_height = function (height) {
      return $(window).height() >= height;
      };
    }
    //---
    // Setup mobile detection for use in JS
    // Use conditionally, eg. if( isMobile.any() ) { ... }
    // or as variable: var isMobileUA = isMobile.any();
    //---
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
	
	  
    //---
    // Initialize jQuery Lazy load
    // Docs: http://jquery.eisbehr.de/lazy/
    //
    // Usage with background images:  <div class="lazy" data-src="images/1.jpg"></div>
    // Usage with standard <img>: <img class="lazy" data-src="images/1.jpg" />
    //---
    var init_LazyLoad = function(){
      $('.lazy').lazy({
        threshold: 0,
        effect: "fadeIn",
        effectTime: 1000,
        enableThrottle: true,
        throttle: 250,
      });
    };


    //---
    // Function to run animate CSS on a selector
    //---
    $.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated fadeIn-element ' + animationName);
            });
        }
    });

    //---
    // Initilalize Rellax.js
    //---
    var init_Rellax = function(){
      if( !isMobile.any() ) {
        if( $('.rellax').length > 0 ) {
          var rellax = new Rellax('.rellax');
        }
      }
    };

    //---
    // Initialize Chocolat lightbox
    // Docs: https://github.com/nicolas-t/Chocolat/blob/master/readme.md
    //
    // NOTE: if this gets glitchy, go back to magnific popup. It's simepl and lightweight.
    //---
    var initChocolat = function() {
      $('.gallery').Chocolat({ 
          imageSize: 'contain',
          imageSelector: '.gallery-item a', //target generic WP gallery.
          fullScreen: false, //jumps straight to fullscreen if true
          loop: true,
          enableZoom: false,
          afterMarkup: function () {
            this.elems.pagination.appendTo(this.elems.top);
            this.elems.fullscreen.appendTo(this.elems.top);
          }
      });
    };


    //---
    // Fullscreen bootstrap modal with vertical centering (add modal-fullscreen class to HTML modal)
    //---
    var init_FullscreenModal = function(){
      $(".modal-fullscreen").on('show.bs.modal', function () {

        setTimeout( function() {
            $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
        }, 0);
      });
      $(".modal-fullscreen").on('shown.bs.modal', function () {
        var windowHeight = $(window).height();
        var modalID = $(this).attr('id');
        var dialogHeight = $('#'+modalID+' .modal-dialog').outerHeight();

        //vertically centering content
        if(windowHeight > dialogHeight) {
          var addTopPadding = (windowHeight - dialogHeight) / 2;
          $(this).css('padding-top', addTopPadding);
          $(this).find('.modal-dialog').addClass('show-dialog');
        } else {
          $(this).find('.modal-dialog').addClass('show-dialog');
        }
      });
      $(".modal-fullscreen").on('hidden.bs.modal', function () {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
        $(this).find('.modal-dialog').removeClass('show-dialog');
      });
    };

    //----
    // Animated scroll version for jQuery 1.12. Built as function.
    //----
    // register as a function so we can use this code within an onload function as well.
    var scrollToHash = function(anchor) {
      
      var hash = anchor;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      if($(hash).length){
        $('html, body').animate({
          scrollTop: $(hash).offset().top - 80
        }, 1000, 'easeInOutExpo', function(){
       
          // Add hash (#) to URL when done scrolling (default click behavior)
          //window.location.hash = hash;
        });

      return false;
      }
    };

    //---
    // Toggle Panel (for menus, etc)
    //---
    var toggle_panel = function(targetParent, targetToggle, targetElement, activeClass){
      $(targetToggle).on('click', function(e){
        e.preventDefault();
        if($(targetParent).hasClass(activeClass)) {
              $(targetParent).removeClass(activeClass);
          } else {
              setTimeout(function() {
                  $(targetParent).addClass(activeClass);
              }, 1);
          } 
      });
      // close menu if clicking elsewhere in the document;
      $(document).click(function(e) { 
        if(!$(e.target).closest(targetElement).length) {
          if($(targetParent).hasClass(activeClass)) {
            $(targetParent).removeClass(activeClass);
          }
        }        
      });
    };
    
    
    //---
    // @2017.11.02 -- MOVED TO WP_FOOTER FUNCTION IN HEADER LAYOUT FILE.
    // Add class to a fixed header on scroll (no WayPoints version)
    // You can use this version if you just have a standard sticky header at top:0;
    //---
    /*function init_ScrollingHeaderClass() {
      var scrollTop = $(window).scrollTop();
      var headerEl = '.site-header';

      if(scrollTop > 150) {
          $(headerEl).addClass('is-scrolling');
      } else {
        if( $(headerEl).hasClass('is-scrolling') ) {
          $(headerEl).addClass('transition-out');

          setTimeout(function(){
            $(headerEl).removeClass('is-scrolling transition-out');
          }, 350);
        }
      }
    }*/
    
    //---
    // @2017.11.02 -- MOVED TO WP_FOOTER FUNCTION IN THE HEADER LAYOUT FILE ITSELF
    // Sticky header with Waypoints . 
    //
    // Use this if you want the header to be "picked up" at a certain point on the page. 
    // 
    // Args:
    // --'target' argument should be the selector waypoints looks for to trigger the event.
    // In most cases, the target would be 'body' or '#page'. THIS IS THE ELEMENT THAT HITS YOUR OFFSET.
    // --'stickyEl' argument should be the selector that you're adding the class to. Make sure to add the appropriate CSS.
    //---
    /*var init_StickyHeaderWaypoints = function(target, stickyEl){

      //var siteHeaderTopBarHeight = $('.site-header__top').height();
     

      // Sticky header on scroll
      $(target).waypoint(function(direction) {
        if (direction === 'down') {
          $(stickyEl).addClass('sticky');
        } else {
          $(stickyEl).removeClass('sticky');
        }
      }, {
        offset: 0 //offset from top of viewport. Pixels.
      });

      // Additional events can happen at a different offset
      $(target).waypoint(function(direction) {
        if (direction === 'down') {
          $(stickyEl).addClass('is-scrolling');
        } else {
          $(stickyEl).removeClass('is-scrolling');
          //$(stickyEl).addClass('transition-out');
          //setTimeout(function(){
            //$(stickyEl).removeClass('is-scrolling transition-out');
          //}, 150);
        }
      }, {
        offset: '-250' //pixels 
      });

    };*/

    //---
    // Waypoints triggers for animations
    // NOTE: when using this in conjunction with the masonry plugin, make sure you're not targeting the SAME element to run the function on (eg. the same div selector), or else it will break masonry.
    //---
    //function to stagger animatio entry...
    var staggerAnimation = function(el, elAnimateClass, elOffset, elDelay) {
      var itemQueue = [];
      var delay = elDelay;
      var queueTimer;
      var animateClass = elAnimateClass;
      var animateItem = el;
      var offsetFromTop = elOffset;
      
      function processItemQueue () {
        if (queueTimer) {
          return; // We're already processing the queue
        }
        else {
          queueTimer = window.setInterval(function () {
            if (itemQueue.length) {
              $(itemQueue.shift()).animateCss(animateClass);
              processItemQueue();
            }
            else {
              window.clearInterval(queueTimer);
              queueTimer = null;
            }
          }, delay);
        }
        
      }
      
      $(animateItem).waypoint(function () {
        itemQueue.push(this.element);
        processItemQueue();
        this.destroy(); //forces to only animate one time per load.
      }, {
        offset: offsetFromTop
      });
    };
    

    //---
    // initialize masonry on mosaic gallery (uses background images)
    //---
    var init_MosaicMasonryGallery = function(){
      // predefine item heights
      var mosaic_image_ratio_mutiplier = 0.6381909548; // %. Setting main ratio to 199:127
      $('.rsm-mosaic-gallery__item').css('height', ( $('.rsm-mosaic-gallery__item').width() * mosaic_image_ratio_mutiplier) );
      $('.rsm-mosaic-gallery__item.mosaic-item--small').css('height', ( $('.rsm-mosaic-gallery__item').width() * mosaic_image_ratio_mutiplier) / 2);
      
      var $mosaic_container = $('.rsm-mosaic-gallery.masonry').imagesLoaded({ background: true }, function() { // 
        // init Masonry after all images have loaded
        $mosaic_container.masonry({
          columnWidth: '.rsm-mosaic-gallery__gridSizer',
          itemSelector: '.rsm-mosaic-gallery__item',
          gutter: 0
        });
      });
    };
       
	
})( jQuery );

/*
 Custom functions in GLOBAL scope
 (Note use of jQuery instead of $ required here.)
 */

//---
// Sticky elements
// IMPORTANT! Requires js/utilities/jquery.sticky-kit.min.js 
// Ref: http://leafo.net/sticky-kit/#reference
//---
var init_StickyKitElements = function($parent, $stickyEl, $mobileOffset, $desktopOffset){
  
  var offsetScrollerVal;
  if( jQuery(window).width() <= 767 ){
    offsetScrollerVal = $mobileOffset; //60; //match a mobile height
  } else {
    offsetScrollerVal = $desktopOffset; //74; //match a desktop height
  }

  jQuery($stickyEl).stick_in_parent({ //".sticky-kit-section__target"
    parent: $parent, //'.sticky-kit-section',
    offset_top: offsetScrollerVal,
  })
  .on('sticky_kit:bottom', function(){ //e
    jQuery(this).addClass('bottomed-out');
  })
  .on('sticky_kit:unbottom', function(){ //e
    jQuery(this).removeClass('bottomed-out');
  });

};

//---
// Function to set Dynamic Wrapper Control for Owl Carousel Element
// This isueful when the eleent is used within a container that doesn't have 'block' sizing (tables, flexbox)
//---
function setOwlWrapperSize($model, $target) {
  // We're finding a block here that matches the size we want for the carousel and applying it's width.
  // We can't use the carousel block itself because it's being manipulated by the dynamic carousel width.
  var modelBlockWidth = jQuery($model).outerWidth();
  jQuery($target).css('width', modelBlockWidth);
}