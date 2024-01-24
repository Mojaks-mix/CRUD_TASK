{extends file='home.tpl'}

{block name=content}
{* {include file='./edit.tpl'} *}
<h1 class="text-center my-5 py-3">View All Categories</h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto p-4 border mb-5">
            {if isset($data.success)}
                <h3 class="alert alert-success text-center">{$data.success}</h3>
            {/if}
            {if isset($data.error)}
                <h3 class="alert alert-danger text-center">{$data.error}</h3>
            {/if}
            <table id="myTable" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {assign var = "i" value = 1}
                    {foreach $data.categories as $row}
                        <tr>
                            <td>{$i}</td>
                            {assign var = "i" value = $i + 1}
                            <td>{$row.category_name}</td>
                            <td>{$row.parent_category_name}</td>
                            <td align="center">
                                <a href="{plugin_url name ='categories/edit?id='|cat:$row.id}" class="btn btn-info">Edit</a>
                                <a href="{plugin_url name ='categories/delete?id='|cat:$row.id}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>

{/block}
<!-- JavaScripts -->
{block name=JS}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{plugin_url name='assets/JS/category.js'}"></script>
{/block}