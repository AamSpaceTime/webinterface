<?
//Класс генерации изображения сниппета                                                l

class MakeSnippetImg {
	//Свойства (поля) класса
	private $_prop = Array (
		"source_img_path" => "", //Путь к изображению, исходному для создания сниппета

		"result_img" => Array (
			"path" => "", //Путь по которому записывается результирующее изображение
			"name" => "", //Имя файла с которым записывается результирующее изображение
			"width" => "", //Ширина результирующего изображения (px). Используется для масштабирования исходного по ширине
			"height" => "", //Высота результирующего изображения (px). Используется для окропа (по центру) отмасштабированного изображения
			"over_path" => "", //Путь к полупрозрачному фону, накладываемому поверх

			"logo" => Array (
				"path" => "", //Путь к изображению логотипа
				"top" => "", //Отступ размещения логотипа от верхнего края (px)
				"left" => "", //Отступ размещения логотипа от левого края (px)
			),

			"title" => Array (
				"text" => "", //Текст, надписываемый поверх картинки
				"top" => "", //Отступ в размещении текста сверху (px)
				"left" => "", //Отступ в размещении текста слева (px)
				"font" => Array (
					"path" => "", //Путь к файлу шрифта
					"color" => "", //Цвет шрифта
					"size_default" => "", //Размер шрифта по умолчанию (px)
					"size_big" => "", //Размер большого шрифта (px)
					"count_size_big" => "" //Количество символов до которого шрифт пишется размером font_size_big
				)
			)
		),

		//Зависимости
		"dependences" => Array (
			"set_text" => "" //Объект, выполняющий размещение текста на результирующем изображении сниппета
		)
	);


	function __construct($params) {
		$this->setProp($params);
	}

	function getProp() {
		return $this->_prop;
	}

	function setProp($params) {

		//Проверяем входные данные
		try {
			if( $params["source_img_path"] == "" || !is_file($params["source_img_path"]) ) {
				throw new Exception("Исходный путь к изображению пустой или не файл");
			}

			$params["result_img_path_name"] = $params["result_img"]["path"].$params["result_img"]["name"];

			$this->_prop = $params;

		} catch (Exception $e) {
			echo "Ошибка входных данных: ".$e->getMessage()."\n";
		}
	}


