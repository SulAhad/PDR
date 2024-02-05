<style>
.modal-overlay_baner {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}
.modal-content_baner {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
}
.modal-content_baner label {
    display: block;
    margin-top: 10px;
}
.modal-content_baner button {
    display: block;
    margin-top: 10px;
}
</style>
<div id="modal_baner" class="modal-overlay_baner">
  <div class="modal-content_baner">
   <h2>Коллеги! Очистите пожалуйста кэш браузера</h2>
   <!-- <ul>
    <li>Обновление 1</li>
    <li>Обновление 2</li>
    <li>Обновление 3</li>
   </ul> -->
   <label for="hide-modal_baner"><input type="checkbox" id="hide-modal_baner"> Больше не показывать</label>
   <button class="btn" onclick="hideModal_baner()">Закрыть</button>
  </div>
</div>
<script>
function showModal_baner() {
 var modal_baner = document.getElementById("modal_baner");
 modal_baner.style.display = "block";
}
function hideModal_baner() {
 var modal_baner = document.getElementById("modal_baner");
 var checkbox_baner = document.getElementById("hide-modal_baner");
 if (checkbox_baner.checked) {
  localStorage.setItem("hide-modal_baner", "true");
 }
 modal_baner.style.display = "none";
}
if (!localStorage.getItem("hide-modal-baner")) {
 showModal_baner();
}
</script>
