<style>
    .alert {
  position: fixed;
  top: 80px;
  right: 0;
  z-index: 9999; /* это свойство делает блок "alert" поверх всех других элементов */
  display: block; /* чтобы блок был видимым */
}
</style>
<div class="alert alert-success" style="display:none; position: fixed; top: 80; right: 0;">Данные успешно сохранены!</div>
<div class="alert alert-success_Update" style="background:lightblue; display:none; position: fixed; top: 80; right: 0;">Данные успешно изменены!</div>
<div class="alert alert-success_Delete" style="background:lightyellow; display:none; position: fixed; top: 80; right: 0;">Строка успешно удалена!</div>
<div class="alert alert-success_noname" style="background:red; display:none; position: fixed; top: 80; right: 0;">Выберите Фамилию!</div>
<div class="alert alert-success_UserError" style="background:red; display:none; position: fixed; top: 80; right: 0;">Пользователь с таким Login уже существует!</div>
<div class="alert alert-success_error" style="background:red; display:none; position: fixed; top: 80; right: 0;">Ошибка в данных!</div>
<div class="alert alert-error_SUM_water" style="background:red; display:none; position: fixed; top: 80; right: 0;">В 250 m3 ёмкости предел по объему!</div>
<!-- <div style="position: fixed; top: 0; right: 0; z-index: 9999;">


    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="mr-auto">Уведомление</strong>
        <small class="text-muted"><?php $date = date("y-m-d"); echo $date ?></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
      Данные успешно сохранены!
      </div>
    </div>
  </div> -->