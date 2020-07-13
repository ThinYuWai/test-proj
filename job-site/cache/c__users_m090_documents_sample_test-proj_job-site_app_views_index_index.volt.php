<div id="wrapper">
  <link rel="stylesheet" href="../css/boostrap.min.css">
<script type = "javascript" src = "../js/bootstrap.min.js"></script>
<?= $this->assets->outputCss() ?>
  <header>
  <div class = "flex_float">
    <nav class = "nav-div">
      <ul class = "tabrow">
        <li id = "home" class = "home_color">
          <?= $this->tag->linkTo(['index/index', 'HOME', 'class' => 'tab_item']) ?>
        </li>
        <li id = "job_info" class = "posting_color">
          <?= $this->tag->linkTo(['job_info/index', 'JOB POSTING', 'class' => 'tab_item']) ?>
        </li>
        <li id = "job_detail" class = "job_list_color">
          <?= $this->tag->linkTo(['job_info/detail', 'JOB LIST', 'class' => 'tab_item']) ?>
        </li>
      <!--  <li class = "sche_list_color"><a href="">SCHEDULE LIST</a></li> -->
      </ul>
      </nav>
    </div>
  </header>
  <div id = "contents">
    <?= $this->tag->image(['../img/image-analysis.png', 'class' => 'img-responsive']) ?>
  </div>
  
  <footer style="text-align:center;">
  	<p>© 2019-2020 ~~~~Co.Ltd All rights reserved.</p>
  </footer>
</div>
<?= $this->assets->outputJs() ?>