<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <!-- Style Sheets -->
    {block name=CSS}{/block}

    <title>{block name=title}CRUD_TASK{/block}</title>
  </head>
  <body>
    <!-- Navigation Sidebar -->
    {include file="navbar.tpl"}

    <!-- Main Content -->
    {block name=content}
      <div class="container">
        <h1 class="display-6">Total Categories Count: {$data.categoriesCount}</h1>
        <h1 class="display-6">Total Contents Count: {$data.contentsCount}</h1>
        <div class="row">
          <div class="col-8 mx-auto">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    {/block}

    <!-- JavaScripts -->
    {block name=JS}
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="{plugin_url name='assets/JS/Pie_Chart.js'}"></script>
    {/block}
  </body>
</html>