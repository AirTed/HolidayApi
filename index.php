<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
substr($url, -1, 1) != '/' and $url = dirname($url) . '/';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="zh-cn">
	<head>
		<title>
			节假日api
		</title>
		<meta name="author" content="zsdroid">
		<style type="text/css">
			html, body {
				height: 100%;
			}
			
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				display: table;
				font-weight: 100;
				font-family: 'Lato', sans-serif;
			}
			
			.container {
				margin: 0 auto;
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}
			
			a {
				text-decoration: none;
			}
		</style>
		<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top: 50px;">
			<h3>
				节假日api( <a target="_blank" href="https://github.com/zhusaidong/HolidayApi"> fork on github </a>)
			</h3>
			<h5>
				判断某个时间是否是节假日
			</h5>
			<div style="margin:0 auto;width: 500px;text-align: left;">
				<fieldset>
					<legend>
						注:
					</legend>
					<pre>
	1.节假日当天前后几天能放假的都算节假日
		如:10.1国庆节,但是放假7天,所以10.1-10.7都算节假日
	2.有些节日不放假,算工作日
		如:2.2世界湿地日,但是不放假,所以算工作日
	3.api中所指的双休日即周六周日,工作日即周一至周五,节假日即法定节假日.
</pre>
				</fieldset>
			</div>
			<br />
			<div>
				接口地址:
				<?php echo $url; ?>api.php?date= <font color="red"> 日期 </font> <br /><br /> demo1:
				<a target="_blank" href="<?php echo $url; ?>api.php?date=<?php echo date('Y-m-d'); ?>">
					<?php echo $url; ?>api.php?date=<?php echo date('Y-m-d'); ?>
				</a> <br /> demo2: 选择日期:<input type="date" class="HolidayApi-DEMO" /> <br />
				<span class="HolidayApi-DEMO-info">
				</span>
			</div>
		</div>
	</body>
	<script>
		$('.HolidayApi-DEMO').change(function ()
		{
			console.log($(this).val());
			$.ajax(
				{
					url: 'api.php' ,
					data:
						{
							date: $(this).val()
						} ,
					success: function (data)
					{
						data = eval(data);
						let text = '你选的日期是：' + data[0].date + ',' + data[0].info + '(' + data[0].name + ')';
						$('.HolidayApi-DEMO-info').text(text);
					}
				});
		});
	</script>
</html>
