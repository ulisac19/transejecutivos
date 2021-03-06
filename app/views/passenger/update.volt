{% extends "templates/default.volt" %}
{% block css %}
  {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.css') }}
  {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/switchery/switchery.min.css') }}
{% endblock %}
{% block js %}
  {{ javascript_include('/public/vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.js') }}
  {{ javascript_include('/public/vendors/nifty-template/template/plugins/switchery/switchery.min.js') }}
  <script>
    var elem = document.querySelector('.switchery');
    

    
    
    elem.onchange = function() {
      if (elem.checked) {
        console.log(elem);
        elem.value = 1;
      }
      else {
        elem.value = 0;
      }
    };
    
    var init = new Switchery(elem);
    
    $(function() {
      $('.select-picker').selectpicker({
        style: 'btn-info',
        size: 4
      });
    });
  </script>
{% endblock %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Actualizar Pasajero</h1>

    <div class="col-md-8">
      <div id="page-content">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Lea atentamente las indicaciones de la derecha</h3>
          </div>

            <div class="panel-body">
              <!--Horizontal Form-->
              <!--===================================================-->
              <form class="form-horizontal" method="POST" action="{{url('passenger/update')}}/{{passenger.idPassenger}}">
                <div class="form-group">
                  <div class="col-md-12">
                    {{message.output()}}
                  </div>
                </div>
              
                {% for element in form %}
                    <div class="form-group">
                      {{ element.label(['class': 'col-sm-4 control-label']) }}
                      <div class="col-sm-8">
                        {{ element.render() }}
                      </div>
                    </div>
                {% endfor %}
              
                <div class="panel-footer text-right">
                  <a href="{{url('user')}}" class="btn btn-default" type="submit">Cancelar</a>
                  <button class="btn btn-info" type="submit">Editar</button>
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
{% endblock %}
