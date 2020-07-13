{{ assets.outputCss() }}
<div id="wrapper">
  {% include  "layouts/header.volt" %}
  <div id = "contents">
   <div class = "flex-show-block">
     <h3>JOB LIST</h3>
   </div>
   {{ form('job_info/detail', 'method': 'post')}}
   <div class = "flex-show-block">
     <span class = "txt-title-50">DATE</span>
     <span class = "padding_10">
       {{ text_field("searchFromDate", "class": "datepicker", "value": searchFromDate )}}
     </span>
     <span>～</span>
     <span class = "padding_10">
       {{ text_field("searchToDate", "class": "datepicker", "value": searchToDate )}}
     </span>
     <span class = "padding_10">
       <button type = "submit" name = "search_btn" id = "search_btn">Search</button>
     </span>
   </div>
   {{ end_form() }}
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
     {% for value in job_data %}
     <tr>
       <td class = "width_15">
         {{ link_to("job_info/index?id="~value['id'], value['title']) }}
       </td>
       <td class = "width_5">
         {{ value['count_apply'] }}
       </td>
       <td class = "width_5">
         {{ value['hire_number'] }}
       </td>
       <td class = "width_11">
         {{ value['from_date'] }}
         ～
         {{ value['to_date'] }}
       </td>
       <td class = "width_10">
        
       <button type = "button" name = "apply_list" id = "apply_link">
       {{ link_to("apply_list/index/id="~value['id'], "Apply List") }}
       </button>
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