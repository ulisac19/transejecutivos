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
      
      $('#role').change(function () {
        var id = $(this).val();
        var name = $("#name").val();
        location.replace("{{url('driver/index')}}?page=1&role=" + id + "&name=" + name);
      });
    });
    
    function search() {
      var id =$('#role').val();
      var name = $("#name").val();
      
      if (name !== "" && name !== null && name !== undefined) {
        location.replace("{{url('driver/index')}}?page=1&role=" + id + "&name=" + name);
      }
    }
    
    function reset() {
      location.replace("{{url('driver/index')}}?page=1&role=0&name=");
    } 
  </script>
{% endblock %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Listado de Conductores</h1>

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
                    <input  name="name" id="name" type="text" placeholder="Escriba el nombre o apellido del conductor" class="form-control" value="{{name}}">
                    <span class="input-group-btn">
                      <button class="btn btn-danger btn-labeled fa fa-search" type="button" onClick="search();">Buscar</button>
                      <button class="btn btn-primary" type="button" onClick="reset();"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </span>
                  </div>
                </div>
                <div class="col-md-4 text-right">
                <a href="{{url('driver/new')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                </div>
              </div>  
            </div>

            <div class="panel-body">
              {% if page.items|length > 0%}
                <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                    <div class="row">
                      {{ partial('partials/pagination', ['pagination_url': 'driver/index']) }}
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
                            <tr {% if item.status == 0 %}class="danger"{% endif %}>
                              <td>
                                {{item.iddriver}}
                              </td>
                              <td>
                                <strong class="md-text">{{item.email}}</strong> <br>
                                <dl>
                                  <dd class="sm-text">{{item.name}} {{item.lastname}}</dd>
                                  <dd>{{item.phone1}} - {{item.phone2}}</dd>
                                  <dd><em>{{item.address}}</em></dd>
                                </dl>
                              </td>
                              <td>
                                <span class="label 
                                      {% if item.role.idRole == 1 %}
                                        label-success
                                      {% elseif item.role.idRole == 2 %}
                                        label-info
                                      {% else %}
                                        label-default
                                      {% endif %}
                                ">
                                  {{item.role.name}}
                                </span> <br>
                                <em class="xs-text">
                                  Creado {{date('d/M/Y H:i', item.createdon)}} <br> 
                                  Actualizado {{date('d/M/Y H:i', item.updatedon)}}
                                </em>
                              </td>
                              <td class="text-right">
                                <a href="{{url('driver/update')}}/{{item.iddriver}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></i></a>
                                <a id="show-delete-modal" data-toggle="modal" href="#delete-modal" data-id="{{url('driver/disable')}}/{{item.iddriver}}" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
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
                                <a href="{{ url('driver/index') }}?page=1&role={{idRole}}&name={{name}}" class="new-element {{ (page.current == 1)?'disabled':'enabled' }}"><i class="fa fa-fast-backward" aria-hidden="true"></i></a>
                            </li>
                            <li class="{{ (page.current == 1)?'disabled':'enabled' }}">
                                <a href="{{ url('driver/index') }}?page={{ page.before }}&role={{idRole}}&name={{name}}" class="new-element {{ (page.current == 1)?'disabled':'enabled' }}"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <span><b>{{page.total_items}}</b> registros </span><span>Página <b>{{page.current}}</b> de <b>{{page.total_pages}}</b></span>
                            </li>
                            <li class="{{ (page.current >= page.total_pages)?'disabled':'enabled' }}">
                                <a href="{{ url('driver/index') }}?page={{page.next}}&role={{idRole}}&name={{name}}" class="new-element {{ (page.current >= page.total_pages)?'disabled':'enabled' }}"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
                            </li>
                            <li class="{{ (page.current >= page.total_pages)?'disabled':'enabled' }}">
                                <a href="{{ url('driver/index') }}?page={{page.last}}&role={{idRole}}&name={{name}}" class="new-element {{ (page.current >= page.total_pages)?'disabled':'enabled' }}"><i class="fa fa-fast-forward" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    </div>
                  </div>
                </div>
              {% else %}        
                {{ partial('partials/empty-rows', ['resource_name': 'Conductores', 'resource_url': 'user/new']) }}
              {% endif %} 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}

