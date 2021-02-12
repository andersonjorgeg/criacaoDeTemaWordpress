jQuery(document).ready(function($) {

  if ($('.so-header ul li.menu-item-has-children').length) {

    $('a').on('focusin', function(event) {
      event.preventDefault();

      _this = this;
      
      $('.sub-menu.so-focused').each(function(index, el) {
        
        if (choco_wp_childOf(_this, this)) {
          //
        }
        else {
          $(this).removeClass('so-focused');
        }

      });

      if ($(this).closest('.sub-menu').length) {
        $(this).closest('.sub-menu').addClass('so-focused');
      }

    });

  }

  if ($('.so-header-button').length) {

    $('body').on('keydown', function(e) {

      if (e.key === 'Tab' || e.keyCode === 9) {

        if (e.shiftKey) {
          
          if ($(document.activeElement)[0] === $('.so-header .so-trigger')[0]) {
            event.preventDefault();
            $('.so-header-button').focus();
          }

        }
        else {
          
          if ($(document.activeElement)[0] === $('.so-header-button')[0]) {
            event.preventDefault();
            $('.so-header .so-trigger').focus();
          }

        }

      }

    });

  }

  if ($('#so-wrapper > .woocommerce').length) {

    $('#so-wrapper > .woocommerce').attr('id', 'so-main');

  }

  if ($('.orderby').length) {

    $('.orderby').each(function(index, el) {
      $(this).selectric();
    });

  }

  if ($('.variations select').length) {

    $('.variations select').each(function(index, el) {
      $(this).selectric();
    });

  }

  if ($(document.body).find('.so-intro-shape').length) {

    $(document.body).find('.so-intro-shape').each(function(index, el) {

      $(this).waterwave({
        parent : '',
        color : '#fff',
        direction: 'up',
        background: ''
      });

      if ($(window).width() <= 768) {
        $(this).attr('height', '220px');
        $(this).css('bottom', '-1px');
      }

    });

    $(window).scroll(function(event) {

      $(document.body).find('.so-intro-shape').each(function(index, el) {

        if ($(window).width() <= 768) {
          $(this).attr('height', '220px');
          $(this).css('bottom', '-1px');
        }

      });

    });

  }

  $(document.body).on('focusin', '.so-form-row input, .so-form-row textarea', function(event) {
    
    $(this).closest('.so-form-row').find('label').addClass('so-form-label-focus');
    $(this).closest('.so-form-row').find('label').addClass('so-form-label-active');

  });

  $(document.body).on('focusout', '.so-form-row input, .so-form-row textarea', function(event) {
    
    if (!$(this).val()) {
      $(this).closest('.so-form-row').find('label').removeClass('so-form-label-active');
    }

    $(this).closest('.so-form-row').find('label').removeClass('so-form-label-focus');
    
  });

  if ($('.so-header-mob_slide .menu-item-has-children').length) {

    $('.so-header-mob_slide .menu-item-has-children > a').each(function(index, el) {
      $(this).append('<button class="so-plus"><i></i><i></i></button>');
    });

    $(document.body).on('click touch', '.so-header-mob_slide .menu-item-has-children a .so-plus', function(event) {
      event.preventDefault();

      if ($(this).closest('li').hasClass('active')) {
        $(this).closest('li').removeClass('active');
        $(this).removeClass('active');
        $(this).closest('li').find('.sub-menu').slideUp(400);
      }
      else {
        $(this).closest('li').addClass('active');
        $(this).addClass('active');
        $(this).closest('li').find('.sub-menu').slideDown(400);
      }

    });

  }

  var can_animate_header = true;
  $('.so-trigger').on('click touch', function(event) {
    event.preventDefault();

    if (!can_animate_header) {
      return;
    }

    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('.ham', this).removeClass('active');
      $('#so-wrapper').removeClass('so-active_slide');
      $('.so-header-mob_slide').attr('tabindex', '-1');
      $('.so-header-mob_slide').removeClass('active');
      $('.so-header').removeClass('active');
    }
    else {
      $(this).addClass('active');
      $('.ham', this).addClass('active');
      $('#so-wrapper').addClass('so-active_slide');
      $('.so-header-mob_slide').removeAttr('tabindex');
      $('.so-header-mob_slide').addClass('active');
      $('.so-header').addClass('active');
    }

  });

  if ($('.so-select').length) {

    $('.so-select').each(function(index, el) {
      $(this).selectric();
    });

  }

  if ($('.so-modal').length) {
    $('.so-modal').each(function(index, el) {
      $(this).iziModal();
    });
  }

  if ($('.plyr__video-embed').length) {

    var arr = [];
    $('.plyr__video-embed').each(function(index, el) {
      arr[index] = new Plyr($(this));
    });

  }

  $('.so-scroll').on('click touch', function(event) {
    event.preventDefault();
    
    var scroll_target = $(this).data('target');
    var add_pixels = 0;

    $('html, body').animate({scrollTop: $(scroll_target).position().top + add_pixels}, 800);

  });

});

function choco_wp_getURLParameters(paramName)
{
    var sURL = window.document.URL.toString();
    if (sURL.indexOf("?") > 0)
    {
        var arrParams = sURL.split("?");
        var arrURLParams = arrParams[1].split("&");
        var arrParamNames = new Array(arrURLParams.length);
        var arrParamValues = new Array(arrURLParams.length);

        var i = 0;
        for (i = 0; i<arrURLParams.length; i++)
        {
            var sParam =  arrURLParams[i].split("=");
            arrParamNames[i] = sParam[0];
            if (sParam[1] != "")
                arrParamValues[i] = unescape(sParam[1]);
            else
                arrParamValues[i] = "No Value";
        }

        for (i=0; i<arrURLParams.length; i++)
        {
            if (arrParamNames[i] == paramName)
            {
                return arrParamValues[i];
            }
        }
        return "";
    }
}

function choco_wp_is_null(num) {
    if (num == null || typeof num == typeof undefined || num !== num) {
        return true;
    }
    else {
        return false;
    }
}

function choco_wp_copyStringToClipboard(str) {
   // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
}

var choco_wp_supports_video_autoplay = function(callback) {

  var v = document.createElement("video");
  v.paused = true;
  var p = "play" in v && v.play();
  
  typeof callback === "function" && callback(!v.paused || "Promise" in window && p instanceof Promise);
  
};

function choco_wp_ValidateEmail(mail) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w+)+$/.test(mail)) {
    return (true);
  }
  else {
    return (false);
  }
}

function choco_wp_childOf(c, p){
  while((c=c.parentNode)&&c!==p); 
  return !!c; 
}
