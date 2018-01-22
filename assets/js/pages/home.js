
$('.home-top-menu').addClass('active');
$( function() {
  $("#form").validate({
    rules: {
        attendee: 'required',
        relation: 'required'
    },
    messages: {
        attendee: "Please enter your name",
        relation: "Please let us know your relationship between you and bride or groom"
    },
    submitHandler: function() {
        var data_form = $('#form').serialize();
        console.log(data_form);
        console.log($("#form"));
        $.ajax({
            type: 'post',
            url: $('#form').attr('action'),
            data: data_form,
            dataType: 'json',
            success: function(rs) {
              console.log(rs);
                if (rs.status) {
                    $('.notification').hide();
                    $('.msgsuccess').text(rs.msg);
                    $('.notification').fadeIn('slow');
                    /*$('html, body').animate({
                        scrollTop: $('.msgsuccess').offset().top-30
                    }, 2000);*/
                    $('#form').trigger('reset');
                } else {
                    console.log(rs.msg);
                    $('.notification').hide();
                    $('.msgerror').fadeIn('slow');
                    $('.msgerror').text(rs.msg);
                }
                var hideNoti = setTimeout(function() {
                    $('.notification').fadeOut('slow');
                }, 2000);
                return false;
            }
        });
        return false;
    }
  });
});
