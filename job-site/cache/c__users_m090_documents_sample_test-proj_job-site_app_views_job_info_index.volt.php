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
      <h3>JOB POSTING</h3>
      <?= $this->tag->form(['jobinfo/insert', 'method' => 'post', 'class' => 'form-signin', 'id' => 'jobInfoForm', 'enctype' => 'multipart/form-data']) ?>
        <div class = "flex-show-block">
          <div class = "txt-title-150">JOB TITLE</div>
          <span class = "padding_100">
            <?= $this->tag->textField(['job_title', 'value' => ((isset($job_data) ? $job_data->title : null))]) ?>
          </span>
          <div id = "job_title-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">JOB DESCRIPTION</div>
          <span class = "padding_100">
            <?= $this->tag->textArea(['job_description', 'class' => 'form-control', 'rows' => '15', 'cols' => '70', 'value' => ((isset($job_data) ? $job_data->description : null))]) ?>
          </span>
          <div id = "job_description-error" class = "error-color margin-top "></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150"></div>
          <span class = "hidden">
           <?= $this->tag->fileField(['upload_file']) ?>
          </span>
          <span class = "padding_100">
            <button type = "button" name = "upload_btn" id = "upload_btn">File Upload</button>
          </span>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">Numbers Of Hire</div>
          <span class = "padding_100">
            <?= $this->tag->textField(['hire_number', 'id' => 'hire_number', 'value' => ((isset($job_data) ? $job_data->hire_number : 0))]) ?>
          </span>
          <div id = "hire_number-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">POSTED DATE</div>
          <span class = "padding_100">
            <?= $this->tag->textField(['FromDate', 'id' => 'posted_date', 'class' => 'datepicker', 'value' => ((isset($job_data) ? $job_data->from_date : null))]) ?>
          </span>
          <div id = "posted_date-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">EXPIRED DATE</div>
          <span class = "padding_100">
            <?= $this->tag->textField(['ToDate', 'id' => 'expired_date', 'class' => 'datepicker', 'value' => ((isset($job_data) ? $job_data->to_date : null))]) ?>
          </span>
          <div id = "expired_date-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block flex_end">
          <?php if (isset($job_data)) { ?>
          <input type = "hidden" name = "job_id" id = "job_id" value = <?= $job_data->id ?>>
          <?= $this->tag->submitButton(['UPDATE', 'name' => 'create_btn', 'id' => 'create_btn', 'class' => 'btn btn-lg btn-primary btn-block']) ?> 
          <?php } else { ?>
          <?= $this->tag->submitButton(['CREATE', 'name' => 'create_btn', 'id' => 'create_btn', 'class' => 'btn btn-lg btn-primary btn-block']) ?> 
          <?php } ?>
        </div>
      <?= $this->tag->endForm() ?>
    </div>
  </div>
  
  <footer style="text-align:center;">
  	<p>© 2019-2020 ~~~~Co.Ltd All rights reserved.</p>
  </footer>
</div>
<?= $this->assets->outputJs() ?>