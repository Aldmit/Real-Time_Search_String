<section id="search_form" class="box-grade">
	<form id="search-form">
    <div class="search_box ">
      <label class="_col label_search_form" for="country-out">Город вылет</label>
      <input class="_col col-search country-out" name="country-out" type="text" id="country-out" placeholder="Город вылета">
    </div>
  </form>
</section>

<script>
	// =======================
	// = Живая строка поиска =
	// =======================

	// Обновление при изменении input
	$('#country-out').on('input', function(e){
		// Получаем текст
		var text = $('#country-out').val();
		// И отсылаем его в обработчик
		$.ajax({
			method: "POST",
			url: "../search_handler.php",
			data: {	"text" : text	},
			success: function(data){
				// Получаемый ответ записываем в label
				if(data)	$('label[for="country-out"]').text(data);
				// Если ответа нет - Нет совпадений по поиску
				else{	$('label[for="country-out"]').text("Нет совпадений");}
			}
		});
	}); 
	
	// При клике на label вписывать значение в input
	$('label[for="country-out"]').click(function(){
		$('#country-out').val($('label[for="country-out"]').text());
	});

</script>