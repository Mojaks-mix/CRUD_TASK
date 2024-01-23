{extends file='home.tpl'}

{block name=content}
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
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <lable class="input-group-text">Name</lable>
                    </div>
                    <input type="text" required name="category_name" class="form-control" id="category_name">
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                    </div>
                    <select required class="custom-select" name="parent_id" id="parent_id">
                        <option selected>No Parent</option>
                        {foreach $data as $key => $value}
                            <option value = "{$value}">{$key}</option>
                        {/foreach}
                    </select>
                </div>        
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>

        </div>
    </div>
</div>

{/block}
