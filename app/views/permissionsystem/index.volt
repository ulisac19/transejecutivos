{% extends "templates/default.volt" %}
{% block js %}
    <script type="text/javascript">
        var apiUrl = '{{urlManager.getApi_v1Url() ~ '/security'}}';
    </script>
    
    {# Library.Ember #}
    {{ javascript_include('/public/vendors/handlebars-1.1.2/handlebars-1.1.2.js') }}
    {{ javascript_include('/public/vendors/ember-1.7.0/ember-1.7.0.js') }}
    {{ javascript_include('/public/vendors/ember-1.7.0/ember-data.js') }}

    {# App.Ember #}
    {{ javascript_include('/public/js/ember/mixin-save.js') }}
    {{ javascript_include('/public/js/ember/permission-system/app-permission-system.js') }}
    {{ javascript_include('/public/js/ember/permission-system/role.js') }}
    {{ javascript_include('/public/js/ember/permission-system/resource.js') }}
    {{ javascript_include('/public/js/ember/permission-system/action.js') }}
    {{ javascript_include('/public/js/ember/permission-system/permission.js') }}
{% endblock %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Permisos del Sistema</h1>

    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        {{message.output()}}
      </div>    
    </div> 
      
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8">
        <div id="page-content">
          <div class="panel">
            <div class="panel-body">
              <div id="app-container" class="container-fluid">
                <script type="text/x-handlebars">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wrap">
                            <div class="box-header">
                                <ul class="nav nav-pills">
                                    <li class="active">{{'{{#link-to "roles.index"}}'}}Roles{{'{{/link-to}}'}}</li>
                                    <li class="active">{{'{{#link-to "resources.index"}}'}}Recursos{{'{{/link-to}}'}}</li>
                                    {# <li class="active">{{'{{#link-to "permissions.index"}}'}}Permisos{{'{{/link-to}}'}}</li> #}
                                </ul>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wrap">
                            {{'{{outlet}}'}}
                        </div>
                    </div>     
                </script>

                {{ partial('permissionsystem/partials/roles_partial') }}
                {{ partial('permissionsystem/partials/resources_partial') }}
                {{ partial('permissionsystem/partials/actions_partial') }}
                {{ partial('permissionsystem/partials/permissions_partial') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>

{% endblock %}