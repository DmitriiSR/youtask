<?php require_once "components/header.php"?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    window.onload = function() {
        getDB('tasks');
    }
</script>
<style>

</style>

<div class="container">
    <div class="row justify-content-between">
        <div class="panel w-25 bg-primary">
            <div style="height: 150px;">
                <img src="images/classes-img.png" alt="" class="img-response w-100" style="height: 100%; object-fit: contain;">
            </div>

            <p class="mt-auto">asdfgasd gasd gasd gajngadshdgi uasdh asduifhasdiug hasdiuhg asdukghasduukfaskduufh asdkjfhasdkdfh aiy</p>
            <div class="btn btn-primary">Click</div>
        </div>
        <div class="panel w-25 bg-primary">
            <div style="height: 150px;">
                <img src="images/listening-img.png" alt="" class="img-response w-100" style="height: 100%; object-fit: contain;">
            </div>
            <p class="mt-auto">asdfgasd gasd gasd gajngadshdgi uasdh asduifhasdiug hasdiuhg asdukghasduukfaskduufh asdkjfhasdkdfh aiy</p>
            <p class="">asdfgasd gasd gasd gajngadshdgi uasdh asduifhasdiug hasdiuhg asdukghasduukfaskduufh asdkjfhasdkdfh aiy</p>
            <div class="btn btn-primary">Click</div>
        </div>
        <div class="panel w-25 bg-primary">
            <div style="height: 150px;">
                <img src="images/writing-img.png" alt="" class="img-response w-100" style="height: 100%; object-fit: contain;">
            </div>
            <p class="mt-auto">asdfgasd gasd gasd gajngadshdgi uasdh asduifhasdiug hasdiuhg asdukghasduukfaskduufh asdkjfhasdkdfh aiy</p>
            <div class="btn btn-primary">Click</div>
        </div>
    </div>
</div>


<script>
    let showDropdown = function (e) {
        let popupMenu = e.closest('.nav-item').querySelector('.popup-menu');
        $(popupMenu).toggle();
    }
    $(document).click(function (e) {
        let popup = $('.nav-item > .popup-menu');
        let btn = $('.nav-link');

        if ( ! btn.is(e.target) && btn.has(e.target).length === 0 &&
            ! popup.is(e.target) && popup.has(e.target).length === 0
        ) {
            popup.hide();
        }
    });
</script>

