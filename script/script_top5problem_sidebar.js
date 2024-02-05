document.getElementById('emptyArea_top5').onclick = function() {
  var menu = document.getElementById('sideMenu');
  if (menu.style.display === 'none') {
    menu.style.display = 'block';
  } else {
    menu.style.display = 'none';
  }
}
document.getElementById('closeMenu').onclick = function() {
  var menu = document.getElementById('sideMenu');
  menu.style.display = 'none';
}