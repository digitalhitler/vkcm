<?php

$arrPost = $DB->query("SELECT * FROM `Posts` WHERE `ID` = '".intval($RouterVariables["id"])."' LIMIT 1")->fetch();
if(!$arrPost) {
    // reroute somewhere
    die();
}
$Page->GetView("header",
    array(
        "PageTitle" => ""
    )
);

?>
<script type="text/javascript">
    $(document).ready(function() {
       $(window).scroll(function(){
           var scrolled = $(document).scrollTop();
           $(".header .background").css ({
               "background-position-y" : scrolled / 1.4 + "px"
           });
       })
    });
</script>
<article>
      <div class="header" style="color: white">
          <div class="background" style="background-image: url('https://pp.vk.me/c623130/v623130250/1eb26/syZip2ZzM-c.jpg');">

          </div>
          <div class="headline">
              <div class="datetime"><?=$Page->RelativeDate($arrPost["Timestamp"])." в ".date("H:i", $arrPost["Timestamp"]);?></div>
              <h1><?=$arrPost["Title"];?></h1>
              <?php if (strlen($arrPost["Tags"]) > 0) {
                  $tags = explode(",", $arrPost["Tags"]);
                  echo '<ul class="tags">';
                  foreach($tags as $tag) {
                      $tag = trim($tag);
                      echo '<li><a href="/tags/'.urlencode($tag).'">'.$tag.'</a></li>';
                  }
              }
              ?>
          </div>
      </div>
      <section id="post">
          <figure>
              <img src="http://placekitten.com/g/300/400" />
              <figcaption class="bottom">Тест</figcaption>
          </figure>
          <figure>
              <img src="http://placekitten.com/g/300/400" />
              <figcaption class="bottom">Тест</figcaption>
          </figure>
          <?=$arrPost["Text"];?>
      </section>
      <div id="postSwitcher">

          <div class="prev">
              <i>&larr;</i>
              <a href="#">Какой-то еще очень странный пост с длинным заголовком</a>
          </div>
          <div class="next">
              <i>&rarr;</i>
              <a href="#">Какой-то еще очень странный пост с длинным заголовком</a>
          </div>
      </div>
      <div id="comments">
          <div id="hypercomments_widget"></div>
          <script type="text/javascript">
              _hcwp = window._hcwp || [];
              _hcwp.push({widget:"Stream", widget_id: 62121});
              (function() {
                  if("HC_LOAD_INIT" in window)return;
                  HC_LOAD_INIT = true;
                  var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
                  var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
                  hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/62121/"+lang+"/widget.js";
                  var s = document.getElementsByTagName("script")[0];
                  s.parentNode.insertBefore(hcc, s.nextSibling);
              })();
          </script>
          <a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>
      </div>
  </article>
<?php
$Page->GetView("footer");