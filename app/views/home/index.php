{% extends "base.html" %}
{% block title %}Home{% endblock %}

{% block body %}
<h1>{{ 'welcome'|lang }}</h1>
<p> {{ 'your_name'|lang }}:
    <mark>{{ user.name }}</mark>
</p>
{% endblock %}