/*
 * @Author: Mayuko
 * @Date:   2017-02-01 00:29:01
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-04 11:02:07
 */

'use strict';
$(document).ready(function () {
    var u = $('#userinfo').val();
    $('#content').on('click', '.btn-cloudmusic-delete', function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: "./cloudmusic/deleteCloudmusic.php?id=" + id + "&u=" + u,
            dataType: "json",
            success: function (result) {
                if (result.code == 1) {
                    $.ajax({
                        type: "GET",
                        url: "cloudmusic.php?u=" + u,
                        success: function (result) {
                            $("#content").html(result);
                            $('#cloudmusic-info').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>删除成功</div>');
                        }
                    });

                }
                else {
                    $('#cloudmusic-info').html('<div class="alert alert-danger" role="alert">删除失败</div>');
                }
            }
        });
    });
    $('#content').on('click', '#btn-cloudmusic-now', function () {
        $.ajax({
            type: "GET",
            url: "./cloudmusic/initCloudmusic.php?u=" + u,
            dataType: "json",
            success: function (result) {
                if (result.code == 1) {
                    $.ajax({
                        type: "GET",
                        url: "cloudmusic.php?u=" + u,
                        success: function (data) {
                            $("#content").html(data);
                            $('#cloudmusic-info').html('<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + result.msg + '</div>');
                        }
                    });
                }
                else {
                    $('#cloudmusic-info').html('<div class="alert alert-danger" role="alert">签到失败</div>');
                }
            }
        });

    });
    $('#content').on('click', '#cloudmusic-add', function () {
        if ($('#input-cloudmusic-cookie').val() != "") {
            $.ajax({
                type: "GET",
                url: "./cloudmusic/addCloudmusic.php?u=" + u + "&c=" + $('#input-cloudmusic-cookie').val(),
                dataType: "json",
                success: function (result) {
                    if (result.code == 1) {
                        $.ajax({
                            type: "GET",
                            url: "cloudmusic.php?u=" + u,
                            success: function (result) {
                                $("#content").html(result);
                                $('#cloudmusic-info').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>添加成功</div>');
                            }
                        });
                    }
                    else {
                        $('#cloudmusic-info').html('<div class="alert alert-danger" role="alert">Cookies验证失败</div>');
                    }
                }
            });
        }
        else {
            alert('请输入Cookies');
        }
    });
});