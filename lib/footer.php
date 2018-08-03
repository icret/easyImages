<?php
echo '    
    <script type="text/javascript">
  // jsqrcode获取当前网址并赋值给id=text的value
  document.getElementById("text").value = window.location.href;

  var qrcode = new QRCode(document.getElementById("qrcode"), {
    width: 150,
    height: 150
  });
  function makeCode() {
    var elText = document.getElementById("text");

    if (!elText.value) {
      alert("Input a text");
      elText.focus();
      return;
    }

    qrcode.makeCode(elText.value);
  }
  makeCode();

  $("#text").on("blur",
  function() {
    makeCode();
  }).on("keydown",
  function(e) {
    if (e.keyCode == 13) {
      makeCode();
    }
  });
  </script>
  <footer class="text-muted small col-md-12" style="text-align: center">
  <hr />
        Copyright © '. date('Y').' EasyImage Powered By <code><a href="https://github.com/icret/easyImages" target="_blank">pyther</a></code> Verson: '.$config['Version'].'
    </footer>
</body>
</html>
    ';