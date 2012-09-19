<!--CONTAINER-->
<div class="ctr">

<!--HEADER-->
<header id="header">

<a id="logo" href="index.php">Pharmacy Match</a>

<ul>
<li>Welcome <span>Username</span></li>
<li><a href="view-account.php">View Account</a></li>
<li><a href="edit-account.php">Edit Account</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>

<div class="ticker">Vacancies uploaded in the last 24 hours show here, this will be a jquery scrolling text area</div>
</header>
<!--HEADER-->

<!--COLUMN 1-->
<div class="ThreeColGrid_c1">
<img src="/pharmacy/img/avatar.jpg" width="100" height="100" alt="Username">
</div>
<!--COLUMN 1-->

<!--COLUMN 2-->
<div class="ThreeColGrid_c2" id="lopro">
<h1>Salutation + First Name + Last Name</h1>
<h3>County</h3>
<p><b>Member since</b> 00-00-00<br>
<b>Last logged in</b> 00-00-00<br>
<b>Pharmacist registration</b> 123456<br>
<b>GPHC</b> 123456</p>

<h4>Locum Availibility</h4>
<img style="margin: 0 0 20px 0;" src="/pharmacy/img/cal.jpg" width="195" height="192" alt="calendar">

<h4>IT Compatibility</h4>
<ul>
<li>Link</li>
<li>Nexphase</li>
</ul>

<p><b>EPS1 Ready</b> - Yes/No<br>
<b>EPS2 Ready</b> - Yes/No</p>

<h4>Essential Services</h4>
<ul>
<li>Public Health</li>
<li>Waste Management</li>
</ul>

<h4>Advanced Services</h4>
<ul>
<li>MUR &amp; Prescription Intervention Service</li>
<li>Appliance Use Review Service (AUR)</li>
</ul>

<h4>Enhanced Services</h4>
<ul>
<li>Supervised Adminstration</li>
<li>Needle &amp; Syringe Exchange</li>
</ul>

<h4>Patient Group Directives</h4>
<p>Patient Group Directives Text goes here</p>

<h4>Recomendations</h4>
<p class="attention">Number of recomendations goes here,<br>
A recomendation is triggered when a store gives a locum a 5 star rating</p>

<h4>Match Rating</h4>
<p class="attention">*** overall star rating goes here ***</p>
<img src="/pharmacy/img/stars.png" width="147" height="28" alt="rating"></div>
<!--COLUMN 2-->

<!--COLUMN 3-->
<div class="ThreeColGrid_c3">
<h1>Vacancy Search</h1>

<h3>Search by county</h3>
<form method="get" action="locum-vacancy-search-results.html">
<select name="Counties">
<optgroup label="England">
            <option>Bedfordshire</option>
            <option>Berkshire</option>
            <option>Bristol</option>
            <option>Buckinghamshire</option>
            <option>Cambridgeshire</option>
            <option>Cheshire</option>
            <option>City of London</option>
            <option>Cornwall</option>
            <option>Cumbria</option>
            <option>Derbyshire</option>
            <option>Devon</option>
            <option>Dorset</option>
            <option>Durham</option>
            <option>East Riding</option>
            <option>East Sussex</option>
            <option>Essex</option>
            <option>Gloucestershire</option>
            <option>Greater London</option>
            <option>Greater Manchester</option>
            <option>Hampshire</option>
            <option>Herefordshire</option>
            <option>Hertfordshire</option>
            <option>Isle of Wight</option>
            <option>Kent</option>
            <option>Lancashire</option>
            <option>Leicestershire</option>
            <option>Lincolnshire</option>
            <option>Merseyside</option>
            <option>Norfolk</option>
            <option>North Yorkshire</option>
            <option>Northamptonshire</option>
            <option>Northumberland</option>
            <option>Nottinghamshire</option>
            <option>Oxfordshire</option>
            <option>Rutland</option>
            <option>Shropshire</option>
            <option>Somerset</option>
            <option>South Yorkshire</option>
            <option>Staffordshire</option>
            <option>Suffolk</option>
            <option>Surrey</option>
            <option>Tyne and Wear</option>
            <option>Warwickshire</option>
            <option>West Midlands</option>
            <option>West Sussex</option>
            <option>West Yorkshire</option>
            <option>Wiltshire</option>
            <option>Worcestershire</option>
</optgroup>
<optgroup label="Scotland">
            <option>Aberdeenshire</option>
            <option>Angus</option>
            <option>Argyllshire</option>
            <option>Ayrshire</option>
            <option>Banffshire</option>
            <option>Berwickshire</option>
            <option>Buteshire</option>
            <option>Cromartyshire</option>
            <option>Caithness</option>
            <option>Clackmannanshire</option>
            <option>Dumfriesshire</option>
            <option>Dunbartonshire</option>
            <option>East Lothian</option>
            <option>Fife</option>
            <option>Inverness-shire</option>
            <option>Kincardineshire</option>
            <option>Kinross</option>
            <option>Kirkcudbrightshire</option>
            <option>Lanarkshire</option>
            <option>Midlothian</option>
            <option>Morayshire</option>
            <option>Nairnshire</option>
            <option>Orkney</option>
            <option>Peeblesshire</option>
            <option>Perthshire</option>
            <option>Renfrewshire</option>
            <option>Ross-shire</option>
            <option>Roxburghshire</option>
            <option>Selkirkshire</option>
            <option>Shetland</option>
            <option>Stirlingshire</option>
            <option>Sutherland</option>
            <option>West Lothian</option>
            <option>Wigtownshire</option>
</optgroup>
<optgroup label="Wales">
            <option>Anglesey</option>
            <option>Brecknockshire</option>
            <option>Caernarfonshire</option>
            <option>Carmarthenshire</option>
            <option>Cardiganshire</option>
            <option>Denbighshire</option>
            <option>Flintshire</option>
            <option>Glamorgan</option>
            <option>Merioneth</option>
            <option>Monmouthshire</option>
            <option>Montgomeryshire</option>
            <option>Pembrokeshire</option>
            <option>Radnorshire</option>
</optgroup>
<optgroup label="Northern Ireland">
            <option>Antrim</option>
            <option>Armagh</option>
            <option>Down</option>
            <option>Fermanagh</option>
            <option>Londonderry</option>
            <option>Tyrone</option>
</optgroup>
</select><br>
<input type="submit" name="" type="button" value="go"/>
</form>
<br>

<h3>Search your area</h3>
<form>
<select name="radius">
<option>Within 10 miles</option>
<option>Within 20 miles</option>
<option>Within 30 miles</option>
<option>Within 40 miles</option>
<option>Within 50 miles</option>
<option>Within 60 miles</option>
<option>Within 70 miles</option>
<option>Within 80 miles</option>
<option>Within 90 miles</option>
<option>Within 100 miles</option>
</select><br>
<input type="submit" name="" type="button" value="go"/>
</form>
<br>

<h1>My applications</h1>
<ul>
<li><a href="#">link to vacancy</a></li>
<li><a href="#">link to vacancy</a></li>
</ul>
<br>


<p>Your Account is <b>80%</b> complete</p>
<p class="attention">^ each field the locum fills in in their profile should add a precentage, there are 20 fields so each field should add 5%</p>
</div>
<!--COLUMN 3-->

<!--FOOTER-->
<footer id="footer"></footer>
<!--FOOTER-->

<br class="clear"/>
</div>
<!--CONTAINER-->