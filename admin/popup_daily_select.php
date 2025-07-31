<?php
date_default_timezone_set('Asia/Manila');
list($dropday, $dropmonthname, $dropmonthnumber, $dropyear) = explode( ' ', date('j F n Y') );
?>

<br><br>
<center>
	<h3><strong>Daily Reports</strong></h3><br><br>
	<div class="big"><strong>Please Select a Date</strong></div><br><br>
<form action="admin_reports_daily.php" method="POST">

<table width="90%">
	<tr>
	<td>
<select name="date_daily_mm" class="form-control">
	<option value='01'   <?php if($dropmonthname=='January')   { echo('selected="selected"'); } ?> >January</option>
	<option value='02'   <?php if($dropmonthname=='February')   { echo('selected="selected"'); } ?> >February</option>
	<option value='03'   <?php if($dropmonthname=='March')   { echo('selected="selected"'); } ?> >March</option>
	<option value='04'   <?php if($dropmonthname=='April')   { echo('selected="selected"'); } ?> >April</option>
	<option value='05'   <?php if($dropmonthname=='May')   { echo('selected="selected"'); } ?> >May</option>
	<option value='06'   <?php if($dropmonthname=='June')   { echo('selected="selected"'); } ?> >June</option>
	<option value='07'   <?php if($dropmonthname=='July')   { echo('selected="selected"'); } ?> >July</option>
	<option value='08'   <?php if($dropmonthname=='August')   { echo('selected="selected"'); } ?> >August</option>
	<option value='09'   <?php if($dropmonthname=='September')   { echo('selected="selected"'); } ?> >September</option>
	<option value='10'   <?php if($dropmonthname=='October')   { echo('selected="selected"'); } ?> >October</option>
	<option value='11'   <?php if($dropmonthname=='November')   { echo('selected="selected"'); } ?> >November</option>
	<option value='12'   <?php if($dropmonthname=='December')   { echo('selected="selected"'); } ?> >December</option>
</select>
	</td>

	<td>
<select name="date_daily_dd" class="form-control">
	<option value='01'  <?php if($dropday==1)  { echo('selected="selected"'); } ?> >1</option>
	<option value='02'  <?php if($dropday==2)  { echo('selected="selected"'); } ?> >2</option>
	<option value='03'  <?php if($dropday==3)  { echo('selected="selected"'); } ?> >3</option>
	<option value='04'  <?php if($dropday==4)  { echo('selected="selected"'); } ?> >4</option>
	<option value='05'  <?php if($dropday==5)  { echo('selected="selected"'); } ?> >5</option>
	<option value='06'  <?php if($dropday==6)  { echo('selected="selected"'); } ?> >6</option>
	<option value='07'  <?php if($dropday==7)  { echo('selected="selected"'); } ?> >7</option>
	<option value='08'  <?php if($dropday==8)  { echo('selected="selected"'); } ?> >8</option>
	<option value='09'  <?php if($dropday==9)  { echo('selected="selected"'); } ?> >9</option>
	<option value='10'  <?php if($dropday==10)  { echo('selected="selected"'); } ?> >10</option>
	<option value='11'  <?php if($dropday==11)  { echo('selected="selected"'); } ?> >11</option>
	<option value='12'  <?php if($dropday==12)  { echo('selected="selected"'); } ?> >12</option>
	<option value='13'  <?php if($dropday==13)  { echo('selected="selected"'); } ?> >13</option>
	<option value='14'  <?php if($dropday==14)  { echo('selected="selected"'); } ?> >14</option>
	<option value='15'  <?php if($dropday==15)  { echo('selected="selected"'); } ?> >15</option>
	<option value='16'  <?php if($dropday==16)  { echo('selected="selected"'); } ?> >16</option>
	<option value='17'  <?php if($dropday==17)  { echo('selected="selected"'); } ?> >17</option>
	<option value='18'  <?php if($dropday==18)  { echo('selected="selected"'); } ?> >18</option>
	<option value='19'  <?php if($dropday==19)  { echo('selected="selected"'); } ?> >19</option>
	<option value='20'  <?php if($dropday==20)  { echo('selected="selected"'); } ?> >20</option>
	<option value='21'  <?php if($dropday==21)  { echo('selected="selected"'); } ?> >21</option>
	<option value='22'  <?php if($dropday==22)  { echo('selected="selected"'); } ?> >22</option>
	<option value='23'  <?php if($dropday==23)  { echo('selected="selected"'); } ?> >23</option>
	<option value='24'  <?php if($dropday==24)  { echo('selected="selected"'); } ?> >24</option>
	<option value='25'  <?php if($dropday==25)  { echo('selected="selected"'); } ?> >25</option>
	<option value='26'  <?php if($dropday==26)  { echo('selected="selected"'); } ?> >26</option>
	<option value='27'  <?php if($dropday==27)  { echo('selected="selected"'); } ?> >27</option>
	<option value='28'  <?php if($dropday==28)  { echo('selected="selected"'); } ?> >28</option>
	<option value='29'  <?php if($dropday==29)  { echo('selected="selected"'); } ?> >29</option>
	<option value='30'  <?php if($dropday==30)  { echo('selected="selected"'); } ?> >30</option>
	<option value='31'  <?php if($dropday==31)  { echo('selected="selected"'); } ?> >31</option>
