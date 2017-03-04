<?php
include("header.php");

echo ('
	<html>

<head>
	<title>Javascript clock</title>
</head>

<body onload="getTime();">

<script type="text/javascript">

	function getTime()
	{
		var now = new Date();
		var h = now.getHours();
		var m = now.getMinutes();
		var s = now.getSeconds();
		
		m = checkTime(m);
		s = checkTime(s);
		
		document.getElementById("clock").innerHTML = h + ":" + m + ":" + s;
		
		setTimeout("getTime()", 1000);
	}
	
	function checkTime(time)
	{
		if(time<10)
		{
			time = "0" + time;	
		}
		
		return time;
	}

</script>

<p id="clock" align="right"></p>

</body>

</html>
	');

echo('<div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome '.$_SESSION["name"].'</p>
		
		
		
		
<SCRIPT LANGUAGE="JavaScript">


function setToday() {
var now   = new Date();
var day   = now.getDate();
var month = now.getMonth();
var year  = now.getYear();
if (year < 2000)    // Y2K Fix, Isaac Powell
year = year + 1900; // http://onyx.idbsu.edu/~ipowell
this.focusDay = day;
document.calControl.month.selectedIndex = month;
document.calControl.year.value = year;
displayCalendar(month, year);
}
function isFourDigitYear(year) {
if (year.length != 4) {
alert ("Sorry, the year must be four-digits in length.");
document.calControl.year.select();
document.calControl.year.focus();
} else { return true; }
}
function selectDate() {
var year  = document.calControl.year.value;
if (isFourDigitYear(year)) {
var day   = 0;
var month = document.calControl.month.selectedIndex;
displayCalendar(month, year);
    }
}

function setPreviousYear() {
var year  = document.calControl.year.value;
if (isFourDigitYear(year)) {
var day   = 0;
var month = document.calControl.month.selectedIndex;
year--;
document.calControl.year.value = year;
displayCalendar(month, year);
   }
}
function setPreviousMonth() {
var year  = document.calControl.year.value;
if (isFourDigitYear(year)) {
var day   = 0;
var month = document.calControl.month.selectedIndex;
if (month == 0) {
month = 11;
if (year > 1000) {
year--;
document.calControl.year.value = year;
}
} else { month--; }
document.calControl.month.selectedIndex = month;
displayCalendar(month, year);
   }
}
function setNextMonth() {
var year  = document.calControl.year.value;
if (isFourDigitYear(year)) {
var day   = 0;
var month = document.calControl.month.selectedIndex;
if (month == 11) {
month = 0;
year++;
document.calControl.year.value = year;
} else { month++; }
document.calControl.month.selectedIndex = month;
displayCalendar(month, year);
   }
}
function setNextYear() {
var year = document.calControl.year.value;
if (isFourDigitYear(year)) {
var day = 0;
var month = document.calControl.month.selectedIndex;
year++;
document.calControl.year.value = year;
displayCalendar(month, year);
   }
}
function displayCalendar(month, year) {       
month = parseInt(month);
year = parseInt(year);
var i = 0;
var days = getDaysInMonth(month+1,year);
var firstOfMonth = new Date (year, month, 1);
var startingPos = firstOfMonth.getDay();
days += startingPos;
document.calButtons.calPage.value  =   " Su Mo Tu We Th Fr Sa";
document.calButtons.calPage.value += "\n --------------------";
for (i = 0; i < startingPos; i++) {
if ( i%7 == 0 ) document.calButtons.calPage.value += "\n ";
document.calButtons.calPage.value += "   ";
}
for (i = startingPos; i < days; i++) {
if ( i%7 == 0 ) document.calButtons.calPage.value += "\n ";
if (i-startingPos+1 < 10)
document.calButtons.calPage.value += "0";
document.calButtons.calPage.value += i-startingPos+1;
document.calButtons.calPage.value += " ";
}
for (i=days; i<42; i++)  {
if ( i%7 == 0 ) document.calButtons.calPage.value += "\n ";
document.calButtons.calPage.value += "   ";
}
document.calControl.Go.focus();
}
function getDaysInMonth(month,year)  {
var days;
if (month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12)  days=31;
else if (month==4 || month==6 || month==9 || month==11) days=30;
else if (month==2)  {
if (isLeapYear(year)) { days=29; }
else { days=28; }
}
return (days);
}
function isLeapYear (Year) {
if (((Year % 4)==0) && ((Year % 100)!=0) || ((Year % 400)==0)) {
return (true);
} else { return (false); }
}
// End -->
</SCRIPT>
</head>

<body>
<big>Select-A-Month</big>
<FORM NAME="calControl" onSubmit="return false;" method="post">
<TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0>
<TR><TD COLSPAN=7>
<SELECT NAME="month" onChange="selectDate()">
<OPTION>January</OPTION>
<OPTION>February</OPTION>
<OPTION>March</OPTION>
<OPTION>April</OPTION>
<OPTION>May</OPTION>
<OPTION>June</OPTION>
<OPTION>July</OPTION>

<OPTION>August</OPTION>
<OPTION>September</OPTION>
<OPTION>October</OPTION>
<OPTION>November</OPTION>
<OPTION>December</OPTION>
</SELECT>
<INPUT NAME="year" TYPE=TEXT SIZE=4 MAXLENGTH=4>
<INPUT TYPE="button" NAME="Go" value="Build!" onClick="selectDate()">
</TD>
</TR>
</FORM>
<FORM NAME="calButtons" method="post">
<TR><TD><textarea FONT="Courier" NAME="calPage" WRAP=no ROWS=8 COLS=22></textarea></TD><TR><TD>
<INPUT TYPE=BUTTON NAME="previousYear" VALUE=" <<  "  onClick="setPreviousYear()">
<INPUT TYPE=BUTTON NAME="previousYear" VALUE="  <  "  onClick="setPreviousMonth()">
<INPUT TYPE=BUTTON NAME="previousYear" VALUE="Today"  onClick="setToday()">
<INPUT TYPE=BUTTON NAME="previousYear" VALUE="  >  "  onClick="setNextMonth()">
<INPUT TYPE=BUTTON NAME="previousYear" VALUE="  >> "  onClick="setNextYear()">
</TD></TR>
</TABLE></FORM></FONT>

<BODY onLoad="setToday()">




		
      </div>
      </div>
	      <div class="col-sm-9">
      <div class="well">
        <h4>Information on User</h4>
        <p>Your Uniqe ID is '.$_SESSION["id"].'.</p>
      </div>
      </div>
	      <div class="col-sm-9">
      <div class="well">
       ');
	   
	
 if($_SESSION["usertype"]=="lecturer"){
	  echo ('
	    <a href="addModuleToCourse.php" class="btn btn-info">Add Module To Course</a>
	  <a href="addModule.php" class="btn btn-info">Add Module</a>
	   <a href="addCourse.php" class="btn btn-info">Add Course</a>
	    <a href="addStudentToModule.php" class="btn btn-info">Add Student To a Module</a>
		 <a href="addStudentToCourse.php" class="btn btn-info">Add Student To a Course</a>
		 <a href="viewStudentList.php" class="btn btn-info">View Student Info</a>
		 <a href="viewCourseList.php" class="btn btn-info">View Course List</a>
		  <a href="viewModuleList.php" class="btn btn-info">View Module List</a>
          <a href="removeStudentFromModule.php" class="btn btn-info">Remove Student From Module</a>');}
		  
 else if($_SESSION["usertype"]=="student") {
	 echo ('
	 <input type="button" value="Bus Timetable" onclick="popup()" />
	 <script language="javascript" type="text/javascript">
     var mywindow;
	function popup()
	{
		mywindow = window.open("images/bus.pdf", "height=800", "width=300");
	}
	</script>
	
	
	
	
				

	');

	

 }
 echo('
</body>
</html>
');?>