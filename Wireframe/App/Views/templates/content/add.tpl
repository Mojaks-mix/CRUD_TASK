{extends file='home.tpl'}

{block name=CSS}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
{/block}

{block name=content}
    <h1 class="text-center my-5 py-3">Add New Content</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">

                {if isset($data.success)}
                    <h3 class="alert alert-success text-center">{$data.success}</h3>
                {/if}
                {if isset($data.error)}
                    <h3 class="alert alert-danger text-center">{$data.error}</h3>
                {/if}

                <form class="p-5 border mb-5" method="POST" action="{plugin_url name = 'contents/store'}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <lable class="input-group-text">Content Title</lable>
                        </div>
                        <input type="text" required name="content_title" class="form-control" id="content_title">
                    </div>

                    <div>
                        <div class="input-group-prepend">
                            <lable class="input-group-text">Content</lable>
                        </div>
                        <div name="editor" id="editor"></div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="hidden" name="content" value="" id="content">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Category</label>
                        </div>
                        <select required class="custom-select" name="category_id" id="category_id">
                            <option selected>No Category</option>
                            {foreach $data as $key => $value}
                                <option value="{$value}">{$key}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="enabled" id="customCheck1" checked>
                        <label class="custom-control-label" for="customCheck1">Enable</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Add</button>
                </form>

            </div>
        </div>
    </div>

{/block}
<!-- JavaScripts -->
{block name=JS}
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', { 
            modules: { 
                toolbar: [
                    [ { header: [1, 2, 3, 4, 5, false] } ],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block'],
                    [ { list: "ordered" } , { list: "bullet" } ]
                ]
             } ,
            placeholder: 'Write Content Here...',
            theme: 'snow'
         } );

        $('#submit').click(function() { 
            var value = quill.getContents();
            $('#content').val(JSON.stringify(value));
         } );        
    </script>
{/block}