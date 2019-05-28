<?php
	// ==================================
	// = Обработчик живой строки поиска =
	// ==================================

	// Запрос на данные базы
	$conn = mysqli_connect("localhost", "login", "password")
		or die("Нет соединения: " . mysqli_error());
	mysqli_select_db($conn ,"data-base");

	// Если есть ошибка, то выводим, иначе работаем дальше
	if ($mysqli->connect_error)	return die('Ошибка : ('. $mysqli->connect_errno .')'. $mysqli->connect_error);
	else{
		// Получаем текст поиска через POST и данные из базы
		$text = $_POST["text"];
		$sql = "SELECT * FROM `hotel`";
		$arr = mysqli_query($conn, $sql);

		for ($i=0 ; $result = mysqli_fetch_array($arr, MYSQLI_ASSOC); $i++)
			$region[$i] = $result;

		// Проходим по всему массиву данных (установив флаг)
		$flag = false;
		for ($i = 0; $i < count($region); $i++) {
			// Если совпадение найдено - то запоминаем, прекращаем выполнение
			if(mb_strpos($region[$i]['regionname'], $text) && $flag==false)
				$flag = $region[$i]['regionname'];
		}
		// Выводим совпадение
		echo $flag;
	}
	
