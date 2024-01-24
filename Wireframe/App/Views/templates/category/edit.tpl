{extends file='home.tpl'}

{block name=content}

<div class="container">
    <h1 class="text-center mt-5 mb-2 py-3">Edit Category</h1>
    <div class="row">
        <div class="col-8 mx-auto">

            {if isset($data.success)}
                <h3 class="alert alert-success text-center">{$data.success}</h3>
            {/if}
            {if isset($data.error)}
                <h3 class="alert alert-danger text-center">{$data.error}</h3>
            {/if}

            <form class="p-5 border mb-5" method="POST" action="{plugin_url name = 'categories/update'}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Name</label>
                    </div>
                    <input type="text" required value="{$data.row.category_name}" name="category_name" class="form-control" id="category_name">
                    <input type="hidden" value="{$data.row.id}" name="id">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                    </div>
                    <select required class="custom-select" name="parent_id" id="parent_id">
                        <option selected>No Parent</option>
                        {foreach $data.categories as $key => $value}
                            <option value = "{$value}">{$key}</option>
                        {/foreach}
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </form>

        </div>
    </div>
</div>

{/block}