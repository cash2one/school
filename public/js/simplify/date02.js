$(function	()	{

  	//Flot Chart (Total Sales)
	var d1 = [];
	for (var i = 0; i <= 10; i += 1) {
		//d1.push([i, parseInt(Math.random() * 30)]);
		d1 = [[1,700],[2,1200],[3,1100],[4,900],[5,500],[6,700],[7,500],[8,600],[9,1200],[10,1700],[11,1200],[12,1200]];
	}

	function plotWithOptions() {
		$.plot("#placeholder", [d1], {
			series: {
				lines: {
					show: true,
					fill: true,
					fillColor: '#eee',
					steps: false,
					
				},
				points: { 
					show: true, 
					fill: false 
				}
			},

			grid: {
				color: '#fff',
				hoverable: true,
    			autoHighlight: true,
			},
			colors: [ '#bbb'],
		});
	}

	$("<div id='tooltip'></div>").css({
		position: "absolute",
		display: "none",
		border: "1px solid #222",
		padding: "4px",
		color: "#fff",
		"border-radius": "4px",
		"background-color": "rgb(0,0,0)",
		opacity: 0.90
	}).appendTo("body");

	$("#placeholder").bind("plothover", function (event, pos, item) {

		var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
		$("#hoverdata").text(str);
	
		if (item) {
			var x = item.datapoint[0],
				y = item.datapoint[1];
			
				$("#tooltip").html("当月成交量 : " + y)
				.css({top: item.pageY+5, left: item.pageX+5})
				.fadeIn(200);
		} else {
			$("#tooltip").hide();
		}
	});

	plotWithOptions();

});
