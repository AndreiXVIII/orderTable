<head>
	<meta charset="utf-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?php
	
        require_once("app/Course.php");
        $currentCourse = new Course();
	
	?>
<div class="container">
	<a href="index.php" class="text-primary"> Создать заказ </a><span> | Отчеты о заказах</span>
	<hr>
	<h1> Отчет о заказах </h1>
	<form>
		<div class="form-row">
			<div class="form-group col-md-2">
				<label for="order"> № заказа </label>
                <input type="hidden" class="form-control" id="currentCourse" value="<?php echo $currentCourse->getCourse(); ?>">
				<input type="text" class="form-control" id="orderNumber">
			</div>
			<div class="form-group col-md-2">
				<label for="city"> Город </label>
				<input type="text" class="form-control" id="orderCity">
			</div>
			<div class="form-group col-md-4">
				<label for="orderPrice"> Сумма заказа </label>
				<select class="form-control" id="orderPrice">
					<option value="100"> До 100 гривен </option>
					<option value="500"> До 500 гривен </option>
					<option value="1000"> До 1000 гривен </option>
					<option value="5000"> До 5000 гривен </option>
					<option value="10000"> До 10 000 гривен</option>
				</select>
			</div>
		</div>
		<button type="submit" class="btn btn-primary col-md-2" id="find"> Найти </button>
	</form>
	<br>
	<h1> Найдено <span id="numberOfOrders"></span> заказов </h1>
	<p> на сумму <span id="amountOfOrders"></span> гривен или $<span id="amountDollar"></span> </p>
	<hr>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr class="active">
					<th> № заказа </th>
					<th> Имя </th>
					<th> Фамилия </th>
					<th> Телефон </th>
					<th> Эл.почта </th>
					<th> Город </th>
					<th> Сумма </th>
				</tr>
			</thead>
			<tbody id="orderReports">			
			</tbody>
		</table>
		<nav aria-label="Отчеты">
			<ul class="pagination">
			
			</ul>
		</nav>	
	
</div>

<script type="text/javascript" src="js/pagination.js">

	/*$(document).ready(function(){

		function getPagination(countData) {
			var page = 2;
			var pages = Math.ceil(countData / page);
			var active = "";
            var countRecords = 2;

			$('.pagination').empty();

			$('.pagination').append("<li id=\"prev\" class=\"page-item\"><a href=\"#\" aria-label=\"Предыдущая\" class=\"page-link\"><span aria-hidden=\"true\"> &laquo; </span></a></li>");
			for (let i = 1; i <= pages; i++) {
				if (i == 1) {
					active = "active button";
				}
				else {
					active = " button";
				}
				$('.pagination').append("<li id=" + i + " class=\"page-item " + active + "\"><a href=\"#\" aria-label=\""+ i +"\" class=\"page-link\"><span aria-hidden=\"true\">" + i + "</span></a></li>");
			}
			$('.pagination').append("<li id=\"next\" class=\"page-item\"><a href=\"#\" aria-label=\"Следующая\" class=\"page-link\"><span aria-hidden=\"true\"> &raquo; </span></a></li>");




			$('.button').on("click",function(event) {
				event.preventDefault();
				var curentPage = $(this).attr('id');
				$('#orderReports').children().hide();
				$('.pagination').children().removeClass('active');
				$(this).attr('class', 'page-item active button');
				var numberRecords = curentPage * countRecords - 1;
				for (let i = 1; i <= countRecords; i++) {
					$("#"+ numberRecords + "").show();
					numberRecords++;
				}
			});

			$('#prev').on('click', function(event) {
				var classReg = /active/;
				var className = "";
				var elemId = "";
				var newButton = "";
				event.preventDefault();
				$('.button').each(function(index) {
					className = $(this).attr('class');
					if (classReg.test(className)) {
						elemId = $(this).attr('id');
					}
				});

				if(elemId >= 1){
					newButton = elemId - 1;

					$('.button').each(function(index) {
						if(newButton == index + 1){
                            $('.pagination').children().removeClass('active');
							$(this).attr("class", 'page-item active button'	);

                            $('#orderReports').children().hide();
							var currentReports = newButton * countRecords - 1;
							for (let i = 1; i <= countRecords; i++) {
							    $('#' + currentReports + '').show();
							    currentReports++;
                            }
						}

					});
				}
			});

			$('#next').on('click', function (event) {
               var classReg = /active/;
               var className = "";
               var elemId = "";
               var newButton = "";
               var lastButton = "";
               event.preventDefault();
               $('.button').each(function (index) {
                   className = $(this).attr('class');
                   if (classReg.test(className)) {
                       elemId = $(this).attr('id');
                   }
                   lastButton = $(this).attr('id');
               });

                if (elemId <= lastButton) {
                    newButton = +elemId + 1;

                    $('.button').each(function(index) {
                        if(newButton == index+1){
                            $('.pagination').children().removeClass('active');
                            $(this).attr("class", 'page-item active button'	);

                            $('#orderReports').children().hide();
                            var currentReports = newButton * countRecords - 1;
                            for (let i = 1; i <= countRecords; i++) {
                                $('#' + currentReports + '').show();
                                currentReports++;
                            }
                        }
                    });
                }

            });


		}
		$("#find").on("click",function (e) {
			e.preventDefault();
			var find = $("#find");

			var formdata = new Object();
			formdata.id = $('#orderNumber').val();
			formdata.city = $('#orderCity').val();
			formdata.sum = $('#orderPrice').val();

			$.ajax({
				type: "POST",
				url: "php/datashow.php",
				dataType:'json',
				data: formdata,
				success: function (data) {
					var sum = 0;
					var dollar = 32;
					var tempCount = 0;
					$('#orderReports').empty();
					for (let key in data) {
						if (tempCount < 2) {
							tempCount++;
							$('#orderReports').append('<tr class="table" id="'+ tempCount +'"><td>' + data[key].id + '</td><td>' + data[key].name + '</td><td>' + data[key].surname + '</td><td>' + data[key].phone + '</td><td>' + data[key].email + '</td><td>' + data[key].city + '</td><td>' + data[key].sum + '</td><tr>');
						}else {
							tempCount++;
							$('#orderReports').append('<tr class="table" id="'+ tempCount +'"><td>' + data[key].id + '</td><td>' + data[key].name + '</td><td>' + data[key].surname + '</td><td>' + data[key].phone + '</td><td>' + data[key].email + '</td><td>' + data[key].city + '</td><td>' + data[key].sum + '</td><tr>');
							$('#'+tempCount+'').hide();
						}

						if (data[key].sum != undefined) {
							sum += +data[key].sum;
						}
					}
					tempCount = 0

					$('.table:last').remove();

					$('#numberOfOrders').html(data.count);
					$('#amountOfOrders').html(sum);
					$('#amountDollar').html(($('#amountOfOrders').html() / dollar).toFixed(2));

					getPagination(data.count);
				}
			});
		});
	});*/

</script>
</body>