	//Метод создает изображение сниппета
	public function make() {
	try {

		$p = $this->_prop; //Создаем переменную с коротким именем, ссылающуюся на переемнную со свойствами класса

		//Создаем объект исходного изображения
		$i_source = "";
		$i_type = pathinfo($p["source_img_path"]);
		$i_type = $i_type['extension'];

		//Проверяем расширение исх. изображения
		switch ($i_type) {
			case "gif":
				//IMAGETYPE_GIF
				$i_source = imagecreatefromgif($p["source_img_path"]);
			break;
			case "jpg":
				//IMAGETYPE_JPEG
				$i_source = imagecreatefromjpeg($p["source_img_path"]);
			break;
			case "png":
				//IMAGETYPE_PNG
				$i_source = imagecreatefrompng($p["source_img_path"]);
			break;
			default:
			break;
		}

		if( $i_source != "" ) {

			//Создаем объект нового изображения $i_snip
			$i_snip = imagecreatetruecolor($p["result_img"]["width"], $p["result_img"]["height"]);
			//Копируем в $i_snip прямоугольную часть из исх. изображения одновремнно уменьшая ее, для чего сначала вычисляем пропорции конечного изображения
			list($is_width, $is_height) = getimagesize($p["source_img_path"]);
			$temp = $p["result_img"]["width"]/$p["result_img"]["height"];

			//Уменьшаем по ширине до заданного значения
			//Вырезаем из центра прямоугольник заданной высоты
			imagecopyresampled($i_snip, $i_source, 0, 0, 0, ($is_height-$is_width/$temp)/2, $p["result_img"]["width"], $p["result_img"]["height"], $is_width, $is_width/$temp);

			//Затемняем
			//imagefilter($i_snip, IMG_FILTER_CONTRAST, 50);
			//imagefilter($i_snip, IMG_FILTER_BRIGHTNESS, -70);
			$i_source = imagecreatefrompng($p["result_img"]["over_path"]);
			imagecopyresampled($i_snip, $i_source, 0, 0, 0, 0, $p["result_img"]["width"], $p["result_img"]["height"], $p["result_img"]["width"], $p["result_img"]["height"]);

			//Накладываем поверх логотип
			$i_source = imagecreatefrompng($p["result_img"]["logo"]["path"]);
			list($is_width, $is_height) = getimagesize($p["result_img"]["logo"]["path"]);
			imagecopyresampled($i_snip, $i_source, $p["result_img"]["logo"]["left"], $p["result_img"]["logo"]["top"], 0, 0, $is_width, $is_height, $is_width, $is_height);

			//Сохраняем результат
			preg_match("/^.+\.([^\.]+)$/", $p["result_img_path_name"], $temp);
			echo $temp[1]."!";
			switch ($temp[1]) {
				case "gif":
					imagegif($i_snip, $p["result_img_path_name"]);
				break;
				case "jpg":
					imagejpeg($i_snip, $p["result_img_path_name"], 100);
				break;
				case "png":
					imagepng($i_snip, $p["result_img_path_name"], 0);
				break;
				default:
				break;
			}
			//imagepng($i_snip, $p["result_img_path_name"], 100);

			if( !file_exists($p["result_img_path_name"])) {
				throw new Exception("Не удалось сохранить файл: ".$p["result_img_path_name"]);
			}

			//Накладываем поверх текст
			$p["temp"]["font_size"] = $p["result_img"]["title"]["font"]["size_default"];
			if( strlen($p["result_img"]["title"]["text"]) < $p["result_img"]["title"]["font"]["count_size_big"] ) {
				$p["temp"]["font_size"] = $p["result_img"]["title"]["font"]["size_big"];
			}
			//echo $p["result_img"]["width"]-3*$p["result_img"]["title"]["left"];

            $ttfImg = $p["dependences"]["set_text"];
            $ttfImg->setProp($p["result_img_path_name"]);
			$ttfImg->setFont($p["result_img"]["title"]["font"]["path"], $p["temp"]["font_size"], $p["result_img"]["title"]["font"]["color"]);
			//Расчет позиции текста сверху
			$temp = strlen($p["result_img"]["title"]["text"]);
			list($is_width, $is_height) = getimagesize($p["result_img"]["logo"]["path"]);
			$top = $p["result_img"]["height"]-3*$p["result_img"]["logo"]["top"]-$is_height;
			//echo $temp." > ".$top." ".$p["result_img"]["logo"]["top"]." ".$is_height." ";
			$top = $top/2+2*$p["result_img"]["logo"]["top"]+$is_height;

			if( $temp < 20 ) {
				$top = $top-80;
			}
			if( $temp >= 20 && $temp < 40 ) {
				$top = $top-55;
			}
			if( $temp >= 40 && $temp < 60 ) {
				$top = $top-70;
			}
			if( $temp >= 60 && $temp < 90 ) {
				$top = $top-50;
			}
			if( $temp >= 90 && $temp < 120 ) {
				$top = $top-65;
			}
			if( $temp >= 120 && $temp < 150 ) {
				$top = $top-75;
			}
			if( $temp >= 150  ) {
				$top = $top-115;
			}
			//echo $top;

            $ttfImg->writeText($p["result_img"]["title"]["left"], $top, $ttfImg->textFormat($p["result_img"]["width"]-2*$p["result_img"]["title"]["left"], 230, iconv("CP1251", "UTF-8", $p["result_img"]["title"]["text"])));

            $ttfImg->output($p["result_img_path_name"]);

		} else {
			throw new Exception("Файл исходного изображения может иметь тип: jpg, gif, png");
		}

	} catch (Exception $e) {
		echo "Ошибка обработки в make: \"".$e->getMessage()."\"\n";
	}
	}

}