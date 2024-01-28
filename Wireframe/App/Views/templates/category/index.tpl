{extends file='home.tpl'}

{block name=CSS}
    <link rel="stylesheet" href="{plugin_url name='assets/CSS/category.css'}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
{/block}

{block name=content}

    <!-- Edit Category -->
    {include file='./edit.tpl'}

    {block name=table}
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto p-4 border mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4> 
                            Categories
                            <a href="{plugin_url name ='categories/add'}" class="float-right">
                            <button type="button" class="btn btn-secondary" > Add Category </button>
                            </a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col">Contents Count</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/block}

{/block}
<!-- JavaScripts -->
{block name=JS}
    <script src="{plugin_url name='assets/JS/category.js'}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
{/block}