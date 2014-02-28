$(function() {
	$("#betterave_team").stop().hover(function() {
		$("#betterave_team a").html("rejoindre");
		$("#kiwi_team").stop().animate({
			left : 1200
		}, 500, function() {/**/
		});
		$("#betterave_team a").stop().animate({
			left : 200
		}, 500, function() {/**/
		});
		$("#betterave_team").stop().animate({
			width : 1200
		}, 500, function() {/**/
		});
		$("#victory_team").stop().animate({
			left : 630
		}, 500, function() {/**/
		});
		$(".choose_arrowRight").stop().fadeOut();
	}, function() {
		$("#betterave_team a").html("betterave");
		$("#betterave_team a").stop().animate({
			left : 0
		}, 500, function() {/**/
		});
		$("#kiwi_team").stop().animate({
			left : 600
		}, 500, function() {/**/
		});
		$("#betterave_team").stop().animate({
			width : 600
		}, 500, function() {/**/
		});
		$("#victory_team").stop().animate({
			left : 328
		}, 500, function() {/**/
		});
		$(".choose_arrowRight").stop().fadeIn();
	});

	$("#kiwi_team").stop().hover(function() {
		$("#kiwi_team a").html("rejoindre");
		$("#kiwi_team a").stop().animate({
			left : 400
		}, 500, function() {/**/
		});
		$("#kiwi_team").stop().animate({
			left : 0
		}, 500, function() {/**/
		});
		$("#betterave_team").stop().animate({
			width : 0
		}, 500, function() {/**/
		});
		$("#victory_team").stop().animate({
			left : 10
		}, 500, function() {/**/
		});
		$(".choose_arrowLeft").stop().fadeOut();
	}, function() {
		$("#kiwi_team a").html("Kiwi");
		$("#kiwi_team a").stop().animate({
			left : 0
		}, 500, function() {/**/
		});
		$("#kiwi_team").stop().animate({
			left : 600
		}, 500, function() {/**/
		});
		$("#betterave_team").stop().animate({
			width : 600
		}, 500, function() {/**/
		});
		$("#victory_team").stop().animate({
			left : 328
		}, 500, function() {/**/
		});
		$(".choose_arrowLeft").stop().fadeIn();
	});
	
	
});