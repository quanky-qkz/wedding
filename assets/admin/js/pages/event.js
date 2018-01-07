/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
    $( "#date" ).datepicker({
      format: 'yyyy-mm-dd'
    });
    $(".triggerUploadLogo").click(function(){
        $("#fileUploadLogo").trigger("click");
    });
    $('#fileUploadLogo').change(function()
    {
      var file = document.getElementById('fileUploadLogo').files[0];

      if(file && file.size < 2048) { // 10 MB (this size is in bytes)
          //Submit form
          console.log('OK')
      } else {
          //Prevent default and display error
          console.log('not ok')
          evt.preventDefault();
      }
      return;
        $("#uploadLogoForm").ajaxForm(
        {
            success:       showResponse,  // post-submit callback
            dataType:     'json'
        }).submit();
    });

function showResponse(data)  {
    console.log("data: " + data);
    console.log("dir: " + data.msg);
    console.log("link: " + data.url);
    console.log("name: " + data.fileName);
    $("#eventLogoName").val(data.url);
    $("#eventLogo").val(data.fileName);
    $("#event_preview").attr("src", data.url).fadeIn();
    return false;
  }

$('.sidebar-menu').find('li').removeClass('active');
$('.sb-event').parent('li').addClass('active');
    var $table = $('#dataTable').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": true
    });

    $("#form_send").validate({
        rules: {
            message: "required"
        },
        messages: {
            message: "Message required"
        },
                submitHandler: function(){
                    var data_form = $('#form_send').serialize();
                    console.log(data_form);
                    console.log($("#form_send"));
                    $.ajax({
                        type: 'post',
                        url: $('#form_send').attr('action'),
                        data: data_form,
                        dataType: 'json',
                        success: function(rs){
                            if (rs.status){
                                $('.notification').hide();
                                $('.msgsuccess').text(rs.msg);
                                $('.notification').fadeIn('slow');
                                /*$('html, body').animate({
                                    scrollTop: $('.msgsuccess').offset().top-30
                                }, 2000);*/
                                $('#form').trigger('reset');
                            }
                            else{
                                console.log(rs.msg);
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

    $("#form").validate({
        rules: {
            name: "required",
            date: {
                required: true,
                date: true
            },
            venue: "required",
            time: "required",
            eventLogo: "required",
            postcode: "required"
        },
        messages: {
            name: "Name required",
            date: {
                required: "Start date reequired",
                date: "Example 2014-10-30"
            },
            venue: "Venue required",
            time: "Time required",
            eventLogo: "Logo required",
            postcode: "Postcode required"
        },
        submitHandler: function() {
            var data_form = $('#form').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#form').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
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
                    var hideNoti = setTimeout(function() {
                        $('.notification').fadeOut('slow');
                    }, 2000);
                    return false;
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
            return false;
        }

    });



    $("#editForm").validate({
        rules: {
            name: "required",
            date: {
                required: true,
                date: true
            },
            venue: "required",
            time: "required",
            eventLogo: "required",
            postcode: "required"
        },
        messages: {
            name: "Name required",
            date: {
                required: "Start date reequired",
                date: "Example 2014-10-30"
            },
            venue: "Venue required",
            time: "Time required",
            eventLogo: "Logo required",
            postcode: "Postcode required"
        },
        submitHandler: function() {
            var data_form = $('#editForm').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#editForm').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    if (rs.status) {
                        $('.notification').hide();
                        $('.alert-success').fadeIn('slow');
                    }
                    else {
                        $('.notification').hide();
                        $('.alert-danger').fadeIn('slow');
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






    $("#addProductForm").validate({
        rules: {
            offerValue: {
                required: true,
                digits: true,
                min: 0,
                max: 100
            }
        },
        messages: {
            offerValue: {
                required: "Required",
                digits: "Integer value from 0 to 100 only",
                min: "Integer value from 0 to 100 only",
                max: "Integer value from 0 to 100 only"
            }
        },
        submitHandler: function() {
            var data_form = $('#addProductForm').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#addProductForm').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    if (rs.status) {
                        window.location.href = rs.href;
                    }
                    else {
                        $('.notification').hide();
                        $('.alert-danger').fadeIn('slow');
                    }
                    return false;
                }
            });
            return false;
        }

    });

    $("#addEventForm").validate({
        rules: {
            offerValue: {
                required: true,
                digits: true,
                min: 0,
                max: 100
            }
        },
        messages: {
            offerValue: {
                required: "Required",
                digits: "Integer value from 0 to 100 only",
                min: "Integer value from 0 to 100 only",
                max: "Integer value from 0 to 100 only"
            }
        },
        submitHandler: function() {
            var data_form = $('#addEventForm').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#addEventForm').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    if (rs.status) {
                        window.location.href = rs.href;
                    }
                    else {
                        $('.notification').hide();
                        $('.alert-danger').fadeIn('slow');
                    }
                    return false;
                }
            });
            return false;
        }

    });


    $("#addBrandForm").validate({
        rules: {
            offerValue: {
                required: true,
                digits: true,
                min: 0,
                max: 100
            }
        },
        messages: {
            offerValue: {
                required: "Required",
                digits: "Integer value from 0 to 100 only",
                min: "Integer value from 0 to 100 only",
                max: "Integer value from 0 to 100 only"
            }
        },
        submitHandler: function() {
            var data_form = $('#addBrandForm').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#addBrandForm').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    if (rs.status) {
                        window.location.href = rs.href;
                    }
                    else {
                        $('.notification').hide();
                        $('.msg-error-brand').text(rs.msg);
                        $('.alert-danger-brand').fadeIn('slow');
                    }
                    var timOut = setTimeout(function() {
                        $('.notification').fadeOut('slow');
                    }, 3000);
                    return false;
                }
            });
            return false;
        }

    });


    $("#addGroupForm").validate({
        rules: {
            offerValue: {
                required: true,
                digits: true,
                min: 0,
                max: 100
            }
        },
        messages: {
            offerValue: {
                required: "Required",
                digits: "Integer value from 0 to 100 only",
                min: "Integer value from 0 to 100 only",
                max: "Integer value from 0 to 100 only"
            }
        },
        submitHandler: function() {
            var data_form = $('#addGroupForm').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#addGroupForm').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    if (rs.status) {
                        window.location.href = rs.href;
                    }
                    else {
                        $('.notification').hide();
                        $('.msg-error-group').text(rs.msg);
                        $('.alert-danger-group').fadeIn('slow');
                    }
                    var timOut = setTimeout(function() {
                        $('.notification').fadeOut('slow');
                    }, 3000);
                    return false;
                }
            });
            return false;
        }

    });


    $("#addCategoryForm").validate({
        rules: {
            offerValue: {
                required: true,
                digits: true,
                min: 0,
                max: 100
            }
        },
        messages: {
            offerValue: {
                required: "Required",
                digits: "Integer value from 0 to 100 only",
                min: "Integer value from 0 to 100 only",
                max: "Integer value from 0 to 100 only"
            }
        },
        submitHandler: function() {
            var data_form = $('#addCategoryForm').serialize();
            console.log(data_form);
            $.ajax({
                type: 'post',
                url: $('#addCategoryForm').attr('action'),
                data: data_form,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    if (rs.status) {
                        window.location.href = rs.href;
                    }
                    else {
                        $('.notification').hide();
                        $('.msg-error-category').text(rs.msg);
                        $('.alert-danger-category').fadeIn('slow');
                    }
                    var timOut = setTimeout(function() {
                        $('.notification').fadeOut('slow');
                    }, 3000);
                    return false;
                }
            });
            return false;
        }

    });


    $('.removeEventFromProduct').click(function() {
        var href = $(this).attr("href");
        var curRow = $(this).parent('td').parent('tr');
        $.ajax({
            type: 'post',
            url: href,
            dataType: 'json',
            success: function(rs) {
                console.log(rs);
                if (rs.status) {
                    window.location.href = rs.href;
                    return false;
                }
                else {
                    return false;
                }
            }

        });
        return false;

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
