(function($) {
    $(document).ready(function() {

        // $(document).on('click', function (e) {
        //     let overlay = $(".overlay");
        //     console.log(e.target.classList.contains("nav-layout overlay"));
        //     overlay.each(function () {
        //         if (this.classList.contains("hidden")) {
        //             return;
        //         }
        //
        //         $(this).addClass("hidden")
        //     })
        // });
        // e.stopPropagation();

        $(".has-children").on("click", function (e) {
            e.preventDefault();
            $(this).siblings("nav").toggleClass( "hidden" );
            $(this).parent("li").siblings("li").children("nav").addClass( "hidden" );
            $(".search-layout").addClass( "hidden" );
        });

        $(".search-button").on("click", function (e) {
            $(".nav-layout").addClass( "hidden" );
            $(".search-layout").toggleClass( "hidden" );
            document.getElementById('s').focus();
        });

        $(".burger-button").on("click", function (e) {
            $(".mobile-header").removeClass( "hidden" );
        });

        $(".close-button").on("click", function (e) {
            $(".mobile-header").addClass( "hidden" );
        });

        $(".close-sub").on("click", function (e) {
            console.log('test')
            var sub = $(this).data("sub");
            $("#submenu-" + sub).toggleClass( "hidden" );
        });

        $(".show-sub-mobile").on("click", function (e) {
            e.preventDefault();
            var sub = $(this).data("sub");
            $("#submenu-" + sub).toggleClass( "hidden" );
        });

        $(".top-burger-button").on("click", function (e) {
            $(".top-navigation-list").toggleClass( "hidden" );
        });


        $(".open-sidemenu-icon").on("click", function (e) {
            $("#aside .navigation-panel > ul").toggle();
            $(this).toggleClass("rotate270")
        });

        $(".slider_image").each(function () {
            var url = $(this).data('url');
            if (url) {
                $(this).on("click", function () {
                    window.open(url);
                })
            }
        })


    });
}(jQuery));

function obsExporterBackup() {
    let list = document.getElementsByClassName("list-group-item");
    for (let item of list) {
        let link = item.querySelector("a");
        let href = link.getAttribute("href");
        let params = href.split("=");
        let course = params[params.length - 1];

        link.setAttribute("href", "https://obs.hku.edu.tr/oibs/bologna/progCourses.aspx?lang=tr&curSunit="+course)
    }
}