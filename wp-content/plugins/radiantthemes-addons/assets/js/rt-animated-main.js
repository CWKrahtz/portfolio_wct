var WidgetRadiantanimatedHandler = function ($scope, $) {

   jQuery(document).ready(function (e) {
    //set animation timing
  /*var t = e.find(".elementor-widget-radiant-animated-heading"),
                a = t.data("settings"),
                
                rtanimationDelay = a.rtdelay,*/
                console.log( $('.rt-animated-text').data('data-id') );
                console.log( $('.elementor-widget-radiant-animated-heading').attr('data-id') );
    var rtanimationDelay =  $(".rt-animated-text").data('timeout') ,
        
        //loading bar effect
        rtbarAnimationDelay = $(".rt-animated-text").data('ldelay'),
        rtbarWaiting = rtbarAnimationDelay - $(".rt-animated-text").data('bwaiting'), //3000 is the duration of the transition on the loading bar - set in the scss/css file
        
        //letters effect
        rtlettersDelay = 50,
       
        //type effect
        rttypeLettersDelay = $(".rt-animated-text").data('letterdelay'),
        rtselectionDuration = $(".rt-animated-text").data('lduration'),
        rttypeAnimationDelay = rtselectionDuration + $(".rt-animated-text").data('lanimdelay'),
       
        //rt-clip effect 
        rtrevealDuration = $(".rt-animated-text").data('cduration'),
        rtrevealAnimationDelay = $(".rt-animated-text").data('cdelay');

    initHeadline();


    function initHeadline() {
        //insert <i> element for each letter of a changing word
        rtsingleLetters($('.rt-headline.letters').find('b'));
        //initialise headline animation
        rtanimateHeadline($('.rt-headline'));
    }

    function rtshowWord($word, $duration) {
        if ($word.parents('.rt-headline').hasClass('rt-type')) {
            rtshowLetter($word.find('i').eq(0), $word, false, $duration);
            $word.addClass('rt-is-visible').removeClass('rt-is-hidden');

        } else if ($word.parents('.rt-headline').hasClass('rt-clip')) {
            $word.parents('.rt-words-wrapper').animate({
                'width': $word.width() + 10
            }, rtrevealDuration, function () {
                setTimeout(function () {
                    rthideWord($word)
                }, rtrevealAnimationDelay);
            });
        }
    }

    function rtanimateHeadline($headlines) {
        var duration = rtanimationDelay;
        $headlines.each(function () {
            var headline = $(this);

            if (headline.hasClass('rt-loading-bar')) {
                duration = rtbarAnimationDelay;
                setTimeout(function () {
                    headline.find('.rt-words-wrapper').addClass('is-loading')
                }, rtbarWaiting);
            } else if (headline.hasClass('rt-clip')) {
                var spanWrapper = headline.find('.rt-words-wrapper'),
                    newWidth = spanWrapper.width() + 10
                spanWrapper.css('width', newWidth);
            } else if (!headline.hasClass('rt-type')) {
                //assign to .rt-words-wrapper the width of its longest word
                var words = headline.find('.rt-words-wrapper b'),
                    width = 0;
                words.each(function () {
                    var wordWidth = $(this).width();
                    if (wordWidth > width) width = wordWidth;
                });
                headline.find('.rt-words-wrapper').css('width', width);
            };

            //trigger animation
            setTimeout(function () {
                rthideWord(headline.find('.rt-is-visible').eq(0))
            }, duration);
        });
    }

    function rtsingleLetters($words) {
        $words.each(function () {
            var word = $(this),
                letters = word.text().split(''),
                selected = word.hasClass('rt-is-visible');
            for (i in letters) {
                if (word.parents('.rt-rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
                letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>' : '<i>' + letters[i] + '</i>';
            }
            var newLetters = letters.join('');
            word.html(newLetters).css('opacity', 1);
        });
    }

    function rthideWord($word) {
        var nextWord = rttakeNext($word);

        if ($word.parents('.rt-headline').hasClass('rt-type')) {
            var parentSpan = $word.parent('.rt-words-wrapper');
            parentSpan.addClass('selected').removeClass('rtwaiting');
            setTimeout(function () {
                parentSpan.removeClass('selected');
                $word.removeClass('rt-is-visible').addClass('rt-is-hidden').children('i').removeClass('in').addClass('out');
            }, rtselectionDuration);
            setTimeout(function () {
                rtshowWord(nextWord, rttypeLettersDelay)
            }, rttypeAnimationDelay);

        } else if ($word.parents('.rt-headline').hasClass('letters')) {
            var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
            rthideLetter($word.find('i').eq(0), $word, bool, rtlettersDelay);
            rtshowLetter(nextWord.find('i').eq(0), nextWord, bool, rtlettersDelay);

        } else if ($word.parents('.rt-headline').hasClass('rt-clip')) {
            $word.parents('.rt-words-wrapper').animate({
                width: '2px'
            }, rtrevealDuration, function () {
                switchWord($word, nextWord);
                rtshowWord(nextWord);
            });

        } else if ($word.parents('.rt-headline').hasClass('rt-loading-bar')) {
            $word.parents('.rt-words-wrapper').removeClass('is-loading');
            switchWord($word, nextWord);
            setTimeout(function () {
                rthideWord(nextWord)
            }, rtbarAnimationDelay);
            setTimeout(function () {
                $word.parents('.rt-words-wrapper').addClass('is-loading')
            }, rtbarWaiting);

        } else {
            switchWord($word, nextWord);
            setTimeout(function () {
                rthideWord(nextWord)
            }, rtanimationDelay);
        }
    }



    function rthideLetter($letter, $word, $bool, $duration) {
        $letter.removeClass('in').addClass('out');

        if (!$letter.is(':last-child')) {
            setTimeout(function () {
                rthideLetter($letter.next(), $word, $bool, $duration);
            }, $duration);
        } else if ($bool) {
            setTimeout(function () {
                rthideWord(rttakeNext($word))
            }, rtanimationDelay);
        }

        if ($letter.is(':last-child') && $('html').hasClass('rt-nocss-transitions')) {
            var nextWord = rttakeNext($word);
            switchWord($word, nextWord);
        }
    }

    function rtshowLetter($letter, $word, $bool, $duration) {
        $letter.addClass('in').removeClass('out');

        if (!$letter.is(':last-child')) {
            setTimeout(function () {
                rtshowLetter($letter.next(), $word, $bool, $duration);
            }, $duration);
        } else {
            if ($word.parents('.rt-headline').hasClass('rt-type')) {
                setTimeout(function () {
                    $word.parents('.rt-words-wrapper').addClass('rtwaiting');
                }, 200);
            }
            if (!$bool) {
                setTimeout(function () {
                    rthideWord($word)
                }, rtanimationDelay)
            }
        }
    }

    function rttakeNext($word) {
        return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
    }

    function rttakePrev($word) {
        return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
    }

    function switchWord($oldWord, $newWord) {
        $oldWord.removeClass('rt-is-visible').addClass('rt-is-hidden');
        $newWord.removeClass('rt-is-hidden').addClass('rt-is-visible');
    }
});

};

jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-animated-heading.default",
        WidgetRadiantanimatedHandler
    );
});
