<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!-- Style Sheets -->
    {block name=CSS}{/block}

    <title>{block name=title}CRUD_TASK{/block}</title>
  </head>
  <body>
    <!-- Navigation Sidebar -->
    {include file="navbar.tpl"}

    <!-- Main Content -->
    {block name=content}
      <div class="jumbotron text-center mt-5">
        <h1 class="display-4">CRUD_MVC</h1>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="{plugin_url name = 'categories'}" role="button">SHOW Categories</a>
      </div>
    {/block}

    <!-- JavaScripts -->
    {block name=JS}{/block}
  </body>
</html>