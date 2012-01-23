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