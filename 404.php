<?php require_once "components/header.php"?>
<div id="js-particles"><canvas class="particles-js-canvas-el" width="1410" height="705" style="width: 100%; height: 100%;">
</canvas>
<div class="container mt-5">
    <div class="row">
        <p class="text-center fs-1">Упс, тут нет ваших задач</p>
    </div>
</div></div>


<script>
    particlesJS(
  'js-particles', {
    'particles': {
      'number': {
        'value': 38
      },
      'color': {
        'value': ['#ff223e', '#5d1eb2', '#ff7300']
      },
      'shape': {
        'type': 'circle'
      },
      'opacity': {
        'value': 1,
        'random': false,
        'anim': {
          'enable': false
        }
      },
      'size': {
        'value': 3,
        'random': true,
        'anim': {
          'enable': false,
        }
      },
      'line_linked': {
        'enable': false
      },
      'move': {
        'enable': true,
        'speed': 2,
        'direction': 'none',
        'random': true,
        'straight': false,
        'out_mode': 'out'
      }
    },
    'interactivity': {
      'detect_on': 'canvas',
      'events': {
        'onhover': {
          'enable': false
        },
        'onclick': {
          'enable': false
        },
        'resize': true
      }
    },
    'retina_detect': true
});

</script>
<?php require_once "components/footer.php"?>