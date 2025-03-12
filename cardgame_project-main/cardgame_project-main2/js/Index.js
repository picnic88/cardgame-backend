function bingbing() {
//     let array1 = document.getElementsByClassName("bbq_text");
//     array1.innerHTML="실내 수영장";
//     let array2 = document.getElementsByClassName("pool");
//     array2.innerHTML="정글짐";
//     let array3 = document.getElementsByClassName("play");
//     array3.innerHTML="바베큐장";
//     let array = ['바베큐장', '실내 수영장', '정글짐'];
    
//     //3개 별로 각각 구분해서 하나씩 값이 바뀌도록
//     //근데 돌아가게끔 하는건...배열 이용...?
// }

// $(document).ready(function(){
//     $('.your-class').slick({
//       setting-name: setting-value
//     });
//   });
$(document).ready(function() {
    $('.count').slick({
        dots:true,
        infinite : true,
        speed : 500,
        slidesToshow:3,
        slidesToscroll:3,
    })
})
}
				