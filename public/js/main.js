// Tour Version Mobile
$(".mainmenu").owlCarousel({
    loop: false,
    margin: 10,
    stagePadding: 10,
    items: 10,
    autoplay: false,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 10,
            dots: false,
        },
        767: {
            items: 10,
            dots: false,
        },
        992: {
            items: 10,
        },
        1200: {
            items: 10,
        },
        1500: {
            items: 10,
        },
    },
});

$(".status").owlCarousel({
    loop: false,
    margin: 10,
    items: 3,
    autoplay: false,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 3,
            dots: false,
        },
        767: {
            items: 3,
            dots: false,
        },
        992: {
            items: 3,
        },
        1200: {
            items: 3,
        },
        1500: {
            items: 3,
        },
    },
});

$(".contohReview").owlCarousel({
    loop: false,
    margin: 10,
    items: 1,
    autoplay: false,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 1,
            dots: false,
        },
        767: {
            items: 1,
            dots: false,
        },
        992: {
            items: 1,
        },
        1200: {
            items: 1,
        },
        1500: {
            items: 1,
        },
    },
});

$(".PreviewHotel").owlCarousel({
    loop: true,
    margin: 10,
    items: 1,
    autoplay: true,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 1,
            dots: false,
        },
        767: {
            items: 1,
            dots: false,
        },
        992: {
            items: 1,
        },
        1200: {
            items: 1,
        },
        1500: {
            items: 1,
        },
    },
});

$(".menumain").owlCarousel({
    loop: false,
    margin: 10,
    items: 4,
    autoplay: false,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 4,
            dots: false,
        },
        767: {
            items: 4,
            dots: false,
        },
        992: {
            items: 4,
        },
        1200: {
            items: 4,
        },
        1500: {
            items: 4,
        },
    },
});

$(".sliderutama").owlCarousel({
    loop: true,
    margin: 0,
    items: 2,
    autoplay: true,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 2,
            dots: false,
        },
        767: {
            items: 2,
            dots: false,
        },
        992: {
            items: 2,
        },
        1200: {
            items: 2,
        },
        1500: {
            items: 2,
        },
    },
});

$(".slidekedua").owlCarousel({
    loop: true,
    margin: 0,
    items: 1,
    autoplay: true,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 1,
            dots: false,
        },
        767: {
            items: 1,
            dots: false,
        },
        992: {
            items: 1,
        },
        1200: {
            items: 1,
        },
        1500: {
            items: 1,
        },
    },
});

// Testimonial

$(".kebun").owlCarousel({
    loop: true,
    margin: 0,
    items: 5,
    autoplay: false,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
    ],
    nav: true,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 5,
            dots: false,
        },
        767: {
            items: 5,
            dots: false,
        },
        992: {
            items: 5,
        },
        1200: {
            items: 5,
        },
        1500: {
            items: 5,
        },
    },
});

$(".darikebun").owlCarousel({
    loop: true,
    margin: 0,
    items: 3,
    autoplay: false,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
    ],
    nav: true,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 3,
            dots: false,
        },
        767: {
            items: 3,
            dots: false,
        },
        992: {
            items: 3,
        },
        1200: {
            items: 3,
        },
        1500: {
            items: 3,
        },
    },
});
$(".nameHotel").owlCarousel({
    loop: false,
    margin: 0,
    items: 2,
    autoplay: false,
    nav: false,
    dots: false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive: {
        0: {
            items: 2,
            dots: false,
        },
        767: {
            items: 2,
            dots: false,
        },
        992: {
            items: 2,
        },
        1200: {
            items: 2,
        },
        1500: {
            items: 2,
        },
    },
});

// scroll ubah warna
$(window).scroll(function () {
    if ($(window).scrollTop() > 80) {
        $("nav").css("background-color", "white");
        $("nav").addClass("shadow-lg");
    } else {
        $("nav").css("background-color", "white");
        $("nav").removeClass("shadow-lg");
    }
});



$(window).scroll(function () {
    if ($(window).scrollTop() > 90) {
        $("#navbarAtas").addClass("d-block");
        $("#navbarAtas").removeClass("d-none");
    } else {
        $("#navbarAtas").addClass("d-none");
        $("#navbarAtas").removeClass("d-block");
    }
})



$(window).scroll(function () {
    const ScrollingBody = $(this).scrollTop();

    const infoUmum = document.querySelector("#infoUmum");
    const contentReview = document.querySelector("#Review");
    const Fasilitas = document.querySelector("#Fasilitas");
    const Akomoditas = document.querySelector("#akomoditas");
    const Kamar = document.querySelector("#kamar");
    const lokasi = document.querySelector("#lokasi");


    if (ScrollingBody > $("#namaHotel").offset().top - 150) {
        infoUmum.style.color = "blue";
        contentReview.style.color = "black";
        Fasilitas.style.color = "black";
        Akomoditas.style.color = "black";
        Kamar.style.color = "black";
        lokasi.style.color = "black";
    } else if (ScrollingBody > $("#Reviews").offset().top - 89950) {
        infoUmum.style.color = "black";
        contentReview.style.color = "blue";
        Fasilitas.style.color = "black";
        Akomoditas.style.color = "black";
        Kamar.style.color = "black";
        lokasi.style.color = "black";
    }
});

