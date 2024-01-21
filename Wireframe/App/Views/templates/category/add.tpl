{include file="inc/header.tpl"}

<h1 class="text-center my-5 py-3">Add New Category</h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">

            {if isset($data.success)}
                <h3 class="alert alert-success text-center">{$data.success}</h3>
            {/if}
            {if isset($data.error)}
                <h3 class="alert alert-danger text-center">{$data.error}</h3>
            {/if}

            <form class="p-5 border mb-5" method="POST" action="{plugin_url name = 'categories/store'}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required name="category_name" class="form-control" id="category_name">
                </div>
                <div class="form-group">
                    <label for="Parent">Parent</label>
                    <input type="text" required class="form-control" name="parent_id" id="parent_id">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

{include file="inc/footer.tpl"}
