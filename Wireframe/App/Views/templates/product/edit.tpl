{include file="inc/header.tpl"}

<h1 class="text-center mt-5 mb-2 py-3">Edit Product</h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">

            {if isset($data.success)}
                <h3 class="alert alert-success text-center">{$data.success}</h3>
            {/if}
            {if isset($data.error)}
                <h3 class="alert alert-danger text-center">{$data.error}</h3>
            {/if}

            <form class="p-5 border mb-5" method="POST" action="{plugin_url name = 'products/update'}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required value="{$data.row.name}" name="name" class="form-control" id="name">
                    <input type="hidden" value="{$data.row.id}" name="id">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" required class="form-control" value="{$data.row.price}" name="price" id="price">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" required class="form-control" value="{$data.row.description}" name="description" id="description">
                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" required class="form-control" value="{$data.row.quantity}" name="quantity" id="quantity">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

{include file="inc/footer.tpl"}