</select>
	</td>

	<td>
<select name="date_daily_yy" class="form-control">
	<option value='2014' <?php if($dropyear==2014) { echo('selected="selected"'); } ?> >2014</option>
	<option value='2015' <?php if($dropyear==2015) { echo('selected="selected"'); } ?> >2015</option>
	<option value='2016' <?php if($dropyear==2016) { echo('selected="selected"'); } ?> >2016</option>
	<option value='2017' <?php if($dropyear==2017) { echo('selected="selected"'); } ?> >2017</option>
	<option value='2018' <?php if($dropyear==2018) { echo('selected="selected"'); } ?> >2018</option>
	<option value='2019' <?php if($dropyear==2019) { echo('selected="selected"'); } ?> >2019</option>
	<option value='2020' <?php if($dropyear==2020) { echo('selected="selected"'); } ?> >2020</option>
	<option value='2021' <?php if($dropyear==2021) { echo('selected="selected"'); } ?> >2021</option>
	<option value='2022' <?php if($dropyear==2022) { echo('selected="selected"'); } ?> >2022</option>
	<option value='2023' <?php if($dropyear==2023) { echo('selected="selected"'); } ?> >2023</option>
	<option value='2024' <?php if($dropyear==2024) { echo('selected="selected"'); } ?> >2024</option>
	<option value='2025' <?php if($dropyear==2025) { echo('selected="selected"'); } ?> >2025</option>
	<option value='2026' <?php if($dropyear==2026) { echo('selected="selected"'); } ?> >2026</option>
	<option value='2027' <?php if($dropyear==2027) { echo('selected="selected"'); } ?> >2027</option>
	<option value='2028' <?php if($dropyear==2028) { echo('selected="selected"'); } ?> >2028</option>
	<option value='2029' <?php if($dropyear==2029) { echo('selected="selected"'); } ?> >2029</option>
	<option value='2030' <?php if($dropyear==2030) { echo('selected="selected"'); } ?> >2030</option>
	<option value='2031' <?php if($dropyear==2031) { echo('selected="selected"'); } ?> >2031</option>
	<option value='2032' <?php if($dropyear==2032) { echo('selected="selected"'); } ?> >2032</option>
	<option value='2033' <?php if($dropyear==2033) { echo('selected="selected"'); } ?> >2033</option>
	<option value='2034' <?php if($dropyear==2034) { echo('selected="selected"'); } ?> >2034</option>
	<option value='2035' <?php if($dropyear==2035) { echo('selected="selected"'); } ?> >2035</option>
	<option value='2036' <?php if($dropyear==2036) { echo('selected="selected"'); } ?> >2036</option>
	<option value='2037' <?php if($dropyear==2037) { echo('selected="selected"'); } ?> >2037</option>
	<option value='2038' <?php if($dropyear==2038) { echo('selected="selected"'); } ?> >2038</option>
	<option value='2039' <?php if($dropyear==2039) { echo('selected="selected"'); } ?> >2039</option>
	<option value='2040' <?php if($dropyear==2040) { echo('selected="selected"'); } ?> >2040</option>
	<option value='2041' <?php if($dropyear==2041) { echo('selected="selected"'); } ?> >2041</option>
	<option value='2042' <?php if($dropyear==2042) { echo('selected="selected"'); } ?> >2042</option>
	<option value='2043' <?php if($dropyear==2043) { echo('selected="selected"'); } ?> >2043</option>
	<option value='2044' <?php if($dropyear==2044) { echo('selected="selected"'); } ?> >2044</option>
	<option value='2045' <?php if($dropyear==2045) { echo('selected="selected"'); } ?> >2045</option>
	<option value='2046' <?php if($dropyear==2046) { echo('selected="selected"'); } ?> >2046</option>
	<option value='2047' <?php if($dropyear==2047) { echo('selected="selected"'); } ?> >2047</option>
	<option value='2048' <?php if($dropyear==2048) { echo('selected="selected"'); } ?> >2048</option>
	<option value='2049' <?php if($dropyear==2049) { echo('selected="selected"'); } ?> >2049</option>
	<option value='2050' <?php if($dropyear==2050) { echo('selected="selected"'); } ?> >2050</option>

</select>
	</td>

	<td>
<input type="submit" class="btn btn-default" value="Go" />
	</td>
	</tr>
</table>

</form>
</center>
<br><br><br><br>
