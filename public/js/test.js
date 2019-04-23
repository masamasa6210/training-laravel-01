// window.addEventListener('DOMContentLoaded', function() {
//     console.log("hoge");
// })
//
// function scrollToTop() {
//     var x1 = x2 = x3 = 0;
//     var y1 = y2 = y3 = 0;
//     if (document.documentElement) {
//         x1 = document.documentElement.scrollLeft || 0;
//         y1 = document.documentElement.scrollTop || 0;
//     }
//     if (document.body) {
//         x2 = document.body.scrollLeft || 0;
//         y2 = document.body.scrollTop || 0;
//     }
//     x3 = window.scrollX || 0;
//     y3 = window.scrollY || 0;
//     var x = Math.max(x1, Math.max(x2, x3));
//     var y = Math.max(y1, Math.max(y2, y3));
//     window.scrollTo(Math.floor(x / 2), Math.floor(y / 2));
//     if (x > 0 || y > 0) {
//         window.setTimeout("scrollToTop()", 30);
//     }
// }
window.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('goBack');
    const goBackAction = () => {
        console.log('戻るよ');
        window.scrollTo(0, 50);
    };

    button.addEventListener('click', goBackAction, false);
});

