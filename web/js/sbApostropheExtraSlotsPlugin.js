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
	$('.sb-ecom-faq-slot-answer').each(function() {
		if(sbApostropheFirstHide == true) {
			sbApostropheFirstHide = false;
		} else {
			hideAnswer($(this));
		}
	});
	
	// listen for clicks on heading
	$('.sb-ecom-faq-slot-question').click(function() {
		answer = $(this).parent().find('.sb-ecom-faq-slot-answer');
		if(answer.hasClass('open')) {
			hideAnswer(answer);
		} else {
			showAnswer(answer);
		}
	});
	
	function hideAnswer(answer) {
		answer.slideUp('slow', 'easeInOutCirc', function() {
			$(this).removeClass('open');
		});
	}
	
	function showAnswer(answer) {
		answer.slideDown('slow', 'easeInOutCirc', function() {
			$(this).addClass('open');
		});
	}
	
}

function sbApostropheFAQsReset() {
	$('.sb-ecom-faq-slot-question').unbind('click');
	sbApostropheFAQsRegistered = false;
	sbApostropheFirstHide = true;
	sbApostropheFAQSlotStart();
}