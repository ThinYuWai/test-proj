<?= $this->assets->outputCss() ?>
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
    <div class = "flex-show-block">
      <h3>Apply User List</h3>
    </div>
    <div class = "flex-show-block">
      <span class = "txt-title-150">JOB TITLE : </span>
      <span><?= $title ?></span>
    </div>
    <div class = "flex-show-block">
      <span class = "txt-title-150">POSTING PERIOD : </span>
      <span>
      <?= $from_date ?> ～ <?= $to_date ?>
      </span>
    </div>
    <div class = "flex-show-block">
     <table class = "job_table">
       <thead>
         <tr>
           <th class = "width_11">User Name</th>
           <th class = "width_5">Age</th>
           <th class = "width_15">DEGREE</th>
           <th class = "width_5">Status</th>
           <th class = "width_10"></th>
        </tr>
       </thead>
       <tbody>
       <?php foreach ($apply_data as $value) { ?>
       <?php if ($value['name'] == null) { ?>
         <?php break; ?>
       <?php } ?>
       <tr>
          <td class = "width_11">
           <?= $value['name'] ?>
          </td>
          <td class = "width_5"><?= $value['age'] ?></td>
          <td class = "width_15"><?= $value['degree'] ?></td>
          <td class = "width_5">
           <?php if ($value['apply_status'] == 0) { ?>
             応募
           <?php } elseif ($value['apply_status'] == 1) { ?>
             1回面接
           <?php } elseif ($value['apply_status'] == 2) { ?>
             2回面接
           <?php } else { ?>
             採用
           <?php } ?>
          </td>
          <td class = "width_10">
          </td>
       </tr>
       <?php } ?>
       </tbody>
      </table>
    </div>
  </div>
  
  <footer style="text-align:center;">
  	<p>© 2019-2020 ~~~~Co.Ltd All rights reserved.</p>
  </footer>
</div>
<?= $this->assets->outputJs() ?>