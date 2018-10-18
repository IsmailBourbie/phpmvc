{% extends "base.html" %}
{% block title %}External Error{% endblock %}

{% block body %}
<h1>External Error 505</h1>
<p>Some thing wrong try later <a href="{{ config.ROOT('URL') }}">back to home</a></p>
{% endblock %}