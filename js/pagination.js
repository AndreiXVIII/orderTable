$(document).ready(function(){

    function getPagination(countData) {
        var page = 5;
        var pages = Math.ceil(countData / page);
        var active = "";
        var countRecords = 5;

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
            var numberRecords = curentPage * countRecords - (page - 1);
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
                        var currentReports = newButton * countRecords - (page - 1);
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
                    if(newButton == index + 1){
                        $('.pagination').children().removeClass('active');
                        $(this).attr("class", 'page-item active button'	);

                        $('#orderReports').children().hide();
                        var currentReports = newButton * countRecords - (page - 1);
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
        formdata.course = $('#currentCourse').val();
        $.ajax({
            type: "POST",
            url: "php/datashow.php",
            dataType:'json',
            data: formdata,
            success: function (data) {

                var sum = 0;
                var dollar = formdata.course;
                var tempCount = 0;
                $('#orderReports').empty();
                for (let key in data) {
                    if (tempCount < 5) {
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
                tempCount = 0;

                $('.table:last').remove();

                $('#numberOfOrders').html(data.count);
                $('#amountOfOrders').html(sum);
                $('#amountDollar').html(($('#amountOfOrders').html() / dollar).toFixed(2));

                getPagination(data.count);
            }
        });
    });
});