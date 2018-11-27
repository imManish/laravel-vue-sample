"use strict";

function refreshAnimation(n, t) {
    var total_steps = n.find("li").length,
        one = 0,
        move_distance = n.width() / total_steps,
        step_width = move_distance;
    move_distance *= t;
    var current = t + 1;
    one == current ? move_distance -= 10 : current == total_steps && (move_distance += 10), n.find(".moving-tab").css("width", step_width), $(".moving-tab").css({
        transform: "translate3d(" + move_distance + "px, 0px, 0)",
        transition: "all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)"
    })
}! function(n) {
    n.fn.bootstrapWizard = function(t) {
        if ("string" == typeof t) {
            var i = Array.prototype.slice.call(arguments, one);
            return one === i.length && i.toString(), this.data("bootstrapWizard")[t](i)
        }
        return this.each(function(i) {
            var e = n(this);
            if (!e.data("bootstrapWizard")) {
                var o = new function(t, i) {
                    t = n(t);
                    var e = this,
                        o = 'li:has([data-toggle="tab"])',
                        a = n.extend({}, n.fn.bootstrapWizard.defaults, i),
                        r = null,
                        s = null,
                        index = null;
                    this.rebindClick = function(n, t) {
                        n.unbind("click", t).bind("click", t)
                    }, this.fixNavigationButtons = function() {
                        if (r.length || (s.find("a:first").tab("show"), r = s.find(o + ":first")), n(a.previousSelector, t).toggleClass("disabled", e.firstIndex() >= e.currentIndex()), n(a.nextSelector, t).toggleClass("disabled", e.currentIndex() >= e.navigationLength()), e.rebindClick(n(a.nextSelector, t), e.next), e.rebindClick(n(a.previousSelector, t), e.previous), e.rebindClick(n(a.lastSelector, t), e.last), e.rebindClick(n(a.firstSelector, t), e.first), a.onTabShow && "function" == typeof a.onTabShow && !1 === a.onTabShow(r, s, e.currentIndex())) return !1
                    }, this.next = function(n) {
                        return !t.hasClass("last") && (!a.onNext || "function" != typeof a.onNext || !1 !== a.onNext(r, s, e.nextIndex())) && (index = e.nextIndex(), void(index > e.navigationLength() || s.find(o + ":eq(" + index + ") a").tab("show")))
                    }, this.previous = function(n) {
                        return !t.hasClass("first") && (!a.onPrevious || "function" != typeof a.onPrevious || !1 !== a.onPrevious(r, s, e.previousIndex())) && (index = e.previousIndex(), void(index < 0 || s.find(o + ":eq(" + index + ") a").tab("show")))
                    }, this.first = function(n) {
                        return (!a.onFirst || "function" != typeof a.onFirst || !1 !== a.onFirst(r, s, e.firstIndex())) && !t.hasClass("disabled") && void s.find(o + ":eq(0) a").tab("show")
                    }, this.last = function(n) {
                        return (!a.onLast || "function" != typeof a.onLast || !1 !== a.onLast(r, s, e.lastIndex())) && !t.hasClass("disabled") && void s.find(o + ":eq(" + e.navigationLength() + ") a").tab("show")
                    }, this.currentIndex = function() {
                        return s.find(o).index(r)
                    }, this.firstIndex = function() {
                        return 0
                    }, this.lastIndex = function() {
                        return e.navigationLength()
                    }, this.getIndex = function(n) {
                        return s.find(o).index(n)
                    }, this.nextIndex = function() {
                        return s.find(o).index(r) + 1
                    }, this.previousIndex = function() {
                        return s.find(o).index(r) - 1
                    }, this.navigationLength = function() {
                        return s.find(o).length - 1
                    }, this.activeTab = function() {
                        return r
                    }, this.nextTab = function() {
                        return s.find(o + ":eq(" + (e.currentIndex() + 1) + ")").length ? s.find(o + ":eq(" + (e.currentIndex() + 1) + ")") : null
                    }, this.previousTab = function() {
                        return e.currentIndex() <= 0 ? null : s.find(o + ":eq(" + parseInt(e.currentIndex() - 1) + ")")
                    }, this.show = function(n) {
                        return isNaN(n) ? t.find(o + " a[href=#" + n + "]").tab("show") : t.find(o + ":eq(" + n + ") a").tab("show")
                    }, this.disable = function(n) {
                        s.find(o + ":eq(" + n + ")").addClass("disabled")
                    }, this.enable = function(n) {
                        s.find(o + ":eq(" + n + ")").removeClass("disabled")
                    }, this.hide = function(n) {
                        s.find(o + ":eq(" + n + ")").hide()
                    }, this.display = function(n) {
                        s.find(o + ":eq(" + n + ")").show()
                    }, this.remove = function(t) {
                        var i = t[0],
                            e = void 0 !== t[1] && t[1],
                            a = s.find(o + ":eq(" + i + ")");
                        if (e) {
                            var r = a.find("a").attr("href");
                            n(r).remove()
                        }
                        a.remove()
                    };
                    var d = function(t) {
                            var i = s.find(o).index(n(t.currentTarget).parent(o));
                            if (a.onTabClick && "function" == typeof a.onTabClick && !1 === a.onTabClick(r, s, e.currentIndex(), i)) return !1
                        },
                        l = function(t) {
                            var element = n(t.target).parent();
                            var i = s.find(o).index(element);
                            return !element.hasClass("disabled") && (!a.onTabChange || "function" != typeof a.onTabChange || !1 !== a.onTabChange(r, s, e.currentIndex(), i)) && (r = element, void e.fixNavigationButtons())
                        };
                    this.resetWizard = function() {
                        n('a[data-toggle="tab"]', s).off("click", d), n('a[data-toggle="tab"]', s).off("shown shown.bs.tab", l), s = t.find("ul:first", t), r = s.find(o + ".active", t), n('a[data-toggle="tab"]', s).on("click", d), n('a[data-toggle="tab"]', s).on("shown shown.bs.tab", l), e.fixNavigationButtons()
                    }, s = t.find("ul:first", t), r = s.find(o + ".active", t), s.hasClass(a.tabClass) || s.addClass(a.tabClass), a.onInit && "function" == typeof a.onInit && a.onInit(r, s, 0), a.onShow && "function" == typeof a.onShow && a.onShow(r, s, e.nextIndex()), n('a[data-toggle="tab"]', s).on("click", d), n('a[data-toggle="tab"]', s).on("shown shown.bs.tab", l)
                }(e, t);
                e.data("bootstrapWizard", o), o.fixNavigationButtons()
            }
        })
    }, n.fn.bootstrapWizard.defaults = {
        tabClass: "nav nav-pills",
        nextSelector: ".wizard li.next",
        previousSelector: ".wizard li.previous",
        firstSelector: ".wizard li.first",
        lastSelector: ".wizard li.last",
        onShow: null,
        onInit: null,
        onNext: null,
        onPrevious: null,
        onLast: null,
        onFirst: null,
        onTabChange: null,
        onTabClick: null,
        onTabShow: null
    }
}(jQuery), $(".wizard-container").bootstrapWizard({
    tabClass: "wizard-menu nav nav-pills",
    nextSelector: ".btn-next",
    previousSelector: ".btn-previous",
    onNext: function(n, t, i) {
        if (!$(".wizard-container form").valid()) return $validator.focusInvalid(), !1
    },
    onPrevious: function(n, t, i) {
        if (!$(".wizard-container form").valid()) return $validator.focusInvalid(), !1
    },
    onInit: function(n, t, i) {
        var e = t.find("li").length;
        var width = 100 / e;
        var o = t.closest(".wizard-container");
        var display_width = $(document).width();
        display_width < 600 && e > 3 && (width = 50), t.find("li").css("width", width + "%");
        var first_li = t.find("li:first-child a").html(),
            moving_div = $('<div class="moving-tab"> </div>');
        moving_div.append(first_li), $(".wizard-container .wizard-menu").append(moving_div), refreshAnimation(o, i), $(".moving-tab").css("transition", "transform 0s")
    },
    onTabClick: function(n, t, i) {
        return !!$(".wizard-container form").valid()
    },
    onTabShow: function(n, t, i) {
        var e = t.find("li").length,
            o = i + 1,
            a = o / e * 100;
        $(".wizard-container").find(".progress-bar").css({
            width: a + "%"
        });
        var r = t.closest(".wizard-container");
        o >= e ? ($(r).find(".btn-next").hide(), $(r).find(".btn-finish").show()) : ($(r).find(".btn-next").show(), $(r).find(".btn-finish").hide());
        var button_text = t.find("li:nth-child(" + o + ") a").html();
        setTimeout(function() {
            $(".moving-tab").html(button_text)
        }, 150);
        var s = $(".footer-checkbox");
        0 == !i ? $(s).css({
            opacity: "0",
            visibility: "hidden",
            position: "absolute"
        }) : $(s).css({
            opacity: "1",
            visibility: "visible"
        }), refreshAnimation(r, i)
    }
});