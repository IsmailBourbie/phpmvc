{% extends "base.html" %}
{% block title %}Page Not Found{% endblock %}

{% block body %}
<h1>Page Not Found</h1>
<p>Sorry this page not exist in our site <a href="{{ config.ROOT('URL') }}">back to home</a></p>
{% endblock %}