{{ assets.outputCss() }}
<div id="wrapper">
  {% include  "layouts/header.volt" %}
  <div id = "contents">
    <div class = "flex-show-block">
      <h3>Apply User List</h3>
    </div>
    <div class = "flex-show-block">
      <span class = "txt-title-150">JOB TITLE : </span>
      <span>{{ title }}</span>
    </div>
    <div class = "flex-show-block">
      <span class = "txt-title-150">POSTING PERIOD : </span>
      <span>
      {{ from_date }} ～ {{ to_date }}
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
       {% for value in apply_data %}
       {% if value['name'] == null %}
         {% break %}
       {% endif %}
       <tr>
          <td class = "width_11">
           {{ value['name'] }}
          </td>
          <td class = "width_5">{{ value['age'] }}</td>
          <td class = "width_15">{{ value['degree'] }}</td>
          <td class = "width_5">
           {% if value['apply_status'] == 0 %}
             応募
           {% elseif value['apply_status'] == 1 %}
             1回面接
           {% elseif value['apply_status'] == 2 %}
             2回面接
           {% else %}
             採用
           {% endif %}
          </td>
          <td class = "width_10">
          </td>
       </tr>
       {% endfor %}
       </tbody>
      </table>
    </div>
  </div>
  {% include  "layouts/footer.volt" %}
</div>
{{ assets.outputJs() }}