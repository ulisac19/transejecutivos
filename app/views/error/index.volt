{% extends "templates/default.volt" %}
{% block content %}
  <div id="page-title">
    <h1 class="page-header text-overflow">Listado de usuarios</h1>

    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        {{flashSession.output()}}
      </div>    
    </div> 
{% endblock %}
