<div id="footer">
	<div class="footerMenuBlock">
		<div class="footerLogo">
			<div class="footerSchoolLogo">
				<img src="images/logo.png" alt="">
			</div>
			<div class="footerSchoolName">Льотна школа "Форсаж"</div>
		</div>
		<div class="footerMenu">
			<div class="footerMenuItem"><a href="index.php#top">Головна</a></div>
			<div class="footerMenuItem"><a href="index.php#programm">Програма навчання</a></div>
			<div class="footerMenuItem"><a href="index.php#fleet">Повітряний флот</a></div>
			<div class="footerMenuItem"><a href="index.php#about">Про нас</a></div>
		</div>
	</div>
</div>

<div class="modal" id="modalPhones">
	<div class="modal-form">
		<div class="modal-title">Наші контакти</div>
		<div class="modal-content">моб.: +380508321003<br>моб.: +380505443574<br>e-mail: ostapenko2002@yahoo.com</div>
		<div class="modal-button" id="closePhones">Закрити</div>
	</div>
</div>

<div class="modal" id="modalCallback">
	<div class="modal-form">
		<div class="modal-title">Зворотній зв'язок</div>
		<div class="modal-content">
			<label for="name">Ім'я</label>
			<input type="text" name="name" id="name"><br>
			<label for="phone">Номер телефону</label>
			<input type="text" name="phone" id="phone">
		</div>
		<div class="modal-button" id="sendCallback">Надіслати</div>
		<div class="modal-button" id="closeCallback">Зачинити</div>
	</div>
</div>

<script>

    function defer(method) {
        if (window.jQuery) {
            method();
        } else {
            setTimeout(function() { defer(method) }, 50);
        }
    }

    function checkTextField (obj) {
        if($(obj).val().trim() == '') {
            $(obj).addClass('error').val('Заповніть поле');
            return false;
		} else {
            $(obj).removeClass('error');
            return true;
		}
	}

    defer(function(){
		$("#showModalPhones").click(function(){
		    console.log(1111);
			$('#modalPhones').show();
		});

        $("#closePhones").click(function(){
            $('#modalPhones').hide();
        });

        $("#closeCallback").click(function(){
            $('#modalCallback').hide();
        });

        $("#callback, #callbackMobile").click(function(){
            $('#modalCallback').show();
        });

        $('#name').focus(function(){
            $(this).removeClass('error').val('');
		});

        $('#phone').focus(function(){
            $(this).removeClass('error').val('');
        });

        $('#sendCallback').click(function(){
            if(checkTextField($('#name')) && checkTextField($('#phone'))){
                var data = {
                    'callback': {
                        'name': $('#name').val(),
                        'phone': $('#phone').val()
					}
				}

                $('#name').val('')
				$('#phone').val(''),

                $.ajax({
                    type: 'POST',
                    url: '/sendcallbackrequest.php',
					data: data,
                    success: function(data, textStatus, jqXHR) {
                        if(data.result == 'error') {
                            $('#modalCallback').hide();
                            alert('Помилка при відправці повідомлення');
                            return false;
                        } else {
                            $('#modalCallback').hide();
                            alert('Замовлення на зворотній зв\'язок відправлено');
                            return true;
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) { $.alert(jqXHR.responseText); }
                });
			}
		});
        //$("#phone").mask("+380 (99) 999-99-99");



	});

</script>