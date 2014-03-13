$(function() {

	/* HOMEPAGE */
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

	/* CARACTERISTICS */

	
	$('.bar-percentage[data-percentage]').each(function () {
			var progress = $(this);
			var percentage = Math.ceil($(this).attr('data-percentage'));
			$({countNum : 0}).animate(
			{
				countNum : percentage
			},
			{
				duration : 2000,
				easing : 'linear',
				step : function() {
					var pct = '';
					if (percentage == 0) {
						pct = Math.floor(this.countNum) + '%';
					} else {
						pct = Math.floor(this.countNum + 1) + '%';
					}
					progress.siblings().children().css(
						'width', pct);
				}
			});
		});

	$('#doFight').click(function(e) {
		e.preventDefault();
		$.get($(this).attr('href'), function(data) {
			$('#doFight').replaceWith(data);
		});
	});
});