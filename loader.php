<div class="loader">
<img src="loader/Spinner.gif">
</div>

<!-- CSS Loader -->
<style type="text/css">
.loader{
  position: fixed;
  z-index: 99;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: white;
  display: flex;
  justify-content: center;
  align-items: center;
}
.loader > img{
  width: 100px;
}
.loader.hidden {
  animation: fadeOut 1s;
  animation-fill-mode: forwards;
}
@keyframes fadeOut {
  100%{
    opacity: 0;
    visibility: hidden;
  }
}

</style>

<!-- Loader JS -->
<script type="text/javascript">
  window.addEventListener("load",function() {
    const loader = document.querySelector(".loader");
    loader.className += "  hidden";
  });
</script>
