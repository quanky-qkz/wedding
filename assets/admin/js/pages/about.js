/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('.sidebar-menu').find('li').removeClass('active');
$('.sb-about').parent('li').addClass('active');
$("#form").validate({
        rules: {
            content: "required"
        },
        messages: {
            content: "Please enter content"
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

                                $('.msgsuccess').text(rs.msg);
                                $('.notification').fadeIn('slow');
                                $('#form').trigger('reset');
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