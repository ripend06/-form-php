/* スムーズスクロール */
$(function() {
    $('a[href^="#').click(function() {
        var speed = 700;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({
            scrollTop: position
        }, speed, "swing");
        return false;
    });
});

/* ハンバーガーメニュー */
$(function(){
    $('.btn-trigger').on('click', function() {
      $(this).toggleClass('active');
      $('.sp-nav-wrapper').toggleClass('active');
      //$('.left').toggleClass('op-hidden');
      $('html').toggleClass('of-hidden');
      //$('.fv-h').toggleClass('op-hidden');
      return false;
    });
  });

/* コンテンツ高さ揃える */
jQuery(window).load(function() {
    $('.fixBox').each(function(i, box) {
        var maxHeight = 0;
        $(box).find('.fixItem').each(function() {
            if ($(this).height() > maxHeight) maxHeight = $(this).height();
        });
        $(box).find('.fixItem').height(maxHeight);
        return false;
    });
});

/* バナースクロール表示 */
$(function(){
    $('#bana img').css('opacity','0');

    $(window).scroll(function(){
    if($(window).scrollTop() > 700){
    $('#bana img').animate({opacity:'1'},800);
    };
    });
});

$(function(){
    $('#sp-bana img').css('opacity','0');

    $(window).scroll(function(){
    if($(window).scrollTop() > 450){
    $('#sp-bana img').animate({opacity:'1'},800);
    };
    });
});

/* コンテンツふわっと表示-ロード時、スクロール時 */
window.onload = function() {
  scroll_effect();

  $(window).scroll(function(){
   scroll_effect();
   scroll_effect_le();
   scroll_effect_ri();
   scroll_effect_to();
  });

  function scroll_effect(){
   $('.effect-fade').each(function(){
    var elemPos = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll > elemPos - windowHeight){
     $(this).addClass('effect-scroll');
    }
   });
  }
  function scroll_effect_le(){
    $('.effect-fade-le').each(function(){
     var elemPos = $(this).offset().top;
     var scroll = $(window).scrollTop();
     var windowHeight = $(window).height();
     if (scroll > elemPos - windowHeight){
      $(this).addClass('effect-scroll-le');
     }
    });
   }
   function scroll_effect_ri(){
    $('.effect-fade-ri').each(function(){
     var elemPos = $(this).offset().top;
     var scroll = $(window).scrollTop();
     var windowHeight = $(window).height();
     if (scroll > elemPos - windowHeight){
      $(this).addClass('effect-scroll-ri');
     }
    });
   }
   function scroll_effect_to(){
    $('.effect-fade-to').each(function(){
     var elemPos = $(this).offset().top;
     var scroll = $(window).scrollTop();
     var windowHeight = $(window).height();
     if (scroll > elemPos - windowHeight){
      $(this).addClass('effect-scroll-to');
     }
    });
   }

};

/* header 指定要素で表示非表示 */
$(function(){
    var scrollStart = $('.JS-header-fixed-none').offset().top; //ページ上部からの距離を取得
    var scrollEnd = $('.JS-b').offset().top; //ページ上部からの距離を取得
    var distance = 0;
    //var wH = $(window).height();　//画面高さ取得
    var wH = 4000;

    var scrollEnd2 = scrollEnd + wH;
    console.log(scrollStart);
    console.log(scrollEnd);
    console.log(wH);
    console.log(scrollEnd2);

    $(document).scroll(function(){
      distance = $(this).scrollTop(); //スクロールした距離を取得
      console.log(distance);
      if (scrollStart <= distance) { //スクロール距離が『.b』の位置を超えたら
        $('.JS-header-fixed-none').addClass('fixed'); //class『fixed』を追加
      } else if (scrollStart >= distance) { //スクロールがページ上部まで戻ったら
        $('.JS-header-fixed-none').removeClass('fixed'); //class『fixed』を削除
      }

      if (scrollEnd2 <= distance) { //スクロール距離が『.b』の位置を超えたら
        $('.JS-header-fixed-none').addClass('none'); //class『none』を追加
      } else {
        $('.JS-header-fixed-none').removeClass('none'); //『.b』より上部に戻ったらclass『none』を削除
      }
      /*
      if (scrollStart <= distance) { //スクロール距離が『.b』の位置を超えたら
        $('JS-hader-fixed-none').fadeOut(); //フェードアウト
      } else{
        $('JS-hader-fixed-none').fadeIn(); //『.end_box』より上部に戻ったらフェードイン
      }*/
    });
  });