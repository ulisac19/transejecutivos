{% extends "templates/default.volt" %}
{% block css %}
{% endblock %}
{% block js %}
{% endblock %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Listado de usuarios</h1>

    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="text-right">
          <a href="{{url('account/add')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
        </div>
        <br>
        {{flashSession.output()}}
      </div>    
    </div> 

    <div class="row">
      <div class="col-md-12">
        <div id="page-content">
          <div class="panel">
            {% if page.items|length > 0%}
              <div class="row">
                <div class="col-md-offset-3 col-md-6">
                  <div class="row">
                    {{ partial('partials/pagination', ['pagination_url': 'account/index']) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Datos de Contacto</th>
                          <th></th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        {% for item in page.items %}
                          <tr {% if item.status == 0 %}class="danger"{% endif %}>
                            <td>
                              <strong>{{item.idUser}} - {{item.email}}</strong> <br>
                              <dl>
                                <dd>{{item.name}} {{item.lastname}}</dd>
                                <dd>{{item.phone1}} - {{item.phone2}}</dd>
                                <dd>{{item.address}}</dd>
                              </dl>
                            </td>
                            <td>
                              {{item.role.name}} <br>
                              Creado {{date('d/M/Y', item.createdon)}} <br> 
                              Actualizado {{date('d/M/Y', item.updatedon)}}
                            </td>
                            <td class="text-right">
                              <a href="{{url('user/update')}}/{{item.idUser}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></i></a>
                              <a id="show-delete-modal" data-toggle="modal" href="#delete-modal" data-id="{{url('user/deactivate')}}/{{item.idUser}}" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
                            </td>
                          </tr>    
                        {% endfor %}
                      </tbody>
                    </table>
                  </div>

                  <div class="row">
                    {{ partial('partials/pagination', ['pagination_url': 'account/index']) }}
                  </div>
                </div>
              </div>
            {% else %}        
              {{ partial('partials/empty-rows', ['resource_name': 'Cuentas', 'resource_url': 'account/add']) }}
            {% endif %} 
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}

