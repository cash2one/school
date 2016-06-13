$(function	()	{


	//Morris Chart (Total Visits)
	var totalVisitChart = Morris.Bar({
	  element: 'totalSalesChart',
	  data: [
	    { y: '周一', a: 3, b: 90, c: 30 },
	    { y: '周二', a: 75,  b: 65, c: 30 },
	    { y: '周三', a: 50,  b: 20, c: 3542 },
	    { y: '周四', a: 75,  b: 65, c: 30 },
	    { y: '周五', a: 50,  b: 40, c: 30 },
	    { y: '周六', a: 75,  b: 65, c: 30 },
	    { y: '周日', a: 100, b: 90, c: 30 }
	  ],
	  xkey: 'y',
	  ykeys: ['a', 'b', 'c'],
	  labels: ['本日新增教师', '本日订单成交','本日成交金额'],
	  barColors: ['#999', '#cfcfcf', '#b8b2b2'],
	  grid: false,
	  gridTextColor: '#777',
	});
	
});
