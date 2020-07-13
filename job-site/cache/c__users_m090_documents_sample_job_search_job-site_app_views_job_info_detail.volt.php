<?= $this->assets->outputCss() ?>
<div id="wrapper">
  <link rel="stylesheet" href="../css/boostrap.min.css">
<script type = "javascript" src = "../js/bootstrap.min.js"></script>
<?= $this->assets->outputCss() ?>
  <header>
  <div class = "flex_float">
    <nav class = "nav-div">
      <ul class = "tabrow">
        <li class = "home_color">
          <?= $this->tag->linkTo(['compony_info/show', 'HOME', 'class' => 'tab_item']) ?>
        </li>
        <li class = "posting_color">
          <?= $this->tag->linkTo(['job_info/index', 'JOB POSTING']) ?>
        </li>
        <li class = "job_list_color">
          <?= $this->tag->linkTo(['job_info/detail', 'JOB LIST']) ?>
        </li>
      <!--  <li class = "sche_list_color"><a href="">SCHEDULE LIST</a></li> -->
      </ul>
      </nav>
    </div>
  </header>
  <div id = "contents">
   <div class = "flex-show-block">
     <h3>JOB LIST</h3>
   </div>
   <?= $this->tag->form(['job_info/detail', 'method' => 'post']) ?>
   <div class = "flex-show-block">
     <span class = "txt-title-50">DATE</span>
     <span class = "padding_10">
       <?= $this->tag->textField(['searchFromDate', 'class' => 'datepicker', 'value' => $searchFromDate]) ?>
     </span>
     <span>～</span>
     <span class = "padding_10">
       <?= $this->tag->textField(['searchToDate', 'class' => 'datepicker', 'value' => $searchToDate]) ?>
     </span>
     <span class = "padding_10">
       <button type = "submit" name = "search_btn" id = "search_btn">Search</button>
     </span>
   </div>
   <?= $this->tag->endForm() ?>
   <div class = "flex-show-block">
   <table class = "job_table">
     <thead>
       <tr>
         <th class = "width_15">JOB Title</th>
         <th class = "width_5">APPLY COUNT</th>
         <th class = "width_5">Hiring COUNT</th>
         <th class = "width_11">POSTING PERIOD</th>
         <th class = "width_10"></th>
       </tr>
     </thead>
     <tbody>
     <?php foreach ($job_data as $value) { ?>
     <tr>
       <td class = "width_15">
         <?= $this->tag->linkTo(['job_info/index?id=' . $value['id'], $value['title']]) ?>
       </td>
       <td class = "width_5">
         <?= $value['count_apply'] ?>
       </td>
       <td class = "width_5">
         <?= $value['hire_number'] ?>
       </td>
       <td class = "width_11">
         <?= $value['from_date'] ?>
         ～
         <?= $value['to_date'] ?>
       </td>
       <td class = "width_10">
        
       <button type = "button" name = "apply_list" id = "apply_link">
       <?= $this->tag->linkTo(['apply_list/index/id=' . $value['id'], 'Apply List']) ?>
       </button>
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