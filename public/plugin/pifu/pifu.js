var pfhtml = "<div class=\'pfys  hidden-xs\'><i class=\'Hui-iconfont \' aria-hidden=\'true\'>&#xe61d;</i><a class=\'pfysA pfy1\' name=\'#222222\'></a><a class=\'pfysA pfy2\' name=\'#f4f4f4\'></a></div><div class=\'qq visible-xs\'><a class=\'Hui-iconfont \' href='/home/user/login' aria-hidden=\'true\'>&#xe67b;</a></div>";
var logout = "<div class=\'pfys  hidden-xs\'><i class=\'Hui-iconfont \' aria-hidden=\'true\'>&#xe61d;</i><a class=\'pfysA pfy1\' name=\'#222222\'></a><a class=\'pfysA pfy2\' name=\'#f4f4f4\'></a></div><div class=\'qq visible-xs\'><a class=\'Hui-iconfont \' href='/home/user/logout' aria-hidden=\'true\'>&#xe67b;</a></div>";

$("body").append(pfhtml);

uid = $("#script_uid").attr('dataid');
// alert(uid);
if(uid){
	$("body").append(logout);
}else{
	$("body").append(pfhtml);
}

$(document).ready(function () {
    if (typeof localStorage.bgColor != 'undefined') {
        $("body").css("background", localStorage.bgColor)
    }
});
$(".pfysA").click(function () {
    $("body").css("background", $(this).attr("name"));
    localStorage.bgColor = $(this).attr("name")
});