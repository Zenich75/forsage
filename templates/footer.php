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

<script>

    function defer(method) {
        if (window.jQuery) {
            method();
        } else {
            setTimeout(function() { defer(method) }, 50);
        }
    }

    defer(function(){
		$("#showModalPhones").click(function(){
			$('#modalPhones').show();
		});

        $("#closePhones").click(function(){
            $('#modalPhones').hide();
        });
	});

</script>