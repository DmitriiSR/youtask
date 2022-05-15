<?php require_once "components/header.php"?>

<div class="container py-5">
     <!-- ko foreach: viewModel.tasks -->
         <div class="row">
            <div class="col">
                <div class="panel bg-white shadow-lg p-4 mt-4 rounded-3">
                    <h3 data-bind="text: tasktitle"></h3>
                </div>
            </div>
        </div>
      <!-- /ko -->
</div>

<?php require_once "components/footer.php"?>

