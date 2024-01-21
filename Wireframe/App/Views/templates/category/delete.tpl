{include file="inc/header.tpl"}

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">

            {if isset($data.success)}
                <h3 class="alert alert-success text-center">{$data.success}</h3>
            {/if}
            {if isset($data.error)}
                <h3 class="alert alert-danger text-center">{$data.error}</h3>
            {/if}

        </div>
    </div>
</div>

{include file="inc/footer.tpl"}
