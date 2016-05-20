{% extends "templates/default.volt" %}
{% block css %}
  {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.css') }}
  {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/switchery/switchery.min.css') }}
{% endblock %}
{% block js %}
  {{ javascript_include('/public/vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.js') }}
  {{ javascript_include('/public/vendors/nifty-template/template/plugins/switchery/switchery.min.js') }}
  <?php $url = new Phalcon\Mvc\Url; ?>
  <script>
    $(function() {
      var elem = document.querySelector('.switchery');
      var init = new Switchery(elem);
      
      $('.select-picker').selectpicker({
        style: 'btn-info',
        size: 4
      });
    });
    var idContry, idState;

    $("#idContry").change(function(e){
    idContry = $("#idContry").val();
      $.ajax({
        method: 'GET',
        url:'<?= $url->get("company/getstates"); ?>/'+idContry,
        success: function(data){
          $("#departamento").html(data);
        }
      });
    });

    $("#idState").change(function(e){
      alert("dasda");
    idState = $("#idState").val();
      $.ajax({
        method: 'GET',
        url:'<?= $url->get("company/getcity"); ?>/'+idContry,
        success: function(data){
          $("#ciudad").html(data);
          console.log(data);
        }
      });
    });
  </script>
{% endblock %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Crear Pasajero</h1>

    <div class="col-md-8">
      <div id="page-content">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Lea atentamente las indicaciones de la derecha</h3>
          </div>

            <div class="panel-body">
              <!--Horizontal Form-->
              <!--===================================================-->
              <form class="form-horizontal" method="POST" action="{{url('company/new')}}">
                <div class="form-group">
                  <div class="col-md-12">
                    {{message.output()}}
                  </div>
                </div>
              
                {% for element in form %}
                 {% if element.getName() == "idState" %}
                    <div id="departamento">
                 {% endif %}

                 {% if element.getName() == "idCity" %}
                    <div id="ciudad">
                 {% endif %}

                    <div class="form-group">
                      {{ element.label(['class': 'col-sm-4 control-label']) }}
                      <div class="col-sm-8">
                        {{ element.render() }}
                      </div>
                    </div>
                  {% if element.getName() == "idState" %}
                  </div>
                  {% endif %}

                  {% if element.getName() == "idCity" %}
                  </div>
                  {% endif %}
                {% endfor %}
              
                <div class="panel-footer text-right">
                  <a href="{{url('company')}}" class="btn btn-default" type="submit">Cancelar</a>
                  <button class="btn btn-info" type="submit">Crear</button>
                </div>
              </form>
            <!--===================================================-->
            <!--End Horizontal Form-->
        </div>
      </div>
    </div>
    <div class="col-md-6">
      
    </div>
  </div>
  <div class="col-md-4">
    <div id="page-content">
    <div class="panel panel-bordered-info">
      <div class="panel-heading">
        <h3 class="panel-title">Intrucciones / Indicaciones</h3>
      </div>
      <div class="panel-body">
        <li>Lorem ipsum dolor sit amet</li>
        <li>consectetur adipiscing elit</li>
        <li>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</li>
        <li>Ut enim ad minim veniam</li>
        <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
       
      </div>
    </div>
    </div>
  </div>
{% endblock %}