$('.link').click(function (event) {
    const to = $(this).attr('href')
    const toElement = $(to)

    $('html,body').animate({
        scrollTop: toElement.offset().top - 50
    }, 1000)

    event.preventDefault()
})


// (function ($) {
//     "use strict";
//     $(".input100").each(function () {
//         $(this).on("blur", function () {
//             if ($(this).val().trim() != "") {
//                 $(this).addClass("has-val");
//             } else {
//                 $(this).removeClass("has-val");
//             }
//         });
//     });
//     var input = $(".validate-input .input100");
//     $(".validate-form").on("submit", function () {
//         var check = true;
//         for (var i = 0; i < input.length; i++) {
//             if (validate(input[i]) == false) {
//                 showValidate(input[i]);
//                 check = false;
//             }
//         }
//         return check;
//     });

//     $(".validate-form .input100").each(function () {
//         $(this).focus(function () {
//             hideValidate(this);
//         });
//     });

//     function validate(input) {
//         if ($(input).attr("type") == "email" || $(input).attr("name") == "email") {
//             if (
//                 $(input)
//                 .val()
//                 .trim()
//                 .match(
//                     /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/
//                 ) == null
//             ) {
//                 return false;
//             }
//         } else {
//             if ($(input).val().trim() == "") {
//                 return false;
//             }
//         }
//     }

//     function showValidate(input) {
//         var thisAlert = $(input).parent();
//         $(thisAlert).addClass("alert-validate");
//     }

//     function hideValidate(input) {
//         var thisAlert = $(input).parent();
//         $(thisAlert).removeClass("alert-validate");
//     }
// })(jQuery);

const pesan = $("#flashData").data("flashdata");
if (pesan) {
    Swal.fire("Horee...", pesan, "success");
}

const pesanError = $("#errors").data("errors");
if (pesanError) {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: pesanError,
    });
}

$("#tunggu").on("click", function (e) {
    e.preventDefault();
    Swal.fire({
        icon: "info",
        title: "harap bersabar",
        text: "Saat ini tiket sedang dalam proses verifikasi",
    });
});

$("#logout").on("click", function (e) {
    e.preventDefault();
    const linkAja = $(this).attr("href");
    Swal.fire({
        title: "kamu yakin",
        text: "kamu mau logout dari sitiket??",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Logout",
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = linkAja;
            Swal.fire("", "kamu sudah logout dari sitiket", "success");
        }
    });
});

$("#About").on("click", function () {
    Swal.fire({
        title: "About us",
        text: "Sitiket Version 2.3",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Thanks",
    });
});


$("#hapusTiket").on("click", function () {
    event.preventDefault();
    const form = event.target.form;
    Swal.fire({
        title: 'kamu yakin',
        text: "kamu mau hapus tiket ini",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire(
                '',
                'tiket sudah dihapus',
                'success'
            )
        }
    })
});




$("#logout1").on("click", function (e) {
    e.preventDefault();
    const linkAja = $(this).attr("href");
    Swal.fire({
        title: "kamu yakin",
        text: "kamu mau logout dari sitiket??",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Logout",
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = linkAja;
            Swal.fire("", "kamu sudah logout dari sitiket", "success");
        }
    });
});

let typed1 = new Typed(".type-1", {
    strings: ["SITIKET"],
    typeSpeed: 200,
    showCursor: false,
    loop: false,
});

function previewGambar() {
    const gambarYangdipilih = document.querySelector("#gambar");
    const gambarPreview = document.querySelector("#gambarPreview");
    gambarYangdipilih.files[0].name;
    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambarYangdipilih.files[0]);
    fileGambar.onload = function (e) {
        gambarPreview.src = e.target.result;
    };
}


function tampilGambar() {
    const GambarYangDipilih = document.querySelector("#gambarYangDipilih");
    const TampilGambar = document.querySelector("#TampilGambar");
    GambarYangDipilih.files[0].name;
    const FileGambarYangDipilih = new FileReader();
    FileGambarYangDipilih.readAsDataURL(GambarYangDipilih.files[0]);
    FileGambarYangDipilih.onload = function (e) {
        TampilGambar.src = e.target.result;
    }


}

// convert to rupiah

// function gambar() {
//     const woa = document.querySelector('#gambar');
//     const gambar = document.querySelector('#preview');
//     woa.files[0].name;
//     const file = new FileReader();
//     file.readAsDataURL(woa.files[0]);
//     file.onload = function (e) {
//         gambar.src = e.target.result;
//     }
// }

// $('.link').click(function (event) {
//     const to = $(this).attr('href')
//     const toElement = $(to)

//     $('html,body').animate({
//         scrollTop: toElement.offset().top - 50
//     }, 1000)

//     event.preventDefault()
// })



