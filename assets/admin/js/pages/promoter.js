/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(function() {
    $(".triggerUploadLogo").click(function(){
        console.log('test');
        $("#fileUploadAvatar").trigger("click");
    });
    $('#fileUploadAvatar').change(function()
    {
        console.log("changed");
        $("#uploadAvatarForm").ajaxForm(
        {
            success:       showResponse,  // post-submit callback
            dataType:     'json'
        }).submit();
    });

function showResponse(data)  {
    console.log("dir: " + data.msg);
    console.log("link: " + data.url);
    console.log("name: " + data.fileName);
    $("#profileAvatarName").val(data.url);
    $("#profileAvatar").val(data.fileName);
    $("#event_preview").attr("src", data.url).fadeIn();
    return false;
  }

    $('.sidebar-menu').find('li').removeClass('active');
$('.sb-customer').parent('li').addClass('active');


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
                    firstname: "required",
                    lastname: "required",
                    password: "required",
                    email: {
                        required : true,
                        email : true
                    }
		},
		messages: {
                    firstname: "Please enter First name",
                    lastname: "Please enter last name",
                    password: "Please choose a password",
                    email: {
                        required : "Please enter email",
                        email : "Invalid email"
                    }
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
                                $('.msg-success').text(rs.msg);
                                $('.alert-success').fadeIn('slow');
                                $('#form').trigger('reset');
                            }
                            else{
                                $('.notification').hide();
                                $('.msg-error').text(rs.msg);
                                $('.alert-danger').fadeIn('slow');
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



    $("#editForm").validate({
		rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required : true,
                        email : true
                    }
        },
        messages: {
                    firstname: "Please enter First name",
                    lastname: "Please enter last name",
                    email: {
                        required : "Please enter email",
                        email : "Invalid email"
                    }
        },
                submitHandler: function(){
                    var data_form = $('#editForm').serialize();
                    console.log(data_form);
                    $.ajax({
                        type: 'post',
                        url: $('#editForm').attr('action'),
                        data: data_form,
                        dataType: 'json',
                        success: function(rs){
                            if (rs.status){
                                $('.notification').hide();
                                $('.alert-success').fadeIn('slow');
//                                var refresh = setTimeout(function(){
//                                    window.location.reload();
//                                },2000)
                            }
                            else{
                                $('.notification').hide();
                                $('.alert-danger').fadeIn('slow');
                            }
                            return false;
                        }
                    });
                    return false;
                }

	});

    $("#changeForm").validate({
        rules: {
                    password: "required"
        },
        messages: {
                    password: "Please enter new password"
                    },
                submitHandler: function(){
                    var data_form = $('#changeForm').serialize();
                    console.log(data_form);
                    $.ajax({
                        type: 'post',
                        url: $('#changeForm').attr('action'),
                        data: data_form,
                        dataType: 'json',
                        success: function(rs){
                            if (rs.status){
                                $('.notification').hide();
                                $('.alert-success').fadeIn('slow');
//                                var refresh = setTimeout(function(){
//                                    window.location.reload();
//                                },2000)
                            }
                            else{
                                $('.notification').hide();
                                $('.alert-danger').fadeIn('slow');
                            }
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


