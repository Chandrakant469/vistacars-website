function addSwitcher() {
  const currentURL = window.location.href;
  let urlLTR = "";
  let urlRTL = "";

  if (currentURL.includes("xhtml-rtl")) {
    urlLTR = currentURL.replace("xhtml-rtl", "xhtml");
    urlRTL = currentURL;
  } else {
    urlRTL = currentURL.replace("xhtml", "xhtml-rtl");
    urlLTR = currentURL;
  }

  const baseURL = document.getElementById("base-url").getAttribute("data-url");

  const dzSwitcher = `
    <div id="dzSwitcher-right" class="styleswitcher" >
      <div class="switcher-btn-bx">
        <a class="switch-btn closed">
          <span class="fa fa-table fa-lg"></span>
        </a>
      </div>
      <div class="content">
        <div class="text-center">
          <div class="services">
            <div class="row" style="background-color:#fff;margin-top: 0;">
              ${createServiceLink(baseURL + 'book-now', 'fa-calendar', 'E-Booking')}
               ${createServiceLink(baseURL + 'sell-your-car', 'fa-car', 'Sell Your Car')}
              
            </div>
            <div class="row" style="background-color:#fff;margin-top: 0;">
              ${createServiceLink(baseURL + 'emi-calculator', 'fa-calculator', 'Get EMI')}
              ${createServiceLink('https://marutiinsurance.autovista.in/', 'fa-newspaper-o', 'Insurance')}
            </div>
            
            <div class="row" style="background-color:#fff;margin-top: 0;">
            ${createServiceLink(baseURL + 'book-a-test-drive', 'fa-road', 'Book A Test Drive')}
            ${createServiceLink(baseURL + 'book-appointment', 'fa-dashboard', 'Service Appointment')}
            </div>
          </div>
        </div>
      </div>
    </div>
  `;

  if (!document.getElementById("dzSwitcher")) {
    document.body.insertAdjacentHTML("beforeend", dzSwitcher);
  }
}

function createServiceLink(url, icon, text) {
  return `
    <div class="slide_border col-md-6 col-xs-6" style="padding: 10px;">
      <a href="${url}">
        <p class="piconclass"  style="margin-bottom: 0px;">
          <i class="fa ${icon} iconsclass" aria-hidden="true"></i>
        </p>
        <p class="side_p font_enquiry_white" style="font-weight: bold; margin-bottom: 1px; margin-top:10px;">
          ${text}
        </p>
      </a>
    </div>
  `;
}

jQuery(window).on("load", function () {
  jQuery(".styleswitcher").animate({ left: "-220px" });
  jQuery(".styleswitcher-right").animate({ right: "-220px", left: "auto" });
  jQuery(".switch-btn").addClass("closed");

  addSwitcher();

  jQuery(".switch-btn").on("click", function () {
    if (jQuery(this).hasClass("open")) {
      toggleSwitcher("close");
    } else {
      toggleSwitcher("open");
    }
  });
});

function toggleSwitcher(state) {
  if (state === "open") {
    jQuery(".switch-btn").removeClass("closed").addClass("open");
    jQuery(".styleswitcher").animate({ left: "0" });
    jQuery(".styleswitcher-right").animate({ right: "0", left: "auto" });
  } else {
    jQuery(".switch-btn").removeClass("open").addClass("closed");
    jQuery(".styleswitcher").animate({ left: "-220px" });
    jQuery(".styleswitcher-right").animate({ right: "-220px", left: "auto" });
  }
}

jQuery(".background-switcher li img").on("click", function () {
  const imgbg = jQuery(this).attr("dir");
  jQuery("#bg").css({ backgroundImage: `url(${imgbg})` });
});

jQuery(".pattern-switcher li img").on("click", function () {
  const imgbg = jQuery(this).attr("dir");
  jQuery("#bg").css({ backgroundImage: `url(${imgbg})`, backgroundSize: "auto" });
});

jQuery(".bg-color-switcher li a").on("click", function () {
  const bgcolor = jQuery(this).attr("dir");
  jQuery("#bg").css({ backgroundColor: bgcolor, backgroundImage: "" });
});

jQuery(".layout-view li").on("click", function () {
  jQuery(".layout-view li").removeClass("active");
  jQuery(this).addClass("active");
});

jQuery(".skin-view li").on("click", function () {
  jQuery(".skin-view li").removeClass("active");
  jQuery(this).addClass("active");
});

jQuery(".wide-layout").on("click", function () {
  jQuery("body").addClass("wide-layout").removeClass("boxed");
});

jQuery(".boxed").on("click", function () {
  jQuery("body").addClass("boxed").removeClass("wide-layout");
});

jQuery(".rtl").on("click", function () {
  jQuery("body").addClass("rtl").removeClass("ltr");
  jQuery("head").append('<link rel="stylesheet" class="rtl" href="assets/css/rtl.css" type="text/css"/>');
});

jQuery(".ltr").on("click", function () {
  jQuery("body").addClass("ltr").removeClass("rtl");
  jQuery('link.rtl').remove();
});

// Toggle switcher button to close if clicked anywhere outside
jQuery(document).on('click', function (e) {
  if (!jQuery(e.target).closest('.styleswitcher, .switch-btn').length) {
    toggleSwitcher("close");
  }
});
