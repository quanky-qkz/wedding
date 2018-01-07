/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {

    $('.sidebar-menu').find('li').removeClass('active');
    $('.sb-message').parent('li').addClass('active');
    $('#dataTable').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": true
    });

    $("#form").validate({
		rules: {
                    message: "required"
		},
		messages: {
                    message: "Message required"
		},
                submitHandler: function(){
                    var data_form = $('#form').serialize();
                    console.log(data_form);
                    console.log($("#form"));
                    $.ajax({
                        type: 'post',
                        url: $('#form').attr('action'),
                        data: data_form,
                        dataType: 'json',
                        success: function(rs){
                            if (rs.status){
                                $('.notification').hide();

                                // $('.msgsuccess').text(rs.msg);
                                $('.notification').fadeIn('slow');

                                //  $('#dataTable').dataTable().fnAddData( [
                                //     rs.insertedID,
                                //     $('#name').val(),
                                //     $('#date').val(),
                                //     "<a href='editPackage.jsp?id="+ rs.insertedID +"'>Edit</a> "
                                // ] );
                                console.log(rs.msg);
                                /*$('html, body').animate({
                                    scrollTop: $('.msgsuccess').offset().top-30
                                }, 2000);*/
                                $('#form_send').trigger('reset');
                            }
                            else{
                                $('.notification').hide();
                                $('.msgerror').fadeIn('slow');
                                $('.msgerror').text(rs.msg);
                            }
                            var hideNoti = setTimeout(function(){
                                    $('.notification').fadeOut('slow');
                                },2000);
                            return false;
                        }
                    });
                    return false;
                }

	});

    $('.deleteItem').click(function() {
        var href = $(this).attr("href");
        $.ajax({
            type: 'post',
            url: href,
            dataType: 'json',
            success: function(rs) {
                console.log(rs);
                if (rs.status) {
                    window.location.reload();
                    return false;
                }
                else {
                    return false;
                }
            }

        });
        return false;

    });

});


