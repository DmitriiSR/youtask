<?php require_once "components/header.php"?>
<div data-bind="template: {name: 'file-upload-form', data: 'tasks'}"></div>

<script type="text/html" id="file-upload-form">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div id="drag-and-drop-zone" class="dm-uploader p-5">
                <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>

                <div class="btn btn-primary btn-block mb-5">
                    <span>Open the file Browser</span>
                    <input type="file" title='Click to add Files' />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card h-100">
                <div class="card-header">
                    File List
                </div>

                <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                    <li class="text-muted text-center empty">No files uploaded.</li>
                </ul>
            </div>
        </div>
    </div>

</script>
<script type="text/html" id="files-template">
    <li class="media">
        <div class="media-body mb-1">
            <p class="mb-2">
                <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
            </p>
            <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                     role="progressbar"
                     style="width: 0%"
                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <hr class="mt-1 mb-1" />
        </div>
    </li>
</script>
<script type="text/html" id="debug-template">
    <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
</script>

<?php require_once "components/footer.php"?>

