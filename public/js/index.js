window.onload = function() {
  var d = document.getElementById('t');
  console.log(d);
  d.onclick = function(ob) {
    d.style.color == 'red' ? d.style.color = 'purple' : d.style.color = 'red';
  }
}

function openDialog(params) {
  console.log('Opening dialog...');
};