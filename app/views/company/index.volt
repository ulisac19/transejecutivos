{% extends "templates/default.volt" %}
{% block css %}
  {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.css') }}
{% endblock %}
{% block js %}
  {{ javascript_include('/public/vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.js') }}
  <script>
    $(function() {
      $('.select-picker').selectpicker({
        style: 'btn-info',
        size: 4
      });
      
    });
    
    function search() {
      var name = $("#name").val();
      
      if (name !== "" && name !== null && name !== undefined) {
        location.replace("{{url('company/index')}}?page=1&name=" + name);
      }
    }
    
    function reset() {
      location.replace("{{url('company/index')}}?page=1&name=");
    } 
  </script>
{% endblock %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Listado de Pasajeros</h1>

    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        {{flashSession.output()}}
      </div>    
    </div> 

    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <div id="page-content">
          <div class="panel">
            <div class="panel-heading">
              <div class="row block">
                <div class="col-md-4 col-md-offset-4">
                  <div class="input-group mar-btm">
                    <input  name="name" id="name" type="text" placeholder="Escriba el nombre o apellido del usuario" class="form-control" value="{{name}}">
                    <span class="input-group-btn">
                      <button class="btn btn-danger btn-labeled fa fa-search" type="button" onClick="search();">Buscar</button>
                      <button class="btn btn-primary" type="button" onClick="reset();"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </span>
                  </div>
                </div>
                <div class="col-md-4 text-right">
                <a href="{{url('company/new')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                </div>
              </div>  
            </div>

            <div class="panel-body">
              {% if page.items|length > 0%}
                <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                    <div class="row">
                      {{ partial('partials/pagination', ['pagination_url': 'company/index']) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Datos de Contacto</th>
                            <th></th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          {% for item in page.items %}
                            <tr>
                              <td>
                                {{item.idCompany}}
                              </td>
                              <td>
                                <strong class="md-text">{{item.email1}}</strong> <br>
                                <dl>
                                  <dd class="sm-text">{{item.name}} {{item.agent_name}}</dd>
                                  <dd>{{item.phone1}} - {{item.phone2}}</dd>
                                  <dd><em>{{item.address}}</em></dd>
                                </dl>
                              </td>
                              <td>
                                <br>
                                <em class="xs-text">
                                  Creado {{date('d/M/Y H:i', item.created_date)}} <br> 
                                  Actualizado {{date('d/M/Y H:i', item.edited_date)}}
                                </em>
                              </td>
                              <td class="text-right">
                                <a href="{{url('company/update')}}/{{item.idCompany}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></i></a>
                                <a id="show-delete-modal" data-toggle="modal" href="#delete-modal" data-id="{{url('company/disable')}}/{{item.idCompany}}" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
                              </td>
                            </tr>    
                          {% endfor %}
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <div id="pagination" class="text-center">
                        <ul class="pagination">
                            <li class="{{ (page.current == 1)?'disabled':'enabled' }}">
                                <a href="{{ url('company/index') }}?page=1&name={{name}}" class="new-element {{ (page.current == 1)?'disabled':'enabled' }}"><i class="fa fa-fast-backward" aria-hidden="true"></i></a>
                            </li>
                            <li class="{{ (page.current == 1)?'disabled':'enabled' }}">
                                <a href="{{ url('company/index') }}?page={{ page.before }}&name={{name}}" class="new-element {{ (page.current == 1)?'disabled':'enabled' }}"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <span><b>{{page.total_items}}</b> registros </span><span>Página <b>{{page.current}}</b> de <b>{{page.total_pages}}</b></span>
                            </li>
                            <li class="{{ (page.current >= page.total_pages)?'disabled':'enabled' }}">
                                <a href="{{ url('company/index') }}?page={{page.next}}&name={{name}}" class="new-element {{ (page.current >= page.total_pages)?'disabled':'enabled' }}"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
                            </li>
                            <li class="{{ (page.current >= page.total_pages)?'disabled':'enabled' }}">
                                <a href="{{ url('company/index') }}?page={{page.last}}&name={{name}}" class="new-element {{ (page.current >= page.total_pages)?'disabled':'enabled' }}"><i class="fa fa-fast-forward" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    </div>
                  </div>
                </div>
              {% else %}        
                {{ partial('partials/empty-rows', ['resource_name': 'Pasageros', 'resource_url': 'passenger/new']) }}
              {% endif %} 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}

	