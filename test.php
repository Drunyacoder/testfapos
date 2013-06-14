<?php
$data = array(
	array(
		'url' => 'http://nigma.ru/themes/nigma/img/design/logo_results_web.png',
		'title' => 'nigma',
	),
	array(
		'url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR-d1XSPGJZP_60BbacmEMjsg5fTOwgLCPTOBTn18UO9Kqj2Rg4',
		'title' => 'nigma',
	),
	array(
		'url' => 'http://i1.i.ua/prikol/pic/3/5/153953.jpg',
		'title' => 'nigma',
	),
);
?>

<body style="background:#ccc;">
<div id="slider" style="position:relative; width:400px; height:300px; margin:auto;">
<img id="0" src="<?php echo $data[0]['url'] ?>" title="<?php echo $data[0]['title'] ?>" alt="<?php echo $data[0]['title'] ?>" style="position:absolute;top:0;left:0;width:100%;heiht:100%; " />
<img id="1" src="<?php echo $data[1]['url'] ?>" title="<?php echo $data[1]['title'] ?>" alt="<?php echo $data[1]['title'] ?>" style="position:absolute;top:0;left:0;opacity:0;width:100%;heiht:100%;" />
</div>
<input type="button" onClick="rotateX();" />
<script type="text/javascript" src="http://nigma.ru/themes/nigma/scripts/jquery.min.mq.js"></script>
<script type="text/javascript">
Gid = 0;
Gnext_id = Gid + 1;
function rotate(id, next_id){
	var data = $.parseJSON('<?php echo json_encode($data) ?>');
	
	$("#"+id).animate({
		left:-250,
		opacity:0
	}, function(){
		$("#"+id).remove();
	});
	
	$("#"+next_id).animate({
		opacity:1
	}, 700, function(){
		
		var index = ++next_id;
		
		if (typeof data[index] != 'undefined') {
			
			
			$('#slider').append('<img id="'+index+'" src="'+ data[index].url +'" title="'+ data[index].title +'" alt="'+ data[index].title +'" style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;" />');
		
		
		} else {
			$('#slider').append('<img id="0" src="'+ data[0].url +'" title="'+ data[0].title +'" alt="'+ data[0].title +'" style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;" />');
			
			Gid = --next_id;
			Gnext_id = 0;
		}
	});
}

function rotateX(){
	console.log(Gid+'-'+Gnext_id);
	rotate(Gid, Gnext_id);
	
	Gid = Gnext_id;
	Gnext_id = Gid + 1;
	

}
</script>
</body>
