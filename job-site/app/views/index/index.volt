<div id="wrapper">
  {% include  "layouts/header.volt" %}
  <div id = "contents">
    {{ image("../img/image-analysis.png", "class":"img-responsive") }}
  </div>
  {% include  "layouts/footer.volt" %}
</div>
{{ assets.outputJs() }}