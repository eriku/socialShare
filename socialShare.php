<?php
  $hashtags = 'CUSTOM_TWITTER_HASHTAG';
  $twitterUsername = 'TWITTER_HANDLE';
  $link = 'PAGE_URL';
  $title = 'PAGE_TITLE';
  $url = 'SITE_BASE_URL';
  $desc = 'PAGE_DESCRIPTION';
  $image = 'OPEN_GRAPH_IMAGE';
  $urls = array(
    'facebook' => 'http://www.facebook.com/sharer/sharer.php?u=' . $link,
    'googleplus' => 'https://plus.google.com/share?url=' . $link . '&amp;appkey=&title=' . $title,
    'twitter' => 'https://twitter.com/intent/tweet?text=' . $title . ' ' . $link,
    'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&amp;title=' . $title . '&amp;source=' . $url . '&amp;summary=' . $desc,
    'pinterest' => 'https://pinterest.com/pin/create/bookmarklet/?url=' . $link . '&amp;image=' . $image . '&amp;description=' . $title,
    'tumblr' => 'http://www.tumblr.com/share/link?url=' . $link . '&amp;name=' . $title . '&amp;description=' . $desc,
    'buffer' => 'http://bufferapp.com/add?text=' . $title . '&url=' . $link . '',
    'digg' => 'http://digg.com/submit?url=' . $link . '&title=' . $title,
    'reddit' => 'http://reddit.com/submit?url=' . $link . '&title=' . $title,
    'stumbleupon' => 'http://www.stumbleupon.com/submit?url=' . $link . '&title=' . $title,
    'delicious' => 'https://delicious.com/save?v=5&provider={provider}&noui&jump=close&url=' . $link . '&title=' . $title
  );
?>
<div class="social-share">
  <ul class="social-share__items">
    <li class="social-share__item social-share__item--facebook"><a href="<?php echo $urls['facebook'] ?>" class="social-share__link social-share__link--facebook" data-socialShare-site="Facebook">Facebook</a></li>
    <li class="social-share__item social-share__item--twitter"><a href="<?php echo $urls['twitter'] ?>" class="social-share__link social-share__link--twitter" data-socialShare-site="Twitter">Twitter</a></li>
    <li class="social-share__item social-share__item--googleplus"><a href="<?php echo $urls['googleplus'] ?>" class="social-share__link social-share__link--googleplus" data-socialShare-site="GooglePlus">Google+</a></li>
    <li class="social-share__item social-share__item--linkedin"><a href="<?php echo $urls['linkedin'] ?>" class="social-share__link social-share__link--linkedin" data-socialShare-site="LinkedIn">LinkedIn</a></li>
    <li class="social-share__item social-share__item--pinterest"><a href="<?php echo $urls['pinterest'] ?>" class="social-share__link social-share__link--pinterest" data-socialShare-site="Pinterest">Pinterest</a></li>
    <li class="social-share__item social-share__item--tumblr"><a href="<?php echo $urls['tumblr'] ?>" class="social-share__link social-share__link--tumblr" data-socialShare-site="tumblr">tumblr</a></li>
    <li class="social-share__item social-share__item--buffer"><a href="<?php echo $urls['buffer'] ?>" class="social-share__link social-share__link--buffer" data-socialShare-site="buffer">buffer</a></li>
    <li class="social-share__item social-share__item--digg"><a href="<?php echo $urls['digg'] ?>" class="social-share__link social-share__link--digg" data-socialShare-site="digg">digg</a></li>
    <li class="social-share__item social-share__item--reddit"><a href="<?php echo $urls['reddit'] ?>" class="social-share__link social-share__link--reddit" data-socialShare-site="reddit">reddit</a></li>
    <li class="social-share__item social-share__item--stumpleupon"><a href="<?php echo $urls['stumbleupon'] ?>" class="social-share__link social-share__link--stumbleupon" data-socialShare-site="stumbleupon">stumbleupon</a></li>
    <li class="social-share__item social-share__item-delicious"><a href="<?php echo $urls['delicious'] ?>" class="social-share__link social-share__link--delicious" data-socialShare-site="delicious">delicious</a></li>
  </ul>
</div>
