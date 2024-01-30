{extends file='home.tpl'}

{block name=CSS}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
{/block}

{block name=content}

    <!-- Edit Content -->
    {include file='./edit.tpl'}

    {block name=table}
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto p-4 border mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4> 
                            Contents
                            <a href="{plugin_url name ='contents/add'}" class="float-right">
                            <button type="button" class="btn btn-secondary" > Add Content </button>
                            </a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Content Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Added Date</th>
                                    <th scope="col">Added By</th>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

    <script src="{plugin_url name='assets/JS/content.js'}"></script>
{/block}