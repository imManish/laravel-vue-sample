"use strict";
// Cicle Chart
Circles.create({
	id:           'task-complete',
	radius:       75,
	value:        80,
	maxValue:     100,
	width:        7,
	text:         function(value){return value + '%';},
	colors:       ['#eee', '#177dff'],
	duration:     400,
	wrpClass:     'circles-wrp',
	textClass:    'circles-text',
	styleWrapper: true,
	styleText:    true
})

//Notify
$.notify({
	icon: 'flaticon-alarm-1',
	title: 'Ready Pro',
	message: 'Premium Bootstrap 4 Admin Dashboard',
},{
	type: 'info',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

// JQVmap
$('#map-example').vectorMap(
{
	map: 'world_en',
	backgroundColor: 'transparent',
	borderColor: '#fff',
	borderWidth: 2,
	color: '#e4e4e4',
	enableZoom: true,
	hoverColor: '#35cd3a',
	hoverOpacity: null,
	normalizeFunction: 'linear',
	scaleColors: ['#b6d6ff', '#005ace'],
	selectedColor: '#35cd3a',
	selectedRegions: ['ID', 'RU', 'US', 'AU', 'CN', 'BR'],
	showTooltip: true,
	onRegionClick: function(element, code, region)
	{
		return false;
	},
	onResize: function (element, width, height) {
		console.log('Map Size: ' +  width + 'x' +  height);
	},
});

//Chart

var ctx = document.getElementById('statisticsChart').getContext('2d');

var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
gradientStroke.addColorStop(0, '#177dff');
gradientStroke.addColorStop(1, '#80b6f4');

var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
gradientFill.addColorStop(0, "rgba(23, 125, 255, 0.7)");
gradientFill.addColorStop(1, "rgba(128, 182, 244, 0.3)");

var gradientStroke2 = ctx.createLinearGradient(500, 0, 100, 0);
gradientStroke2.addColorStop(0, '#f3545d');
gradientStroke2.addColorStop(1, '#ff8990');

var gradientFill2 = ctx.createLinearGradient(500, 0, 100, 0);
gradientFill2.addColorStop(0, "rgba(243, 84, 93, 0.7)");
gradientFill2.addColorStop(1, "rgba(255, 137, 144, 0.3)");

var gradientStroke3 = ctx.createLinearGradient(500, 0, 100, 0);
gradientStroke3.addColorStop(0, '#fdaf4b');
gradientStroke3.addColorStop(1, '#ffc478');

var gradientFill3 = ctx.createLinearGradient(500, 0, 100, 0);
gradientFill3.addColorStop(0, "rgba(253, 175, 75, 0.7)");
gradientFill3.addColorStop(1, "rgba(255, 196, 120, 0.3)");

var statisticsChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [ {
			label: "Subscribers",
			borderColor: gradientStroke2,
			pointBackgroundColor: gradientStroke2,
			pointRadius: 0,
			backgroundColor: gradientFill2,
			legendColor: '#f3545d',
			fill: true,
			borderWidth: 1,
			data: [154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374]
		}, {
			label: "New Visitors",
			borderColor: gradientStroke3,
			pointBackgroundColor: gradientStroke3,
			pointRadius: 0,
			backgroundColor: gradientFill3,
			legendColor: '#fdaf4b',
			fill: true,
			borderWidth: 1,
			data: [256, 230, 245, 287, 240, 250, 230, 295, 331, 431, 456, 521]
		}, {
			label: "Active Users",
			borderColor: gradientStroke,
			pointBackgroundColor: gradientStroke,
			pointRadius: 0,
			backgroundColor: gradientFill,
			legendColor: '#177dff',
			fill: true,
			borderWidth: 1,
			data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
		}]
	},
	options : {
		responsive: true, 
		maintainAspectRatio: false,
		legend: {
			display: false
		},
		tooltips: {
			bodySpacing: 4,
			mode:"nearest",
			intersect: 0,
			position:"nearest",
			xPadding:10,
			yPadding:10,
			caretPadding:10
		},
		layout:{
			padding:{left:15,right:15,top:15,bottom:15}
		},
		scales: {
			yAxes: [{
				ticks: {
					fontColor: "rgba(0,0,0,0.5)",
					fontStyle: "500",
					beginAtZero: false,
					maxTicksLimit: 5,
					padding: 20
				},
				gridLines: {
					drawTicks: false,
					display: false
				}
			}],
			xAxes: [{
				gridLines: {
					zeroLineColor: "transparent"
				},
				ticks: {
					padding: 20,
					fontColor: "rgba(0,0,0,0.5)",
					fontStyle: "500"
				}
			}]
		}, 
		legendCallback: function(chart) { 
			var text = []; 
			text.push('<ul class="' + chart.id + '-legend html-legend">'); 
			for (var i = 0; i < chart.data.datasets.length; i++) { 
				text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
				if (chart.data.datasets[i].label) { 
					text.push(chart.data.datasets[i].label); 
				} 
				text.push('</li>'); 
			} 
			text.push('</ul>'); 
			return text.join(''); 
		}  
	}
});

var myLegendContainer = document.getElementById("myChartLegend");

// generate HTML legend
myLegendContainer.innerHTML = statisticsChart.generateLegend();

// bind onClick event to all LI-tags of the legend
var legendItems = myLegendContainer.getElementsByTagName('li');
for (var i = 0; i < legendItems.length; i += 1) {
	legendItems[i].addEventListener("click", legendClickCallback, false);
}


var ctx2 = document.getElementById('usersChart').getContext('2d');

var usersChart = new Chart(ctx2, {
	type: 'pie',
	data: {
		datasets: [{
			data: [50, 35, 15],
			"backgroundColor":["rgb(23, 125, 255)","rgb(255, 100, 109)","rgb(253, 190, 70)"],
			borderWidth: 0
		}],
		labels: ['Active Users', 'Subscribers' , 'New Visitors'] 
	},
	options : {
		responsive: true, 
		maintainAspectRatio: false,
		legend: {
			position : 'bottom',
			labels : {
				fontColor: 'rgb(154, 154, 154)',
				fontSize: 11,
				usePointStyle : true,
				padding: 20
			}
		},
		pieceLabel: {
			render: 'percentage',
			fontColor: 'white',
			fontSize: 14,
		},
		tooltips: false,
		layout: {
			padding: {
				left: 20,
				right: 20,
				top: 20,
				bottom: 20
			}
		}
	}
});