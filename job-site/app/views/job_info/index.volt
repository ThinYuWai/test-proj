<div id="wrapper">
  {% include  "layouts/header.volt" %}
  <div id = "contents">
    <div class = "flex-show-block">
      <h3>JOB POSTING</h3>
      {{ form('jobinfo/insert', 'method': 'post','class':'form-signin', 'id' : 'jobInfoForm', 'enctype' : 'multipart/form-data') }}
        <div class = "flex-show-block">
          <div class = "txt-title-150">JOB TITLE</div>
          <span class = "padding_100">
            {{ text_field("job_title", "value": (job_data is defined ? job_data.title : null) ) }}
          </span>
          <div id = "job_title-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">JOB DESCRIPTION</div>
          <span class = "padding_100">
            {{ text_area("job_description", "class":"form-control", "rows":"15", "cols":"70", "value":(job_data is defined ? job_data.description : null)) }}
          </span>
          <div id = "job_description-error" class = "error-color margin-top "></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150"></div>
          <span class = "hidden">
           {{ file_field("upload_file") }}
          </span>
          <span class = "padding_100">
            <button type = "button" name = "upload_btn" id = "upload_btn">File Upload</button>
          </span>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">Numbers Of Hire</div>
          <span class = "padding_100">
            {{ text_field("hire_number", "id":"hire_number","value":(job_data is defined ? job_data.hire_number : 0))}}
          </span>
          <div id = "hire_number-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">POSTED DATE</div>
          <span class = "padding_100">
            {{ text_field("FromDate", "id":"posted_date", "class":"datepicker","value":(job_data is defined ? job_data.from_date : null) )}}
          </span>
          <div id = "posted_date-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block">
          <div class = "txt-title-150">EXPIRED DATE</div>
          <span class = "padding_100">
            {{ text_field("ToDate", "id":"expired_date", "class":"datepicker","value":(job_data is defined ? job_data.to_date : null)) }}
          </span>
          <div id = "expired_date-error" class = "error-color margin-top margin-left-150"></div>
        </div>
        <div class = "flex-show-block flex_end">
          {% if job_data is defined %}
          <input type = "hidden" name = "job_id" id = "job_id" value = {{ job_data.id }}>
          {{ submit_button('UPDATE', "name":"create_btn", "id":"create_btn", "class":"btn btn-lg btn-primary btn-block") }} 
          {% else %}
          {{ submit_button('CREATE', "name":"create_btn", "id":"create_btn", "class":"btn btn-lg btn-primary btn-block") }} 
          {% endif %}
        </div>
      {{ end_form() }}
    </div>
  </div>
  {% include  "layouts/footer.volt" %}
</div>
{{ assets.outputJs() }}