{% extends "base.html" %}
{% block title %}Home{% endblock %}

{% block body %}
<h1>Welcome</h1>
<p>Your name is: <mark>{{ user.name }}</mark></p>
{% endblock %}