<?php
$condizioni = array(
"0"=>  "wi-tornado",
"1"=>  "wi-tsunami",
"2"=>  "wi-hurricane",
"3"=>  "wi-thunderstorm",
"4"=>  "wi-storm-showers",
"5"=>  "wi-rain-mix",
"6"=>  "wi-sleet",
"7"=>  "wi-sleet",
"8"=>  "wi-raindrops",
"9"=>  "wi-raindrops",
"10"=> "wi-rain",
"11"=> "wi-showers",
"12"=> "wi-showers",
"13"=> "wi-snow-wind",
"14"=> "wi-snowflake-cold",
"15"=> "wi-snow-wind",
"16"=> "wi-snow",
"17"=> "wi-hail",
"18"=> "wi-sleet",
"19"=> "wi-dust",
"20"=> "wi-day-fog",
"21"=> "wi-day-fog",
"22"=> "wi-day-fog",
"23"=> "wi-strong-wind",
"24"=> "wi-windy",
"25"=> "wi-snowflake-cold",
"26"=> "wi-cloudy",
"27"=> "wi-night-alt-cloudy",
"28"=> "wi-day-cloudy",
"29"=> "wi-night-alt-partly-cloudy",
"30"=> "wi-night-partly-cloudy",
"31"=> "wi-night-clear",
"32"=> "wi-day-sunny",
"33"=> "wi-stars",
"34"=> "wi-day-sunny",
"35"=> "wi-hail",
"36"=> "wi-hot",
"37"=> "wi-storm-showers",
"38"=> "wi-thunderstorm",
"39"=> "wi-thunderstorm",
"40"=> "wi-showers",
"41"=> "wi-snow-wind",
"42"=> "wi-snow",
"43"=> "wi-snow-wind",
"44"=> "wi-cloud",
"45"=> "wi-storm-showers",
"46"=> "wi-sleet",
"47"=> "wi-lightning",
"3200"=>  "wi-na"
);

$BASE_URL = "http://query.yahooapis.com/v1/public/yql";

$yql_query = 'select * from weather.forecast where woeid = "716739" and u="c"'; // cod. woeid 716739 rappresenta la citta di ivrea
$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$phpObj =  json_decode($json);
?>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
@import url(http://cdnjs.cloudflare.com/ajax/libs/weather-icons/1.2/css/weather-icons.min.css);
.weatherCard{
	width: 400px;
	height: 200px;
	font-family: 'Open Sans';
	position: relative;
}
.currentTemp{
	width: 55%;
	height: 100%;
	background: rgb(41, 41, 41);
	position: absolute;
	top: 0;
	left: 0;
}
.currentWeather{
	width: 45%;
	height: 100%;
	background: rgb(237, 237, 237);
	margin: 0;
	position: absolute;
	top: 0;
	right: 0;
}
.temp{
	font-size: 80px;
	text-align: center;
	display: block;
	font-weight: 300;
	color: rgb(255, 255, 255);
	padding: 20px 0 0;
}
.location{
	color: rgb(255, 255, 255);
	text-align: center;
	text-transform: uppercase;
	font-weight: 700;
	font-size: 30px;
	display: block;
}
.conditions{
	font-family: weathericons;
	font-size: 80px;
	display: block;
	padding: 20% 0 0;
	text-align: center;
}
.info{
	width: 180px;
	height: 50px;
	position: absolute;
	bottom: 0;
	right: 0;
	background: rgb(42, 178, 234);
	font-weight: 700;
	color: rgb(255, 255, 255);
	text-align: center;
}
.rain {
	width: 50%;
	position: absolute;
	left: 10px;
	word-spacing: 60px;
	top: 3px;
}
.rain::before{
	display: block;
	content: '\f04e';
	font-family: weathericons;
	font-size: 40px;
	left: 6px;
	top: -4px;
	position: absolute;
}
.wind {
	width: 50%;
	right: -10px;
	position: absolute;
	word-spacing: 60px;
	top: 3px;
}
.wind::before{
	display: block;
	content: '\f050';
	font-family: weathericons;
	font-size: 25px;
	left: -10px;
	position: absolute;
	top: 5px;
}
.griglia_giorni {
	background: rgb(237, 237, 237);
	font-weight: 700;
	color: rgb(41, 41, 41);
	text-align: center;
	width: 400px;
	height: 75px;
	font-family: 'Open Sans';
	position: absolute;
}
.giorno1 {
	width: 25%;
	position: absolute;
	word-spacing: 160px;
	top: 25px;
}
.giorno1::before{
	display: block;
	font-size: 40px;
	left: 6px;
	top: 15%;
	position: absolute;
}
.giorno2 {
	width: 25%;
	position: absolute;
	word-spacing: 160px;
	top: 25px;
	left: 25%;
}
.giorno2::before{
	display: block;
	font-size: 40px;
	left: 6px;
	top: 15%;
	position: absolute;
}
.giorno3 {
	width: 25%;
	position: absolute;
	word-spacing: 160px;
	top: 25px;
	left: 50%;
}
.giorno3::before{
	display: block;
	font-size: 40px;
	left: 6px;
	top: 15%;
	position: absolute;
}
.giorno4 {
	width: 25%;
	position: absolute;
	word-spacing: 160px;
	top: 25px;
	left: 75%;
}
.giorno4::before{
	display: block;
	font-size: 40px;
	left: 6px;
	top: 15%;
	position: absolute;
}
</style>

<div id="weather_wrapper">
	<div class="weatherCard">
		<div class="currentTemp">
			<span class="temp"><?php echo $phpObj->query->results->channel->item->condition->temp; ?>&deg;</span>
			<span class="location">Ivrea</span>
		</div>
		<div class="currentWeather">
			<span class="conditions"><i class="wi <?php echo $condizioni[$phpObj->query->results->channel->item->condition->code]; ?>"></i></span>
			<div class="info">
				<span class="rain"><?php echo $phpObj->query->results->channel->atmosphere->humidity; ?> %</span>
				<span class="wind"><?php echo $phpObj->query->results->channel->wind->speed; ?> KM/H</span>
			</div>
		</div>
	</div>
	<div class="griglia_giorni">
		<div class="giorno1"><?php echo date("j", mktime(0,0,0,date("n"),date("j")+1)).'/'.date("n", mktime(0,0,0,date("n"),date("j")+1)); ?> <i class="wi <?php echo $condizioni[$phpObj->query->results->channel->item->forecast[1]->code]; ?>"></i></div>
		<div class="giorno2"><?php echo date("j", mktime(0,0,0,date("n"),date("j")+2)).'/'.date("n", mktime(0,0,0,date("n"),date("j")+2)); ?> <i class="wi <?php echo $condizioni[$phpObj->query->results->channel->item->forecast[2]->code]; ?>"></i></div>
		<div class="giorno3"><?php echo date("j", mktime(0,0,0,date("n"),date("j")+3)).'/'.date("n", mktime(0,0,0,date("n"),date("j")+3)); ?> <i class="wi <?php echo $condizioni[$phpObj->query->results->channel->item->forecast[3]->code]; ?>"></i></div>
		<div class="giorno4"><?php echo date("j", mktime(0,0,0,date("n"),date("j")+4)).'/'.date("n", mktime(0,0,0,date("n"),date("j")+4)); ?> <i class="wi <?php echo $condizioni[$phpObj->query->results->channel->item->forecast[4]->code]; ?>"></i></div>
	</div>
</div>
