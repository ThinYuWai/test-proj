<link rel="stylesheet" href="../css/boostrap.min.css">
<script type = "javascript" src = "../js/bootstrap.min.js"></script>
{{ assets.outputCss() }}
  <header>
  <div class = "flex_float">
    <nav class = "nav-div">
      <ul class = "tabrow">
        <li class = "home_color">
          {{ link_to("compony_info/show", "HOME", "class" : "tab_item") }}
        </li>
        <li class = "posting_color">
          {{ link_to("job_info/index", "JOB POSTING") }}
        </li>
        <li class = "job_list_color">
          {{ link_to("job_info/detail", "JOB LIST") }}
        </li>
      <!--  <li class = "sche_list_color"><a href="">SCHEDULE LIST</a></li> -->
      </ul>
      </nav>
    </div>
  </header>