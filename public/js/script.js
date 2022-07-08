var dataArticle = [
    {
        img: "img/thumbnail-jadwal-aff.jpg",
        url: "/pages/berita/b1.html",
        title: "Jadwal Semifinal Piala AFF Futsal 2022: Timnas Futsal Indonesia Tantang Myanmar",
        subtitle: "irultyo, 20 April 2022",
        article: "Piala AFF Futsal 2022 telah sampai ke babak semifinal, yang mana akan dimulai pada Jumat 8 April 2022. Tim Nasional (Timnas) Futsal Indonesia menjadi salah satu tim yang berhasil lolos ke ..."
    },
    {
        img: "img/inavsmyr.jpeg",
        url: "/pages/berita/b1.html",
        title: "Jadwal Final Piala AFF Futsal 2022: Indonesia Vs Thailand",
        subtitle: "ilham, 20 April 2022",
        article: "Indonesia lolos ke partai puncak Piala AFF Futsal 2022 usai mengalahkan Myanmar di babak semifinal, Jumat (8/4/2022). Skuad Garuda menang meyakinkan 6-1."
    },
    {
        img: "img/inavskmb.jpeg",
        url: "/pages/berita/b1.html",
        title: "Piala AFF Futsal 2022: Indonesia Cukur Kamboja 11-2, Maju ke Semifinal",
        subtitle: "najwa, 20 April 2022",
        article: "Timnas Futsal Indonesia menutup fase grup dengan kemenangan besar 11-2 atas Kamboja. Timnas melaju ke semifinal Piala AFF Futsal 2022.",
    },
    {
        img: "img/timnas-futsal.jpeg",
        url: "/pages/berita/b1.html",
        title: "Imbangi Thailand, Timnas Futsal Jaga Asa ke Semifinal Piala AFF",
        subtitle: "briliando, 20 April 2022",
        article: "Timnas Futsal Indonesia meraih hasil imbang 2-2 melawan Thailand, Selasa (6/4/2022). Peluang lolos ke babak semifinal Piala AFF Futsal 2022 pun masih terbuka.",
    },
    {
        img: "img/inavsmas.jpeg",
        url: "/pages/berita/b1.html",
        title: "Piala AFF Futsal 2022: Indonesia Ganyang Malaysia 5-1",
        subtitle: "briliando, 20 April 2022",
        article: "Timnas Futsal Indonesia meraih kemenangan 5-1 atas Malaysia pada laga Grup A Piala AFF Futsal 2022. Thailand akan menjadi lawan selanjutnya di laga penentuan.",
    },
]

$(function () {
    var list = ""
    for (let index = 0; index < dataArticle.length; index++) {
        list += `
        <article class="my-border">
            <div class="my-flex-5">
                <img src="${dataArticle[index].img}" alt="" class="img-flex">
            </div>
            <div class="my-flex-7 ">
                <a href="${dataArticle[index].url}" class="my-article-title">
                    ${dataArticle[index].title}
                </a>
                <div class="my-article-subtitle">${dataArticle[index].subtitle}</div>
                <p class="my-article-description">${dataArticle[index].article}</p>
            </div>
        </article>
        <br>
        `
    }
    $("#list-article").append(list)
})

$(document).ready(function () {
    var lists = ""
    for (let index = 0; index < 3; index++) {
        lists += `
        <article class="my-border my-popular-post">
            <div class="my-flex-5">
                <img src="${dataArticle[index].img}" alt="" class="img-flex">
            </div>
            <div class="my-flex-7 ">
                <a href="${dataArticle[index].url}" class="my-article-title">
                    ${dataArticle[index].title}
                </a>
            </div>
        </article>
        <br>
        `
    }
    $("#popular-post").append(lists)
})