<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <style>
            body { 
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
             } 
        </style>
    
        <title>{block name=title}CRUD_TASK{/block}</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <h1 class="text-center my-5 py-3">Login</h1> 
                    {if isset($data.error)}
                        <h3 class="alert alert-danger text-center">{$data.error}</h3>
                    {/if}

                    <form class="p-5 border mb-5" method="POST" action="{plugin_url name = 'Auth/verify'}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <lable class="input-group-text">Userame/Email</lable>
                            </div>
                            <input type="text" required name="key" class="form-control" id="key">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Password</label>
                            </div>
                            <input type="password" required name="pass" class="form-control" id="pass">
                        </div>        
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>
        </div>

    </body>
</html>