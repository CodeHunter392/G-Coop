;(function () {
  "use strict"

  // custom scrollbar

  // $("html").niceScroll({
  //   styler: "fb",
  //   cursorcolor: "#07706e",
  //   cursorwidth: "6",
  //   cursorborderradius: "0px",
  //   background: "#424f63",
  //   spacebarenabled: true,
  //   cursorborder: "0",
  //   zindex: "1000"
  // });

  // $(".left-side").niceScroll({
  //   styler: "fb",
  //   cursorcolor: "#07706e",
  //   cursorwidth: "3",
  //   cursorborderradius: "0px",
  //   background: "#424f63",
  //   spacebarenabled: false,
  //   cursorborder: "0"
  // });

  // $(".left-side").getNiceScroll();
  if ($("body").hasClass("left-side-collapsed")) {
    $(".left-side")
      // .getNiceScroll()
      .show()
  }

  // Toggle Left Menu
  jQuery(".menu-list > a").click(function () {
    var parent = jQuery(this).parent()
    var sub = parent.find("> ul")

    if (!jQuery("body").hasClass("left-side-collapsed")) {
      if (sub.is(":visible")) {
        sub.slideUp(200, function () {
          parent.removeClass("nav-active")
          jQuery(".main-content").css({height: ""})
          mainContentHeightAdjust()
        })
      } else {
        visibleSubMenuClose()
        parent.addClass("nav-active")
        sub.slideDown(200, function () {
          mainContentHeightAdjust()
        })
      }
    }
    return false
  })

  function visibleSubMenuClose() {
    jQuery(".menu-list").each(function () {
      var t = jQuery(this)
      if (t.hasClass("nav-active")) {
        t.find("> ul").slideUp(200, function () {
          t.removeClass("nav-active")
        })
      }
    })
  }

  function mainContentHeightAdjust() {
    // Adjust main content height
    var docHeight = jQuery(document).height()
    if (docHeight > jQuery(".main-content").height())
      jQuery(".main-content").height(docHeight)
  }

  // Menu Toggle
  jQuery(".toggle-btn").click(function () {
    $(".left-side").getNiceScroll().hide()

    if ($("body").hasClass("left-side-collapsed")) {
      $(".left-side").getNiceScroll().hide()
    }
    var body = jQuery("body")
    var bodyposition = body.css("position")

    if (bodyposition != "relative") {
      if (!body.hasClass("left-side-collapsed")) {
        body.addClass("left-side-collapsed")
        jQuery(".custom-nav ul").attr("style", "")

        jQuery(this).addClass("menu-collapsed")
      } else {
        body.removeClass("left-side-collapsed chat-view")
        jQuery(".custom-nav li.active ul").css({display: "block"})

        jQuery(this).removeClass("menu-collapsed")
      }
    } else {
      if (body.hasClass("left-side-show")) body.removeClass("left-side-show")
      else body.addClass("left-side-show")

      mainContentHeightAdjust()
    }
  })

  searchform_reposition()

  jQuery(window).resize(function () {
    if (jQuery("body").css("position") == "relative") {
      jQuery("body").removeClass("left-side-collapsed")
    } else {
      jQuery("body").css({left: "", marginRight: ""})
    }

    searchform_reposition()
  })

  function searchform_reposition() {
    if (jQuery(".searchform").css("position") == "relative") {
      jQuery(".searchform").insertBefore(".left-side-inner .logged-user")
    } else {
      jQuery(".searchform").insertBefore(".menu-right")
    }
  }

  // panel collapsible
  $(".panel .tools .fa").click(function () {
    var el = $(this).parents(".panel").children(".panel-body")
    if ($(this).hasClass("fa-chevron-down")) {
      $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up")
      el.slideUp(200)
    } else {
      $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down")
      el.slideDown(200)
    }
  })

  $(".todo-check label").click(function () {
    $(this).parents("li").children(".todo-title").toggleClass("line-through")
  })

  $(document).on("click", ".todo-remove", function () {
    $(this).closest("li").remove()
    return false
  })

  $("#sortable-todo").sortable()

  // panel close
  $(".panel .tools .fa-times").click(function () {
    $(this).parents(".panel").parent().remove()
  })

  // popovers

  $(".popovers").popover()

  // tool tips

  $(".tooltips").tooltip()

  // count student when trying to print PV notes
  $(
    'select[name="classe"], select[name="annee_scolaire"], select[name="ordre_option"], input[name="resulat_par_page"]'
  ).change(function () {
    var classeId = $('select[name="classe"] option:selected').val()
    var anneeId = $('select[name="annee_scolaire"] option:selected').val()
    var orderByName = $('select[name="ordre_option"] option:selected').val()
    var resulat_par_page = $('input[name="resulat_par_page"]').val()

    if (
      classeId != "" &&
      anneeId != "" &&
      orderByName != "" &&
      resulat_par_page != null
    ) {
      $.ajax({
        url: "./requests/pv-notes/request-pv-note-pages.php",
        type: "POST",
        data: {
          anneeId: anneeId,
          classeId: classeId,
          order: orderByName,
          page_result: resulat_par_page,
        },
        success: function (response) {
          // console.log(response)
          $("#page-input-placeholder").html(response)
        },
      })
    }
  })
})(jQuery)
