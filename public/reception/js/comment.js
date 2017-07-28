/**
 * Created by liang on 2017/3/27.
 */
var t = '<form class="ui reply form" method="POST"><div class="field"><textarea name="body" required></textarea></div><div class="btn btn-default Reply--cancel--button" id="Reply--cancel--button">取消回复</div><div class="Button Button--primary reply__button" id="reply__button">发表回复</div><span class="errors comment-errors">请认真发评论哦,至少 <strong>6</strong> 个字符</span></form>';
$(".comment .reply").on("click", function() {
    var r = $(this),
        e = $(this).parent().parent().find(".reply-form-container"),
        n = $(this).parent().parent();
    return $(this).hasClass("active") ? (e.find("form").remove(), $(this).removeClass("active"), !1) : (r.addClass("active"), e.append(t), $(".Reply--cancel--button").on("click", function() {
            return $(this).parent().remove(), r.removeClass("active"), !1
        }), void $(".reply__button").on("click", function() {
            var t = $(this);
            r.attr("data-userid");
            t.attr("disabled", "disabled"), t.text("正在回复评论...");
            var a = $(this).parent().find("textarea").val();
            return $.trim(a).length < 6 ? ($(".comment-errors").show(), !1) : ($.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="token"]').attr("value")
                    }
                }), void $.ajax({
                    url: r.attr("data-url"),
                    type: "post",
                    dataType: "json",
                    data: {
                        content: a,
                        parent_id: r.attr("data-parent_id")
                    },
                    success: function(a) {
                        if ("failed" === a.status) return $(".comment-errors").show(), !1;
                        var o = '<div class="comments" style="margin-top:-2.5em;"><div class="comment "><a class="avatar"><img src="' + '/AdminLTE/dist/img/avatar.png' + '"></a><div class="content"><a class="author">' + '' + '</a><div class="metadata"><span class="date">刚刚</span> </div><div class="text Post-body" id="Comment__Post_content"> ' + a.content + ' </div> <div class="actions"><a class="reply"> 回复</a> <a class="hide">隐藏</a> <a class="save">分享</a>';
                        n.parent().append(o), t.removeAttr("disabled"), t.text("发表回复"), e.find("form").remove(), r.removeClass("active")
                    }
                }))
        }))
}), $("#Comment__body").on("focus", function() {
    $(this).parent().parent().addClass("active"), $("#Comment--cancel--button").on("click", function() {
        $(this).parent().removeClass("active"), $(".comment-errors").hide()
    })
});
var r = $("#Comment-form"),
    e = $(".Comment--post--button"),
    n = $("#Comments-list");
e.attr("data-to-user-id");
e.on("click", function() {
    e.text("正在发表评论...");
    var t = $("#Comment__body").val();
    if ($.trim(t).length < 6) return $(".comment-errors").show(), !1;
    var a = !0;
    r.on("submit", function() {
        return e.attr("disabled", "disabled"), a ? (a = !1, $(this).ajaxSubmit({
                dataType: "json",
                success: function(t) {
                    if ("failed" === t.status) return $(".comment-errors").show(), !1;
                    var o = '<div class="comment"><a class="avatar avatar-large"><img src="' + Laravist.avatar + '"></a><div class="content"><a class="author">' + Laravist.username + '</a><div class="metadata"><span class="date">刚刚</span> </div><div class="text" id="Reply__Post_content"> ' + t.content + ' </div> <div class="actions"><a class="reply"> 回复</a> <a class="hide">隐藏</a> <a class="save">分享</a>';
                    "lesson" == r.attr("data-page") && (n.children().length > 0 ? $(o).insertBefore(n.children().first()) : n.append(o)), "article" == r.attr("data-page") && (n.children().length > 0 ? $(o).insertBefore(n.children().first()) : n.append(o)), "tutorials" == r.attr("data-page") && (n.children().length > 0 ? $(o).insertBefore(n.children().first()) : n.append(o)), "discuss" == r.attr("data-page") && n.append(o), $("#Comment__body").val(""), e.removeAttr("disabled"), a = !0, e.text("发表评论"), $(".comment-errors").hide()
                }
            }), !1) : void 0
    })
}), $("#Comment__body").on("keydown", function(t) {
    (t.metaKey || t.ctrlKey) && 13 == t.keyCode && ($("#Comment--post--button").click(), $("#Comment--post--button").prop("disabled", !0))
})