$(function() {

	/* HOMEPAGE */
	$("#betterave_team").stop().hover(function() {
		$("#betterave_team a").html("rejoindre");
		$("#kiwi_team").stop().animate({
			left : 1200
		}, 500, function() {/**/
		});
		$("#betterave_team a").stop().animate({
			marginLeft : 200
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
			defineBar($(this));
		});

	$('#doFight').click(function(e) {
		e.preventDefault();
		$.get($(this).attr('href'), function(data) {
			$('#doFight').replaceWith(data);
		});
	});

	var xpActuel = $(".experience .bar-percentage").attr('data-percentage');
	if (xpActuel < 100) {
		$(".addSkill").hide();
	}
	else {
		$(".addSkill").show();
	}

	$(".addSkill").click(function(e) {
		e.preventDefault();
		var a = $(this).attr('id');
		var b = $("#levelUser").html();
		$.get($(this).attr('href'), function(data) {
			$('.experience .bar-percentage').attr('data-percentage', 0).html('0 %');
			defineBar($('.experience .bar-percentage[data-percentage]'));
			console.log(data);
			var newLevel = parseInt(data.level)+1;
			$('.'+a+' .bar-percentage').attr('data-percentage', newLevel).html(newLevel+' pts');
			$('.'+a+' .bar-container .bar').css('width',newLevel+'%');

			var newLevel = parseInt(b)+1;
			$("#levelUser").html(newLevel);

			$(".addSkill").hide();
		});
	});
});


function defineBar($progress) {
	console.log($progress);
	var percentage = Math.ceil($progress.attr('data-percentage'));
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
			$progress.siblings().children().css(
				'width', pct);
		}
	});
}