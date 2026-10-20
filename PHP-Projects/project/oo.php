<!-- loader-wrapper start -->
<div id="loader-wrapper" style="position: fixed; width: 100%; height: 100%; background: white; z-index: 9999; display: flex; align-items: center; justify-content: center;">
  <div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<script>
  window.addEventListener("load", function () {
    document.getElementById("loader-wrapper").style.display = "none";
  });
</script>
<!-- loader-wrapper end -->