function BayarSekarang() {
    const BayarSekarang = document.getElementById("BayarSekarang");
    const contentBayarNow = document.getElementById("belumContent");
    const verifikasiAdmin = document.getElementById("verifikasiAdmin");
    const contentVerifikasi = document.getElementById("verifikasiContent");
    const siapDipakai = document.getElementById("siapDipakai");
    const siapDipakaiContent = document.getElementById("selesaiContent");
    BayarSekarang.style.color = "#fe6700";
    contentBayarNow.style.display = "block";
    verifikasiAdmin.style.color = "#000";
    contentVerifikasi.style.display = "none";
    siapDipakai.style.color = "#000";
    siapDipakaiContent.style.display = "none";
}

function verifikasiAdmin() {
    const BayarSekarang = document.getElementById("BayarSekarang");
    const contentBayarNow = document.getElementById("belumContent");
    const verifikasiAdmin = document.getElementById("verifikasiAdmin");
    const contentVerifikasi = document.getElementById("verifikasiContent");
    const siapDipakai = document.getElementById("siapDipakai");
    const siapDipakaiContent = document.getElementById("selesaiContent");
    BayarSekarang.style.color = "#000";
    contentBayarNow.style.display = "none";
    verifikasiAdmin.style.color = "#fe6700";
    contentVerifikasi.style.display = "block";
    siapDipakai.style.color = "#000";
    siapDipakaiContent.style.display = "none";
}

function siapDipakai() {
    const BayarSekarang = document.getElementById("BayarSekarang");
    const contentBayarNow = document.getElementById("belumContent");
    const verifikasiAdmin = document.getElementById("verifikasiAdmin");
    const contentVerifikasi = document.getElementById("verifikasiContent");
    const siapDipakai = document.getElementById("siapDipakai");
    const siapDipakaiContent = document.getElementById("selesaiContent");
    BayarSekarang.style.color = "#000";
    contentBayarNow.style.display = "none";
    verifikasiAdmin.style.color = "#000";
    contentVerifikasi.style.display = "none";
    siapDipakai.style.color = "#fe6700";
    siapDipakaiContent.style.display = "block";
}



function overview() {
    const ov = document.getElementById("overview");
    const ov1 = document.getElementById("overview1");
    const ovc = document.getElementById("overviewContent");
    const it = document.getElementById("itinerary");
    const it1 = document.getElementById("itinerary1");
    const itc = document.getElementById("itineraryContent");
    const pd = document.getElementById("priceDetail");
    const pd1 = document.getElementById("priceDetail1");
    const pdc = document.getElementById("priceDetailContent");
    const pr = document.getElementById("preparation");
    const prc = document.getElementById("preparationContent");
    const gl = document.getElementById("gearList");
    const glc = document.getElementById("gearListContent");
    ov.style.color = "#fe6700";
    ov1.style.color = "#fe6700";
    ovc.style.display = "block";
    it.style.color = "#000";
    it1.style.color = "#000";
    itc.style.display = "none";
    pd.style.color = "#000";
    pd1.style.color = "#000";
    pdc.style.display = "none";
    pr.style.color = "#000";
    prc.style.display = "none";
    gl.style.color = "#000";
    glc.style.display = "none";
}

function itinerary() {
    const ov = document.getElementById("overview");
    const ov1 = document.getElementById("overview1");
    const ovc = document.getElementById("overviewContent");
    const it = document.getElementById("itinerary");
    const it1 = document.getElementById("itinerary1");
    const itc = document.getElementById("itineraryContent");
    const pd = document.getElementById("priceDetail");
    const pd1 = document.getElementById("priceDetail1");
    const pdc = document.getElementById("priceDetailContent");
    const pr = document.getElementById("preparation");
    const prc = document.getElementById("preparationContent");
    const gl = document.getElementById("gearList");
    const glc = document.getElementById("gearListContent");
    ov.style.color = "#000";
    ov1.style.color = "#000";
    ovc.style.display = "none";
    it.style.color = "#fe6700";
    it1.style.color = "#fe6700";
    itc.style.display = "block";
    pd.style.color = "#000";
    pd1.style.color = "#000";
    pdc.style.display = "none";
    pr.style.color = "#000";
    prc.style.display = "none";
    gl.style.color = "#000";
    glc.style.display = "none";
}

function priceDetail() {
    const ov = document.getElementById("overview");
    const ov1 = document.getElementById("overview1");
    const ovc = document.getElementById("overviewContent");
    const it = document.getElementById("itinerary");
    const it1 = document.getElementById("itinerary1");
    const itc = document.getElementById("itineraryContent");
    const pd = document.getElementById("priceDetail");
    const pd1 = document.getElementById("priceDetail1");
    const pdc = document.getElementById("priceDetailContent");
    const pr = document.getElementById("preparation");
    const prc = document.getElementById("preparationContent");
    const gl = document.getElementById("gearList");
    const glc = document.getElementById("gearListContent");
    ov.style.color = "#000";
    ov1.style.color = "#000";
    ovc.style.display = "none";
    it.style.color = "#000";
    it1.style.color = "#000";
    itc.style.display = "none";
    pd.style.color = "#fe6700";
    pd1.style.color = "#fe6700";
    pdc.style.display = "block";
    pr.style.color = "#000";
    prc.style.display = "none";
    gl.style.color = "#000";
    glc.style.display = "none";
}