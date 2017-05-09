/*
 * @Author: Mayuko
 * @Date:   2017-01-31 14:06:43
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-01 13:06:37
 */

'use strict';
$(document).ready(function () {
    var u = $('#userinfo').val();
    $.ajax({
        type: "GET",
        url: "home.php?u=" + u,
        success: function (result) {
            $("#content").html(result);
        }
    });
    $("#profile-home").click(function () {
        $.ajax({
            type: "GET",
            url: "home.php?u=" + u,
            success: function (result) {
                $("#content").html(result);
            }
        });
    });
    $("#about-home").click(function () {
        $.ajax({
            type: "GET",
            url: "about.php",
            success: function (result) {
                $("#content").html(result);
            }
        });
    });
    $("#update-home").click(function () {
        $.ajax({
            type: "GET",
            url: "update.php",
            success: function (result) {
                $("#content").html(result);
            }
        });
    });
    $("#cloudmusic-home").click(function () {
        $.ajax({
            type: "GET",
            url: "cloudmusic.php?u=" + u,
            success: function (result) {
                $("#content").html(result);
            }
        });
    });

});
