function sbApostropheJQueryUITabbedContentSlotStart(tabsId) {
	$('#' + tabsId).tabs();
}

var sbApostropheFAQsRegistered = false;
var sbApostropheFirstHide = true;

function sbApostropheFAQSlotStart() {
	//this has been done
	if(sbApostropheFAQsRegistered == true) {
		return;
	}
	
	sbApostropheFAQsRegistered = true;
	
	// hide initial
	$('.sb-apostrophe-faq-slot-answer').each(function() {
		if(sbApostropheFirstHide == true) {
			sbApostropheFirstHide = false;
		} else {
			hideAnswer($(this));
		}
	});
	
	// listen for clicks on heading
	$('.sb-apostrophe-faq-slot-question').click(function() {
		answer = $(this).parent().find('.sb-apostrophe-faq-slot-answer');
		if(answer.hasClass('open')) {
			hideAnswer(answer);
		} else {
			showAnswer(answer);
		}
	});
	
	function hideAnswer(answer) {
		answer.slideUp('slow', 'easeInOutCirc', function() {
			$(this).removeClass('open');
			$(this).parent().find('.sb-apostrophe-faq-slot-question').removeClass('open');
		});
	}
	
	function showAnswer(answer) {
		answer.slideDown('slow', 'easeInOutCirc', function() {
			$(this).addClass('open');
			$(this).parent().find('.sb-apostrophe-faq-slot-question').addClass('open');
		});
	}
	
}

function sbApostropheFAQsReset() {
	$('.sb-apostrophe-faq-slot-question').unbind('click');
	sbApostropheFAQsRegistered = false;
	sbApostropheFirstHide = true;
	sbApostropheFAQSlotStart();
}

var sbCountdownTimerHolder = null;

function sbJQueryCountdownTimerSetup(year, month, day, hour, minute) {
  
  var futureDate = new Date(year, month, day, hour, minute);
  clearInterval(sbCountdownTimerHolder);
  sbCountdownTimerHolder = null;
  
  function updateTime() {
    // Get the current time and work out 12 hour time
    var date = new Date();
    var hour24 = date.getHours();
    var hour12 = (hour24 != 0 && hour24 != 12) ? (hour24 % 12) : 12;
    var meridiem = (hour24 < 12) ? 'am' : 'pm';
    
    // get difference between the 2 dates
    var seconds = (futureDate.getTime() - date.getTime()) / 1000; 
    
    // Update the clock elements
    changeValue($('#d1'), Math.floor(seconds / 86400));
    changeValue($('#m2'), Math.floor((seconds % 86400) / 3600));
    changeValue($('#s1'), Math.floor(((seconds % 86400) % 3600) / 60));
    changeValue($('#s2'), Math.floor(((seconds % 86400) % 3600) % 60));
    $('#ampm').html(meridiem);
  }

  // Update the time straight away
  if(sbCountdownTimerHolder == null) {
    updateTime();
    sbCountdownTimerHolder = window.setInterval(updateTime, 1000);
  }

  // Earlier code to play with increment/decrementing numbers
  // <button onclick="addValue('#a', 1)">+</button>
  // <button onclick="addValue('#a', -1)">-</button>
  function addValue(id, change) {
    var obj = $(id);
    var value = obj.find('.value').text();
    var newValue = parseInt(value) + change;
    changeValue(obj, newValue);
  }

  // Update a number
  function changeValue(obj, newValue) {

    // If the div has no value yet, then just set it immediately
    var value = $('.value', obj).text();
    if (value == '')
      return $('.value', obj).html(newValue);

    // Only do anything if the value has actually changed
    if (value == newValue)
      return;

    // Add top/bottom elements to flip
    $('<div class="top change"><div class="card">'+value+'</div></div>')
      .appendTo(obj);
    $('<div class="bottom change"><div class="bottom"><div class="card">'+
      newValue+'</div></div></div>').appendTo(obj);
    $('<div class="new-top top"><div class="card">'+newValue+'</div></div>')
      .appendTo(obj);

    // As soon as the flip elements are added to the DOM, fire the CSS animation
    window.setTimeout(function() {
      $('.change', obj).addClass('flip');
    }, 10);

    // After 600ms, cleanup the transitional elements
    window.setTimeout(function() {
      obj.find('.value').html(newValue);
      $('.top', obj).remove();
      $('.change', obj).remove();
    }, 600);

  }
}