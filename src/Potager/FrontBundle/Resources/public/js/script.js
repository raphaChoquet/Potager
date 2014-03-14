$(function() {

	/* HOMEPAGE */
	$("#betterave_team").stop().hover(function() {
		$("#betterave_team a").html("rejoindre");
		$("#kiwi_team").stop().animate({
			left : 1200
		}, 500, function() {/**/
		});
		$("#betterave_team a").stop().animate({
			paddingLeft : 260
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
			paddingLeft : 60
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
			$(".prepareToFight").remove();
			$('#doFight').replaceWith(data);
			$('#plop').data('result');
			var dataResult = $('#plop').data('result');

			if ($('#plop').data('result') == 0) {
				$("#duels_center").html('ÉGALITÉ');
			}
			else if ($('#plop').data('result') == 1) {
				$("#duels_center").html('VICTOIRE !');
			}
			else if ($('#plop').data('result') == -1) {
				$("#duels_center").html('DÉFAITE...');
			}

			$("html, body").animate({scrollTop:400}, '500', 'swing', function() {});
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
			var newSkill = parseInt(data.attribute)+1;
			$('.'+a+' .bar-percentage').attr('data-percentage', newSkill).html(newSkill+' pts');
			$('.'+a+' .bar-container .bar').css('width',newSkill+'%');

			var newLevel = parseInt(b)+1;
			$("#levelUser").html(newLevel);

			$(".addSkill").hide();
		});
	});
});


function defineBar($progress) {
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