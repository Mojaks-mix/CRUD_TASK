{include file="inc/header.tpl"}

<h1 class="text-center my-5 py-3">View All Products</h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto p-4 border mb-5">
            {if isset($data.success)}
                <h3 class="alert alert-success text-center">{$data.success}</h3>
            {/if}
            {if isset($data.error)}
                <h3 class="alert alert-danger text-center">{$data.error}</h3>
            {/if}
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {assign var = "i" value = 1}
                    {foreach $data.products as $row}
                        <tr>
                            <td>{$i}</td>
                            {assign var = "i" value = $i + 1}
                            <td>{$row.name}</td>
                            <td>{$row.price} <b class="float-right"> $ </b></td>
                            <td class="text-center">{$row.description}</td>
                            <td>{$row.quantity}</td>
                            <td>
                                <a href="{plugin_url name ='products/edit/'|cat:$row.id}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="{plugin_url name ='products/delete/'|cat:$row.id}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>

{include file="inc/footer.tpl"}
