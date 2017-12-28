$.get("../php/get_stats.php", {
  rows: 10
}, function(data){
  var stats = JSON.parse(data);

  $('#clients-count').text(stats['clients']);
  $('#employees-count').text(stats['employees']);
});
