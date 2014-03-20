$(function () {
    $('#btn-add-img').click(function (evt) {
        evt.preventDefault();
        var $modal = $($(this).attr('href'));
        modal($modal, $(this).find('.avatarForm'));
        return false;
    });

    var $checked = $('input:checked');
    if($checked .length) {
        $checked .closest('.checkbox').addClass('checked');
        $('.avatarForm').show().find('img').attr('src', '/' + $checked.val());
        $('#add-img').remove();
        $('#btn-add-img .btn').text('Changer');
    }
});



function modal($modal, $avatar) {
    $modal.fadeIn();

    $modal.click(function (e) {
        if (e.target == $modal.find('.tc')[0]) {
            $modal.fadeOut();
        } else {
            return true;
        }
    });

    $modal.find('.close').click(function (e) {
        e.preventDefault();
        $modal.fadeOut();
        return false;
    });

    $modal.find('.checkbox').click(function (e) {
        var $box = $(this);
        $modal.find('.checked').removeClass('checked');
        $box.addClass('checked');
        $box.find('input').prop('checked', true);
        $avatar.show().find('img').attr('src', '/' + $box.find('input').val());
        $('#add-img').remove();
        $('#btn-add-img .btn').text('Changer');
        $modal.fadeOut();
    });

}