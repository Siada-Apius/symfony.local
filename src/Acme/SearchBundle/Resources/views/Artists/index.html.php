{% extends "::base.html.twig" %}

{% block title %}AcmeSearchBundle:Artists:index{% endblock %}

{% block body %}

    <h1>Welcome to the Artists:index page</h1>

    <table class="table table-bordered">
        <tr>
            {# sorting of properties based on query components #}
            <th>{{ knp_pagination_sortable(pagination, 'Id', 'a.aid') }}</th>
            <th{% if pagination.isSorted('a.Title') %} class="sorted"{% endif %}>{{ knp_pagination_sortable(pagination, 'Title', 'a.atitle') }}</th>
        </tr>

        {# table body #}
        {% for article in pagination %}
            <tr {% if loop.index is odd %}class="color"{% endif %}>
                {{ article }}

            </tr>
        {% endfor %}
    </table>
    {# display navigation #}
    <div class="pagination-centered">

        <div class="alert-info">
            <p>All pages: {{ pagination.getTotalItemCount }}</p>
        </div>

        {{ knp_pagination_render(pagination) }}
    </div>

{% endblock %}