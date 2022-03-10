<?php require_once "components/header.php"?>

<button id="btn">test</button>


<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src="js/main.js"></script>
<script>
    let button = document.getElementById('btn');
    button.addEventListener('click', () => getRows('users'));
</script>
</body>
</html>
