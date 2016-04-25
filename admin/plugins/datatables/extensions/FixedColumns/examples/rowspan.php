<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>FixedColumns example - Complex headers</title>
	<link rel="stylesheet" type="text/css" href="../../../media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTables.fixedColumns.css">
	<link rel="stylesheet" type="text/css" href="../../../examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../examples/resources/demo.css">
	<style type="text/css" class="init">

	/* Ensure that the demo table scrolls */
	th, td {
		white-space: nowrap;
		padding-left: 40px !important;
		padding-right: 40px !important;
	}
	div.dataTables_wrapper {
		width: 800px;
		margin: 0 auto;
	}

	</style>
	<script type="text/javascript" language="javascript" src="../../../media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../../../media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../js/dataTables.fixedColumns.js"></script>
	<script type="text/javascript" language="javascript" src="../../../examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../../../examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">


$(document).ready(function() {
	var table = $('#example').DataTable( {
		scrollY:        "300px",
		scrollX:        true,
		scrollCollapse: true,
		paging:         false
	} );
	new $.fn.dataTable.FixedColumns( table );
} );


	</script>
</head>

<body class="dt-example">
	<div class="container">
		<section>
			<h1>FixedColumns example <span>Complex headers</span></h1>

			<div class="info">
				<p>If you are using multiple rows in the table header, it can be useful to have a rowspanning cell on the column(s) you have fixed in place - equally at other
				times it can be useful to not and make use of the two or more cells per column. FixedColumns builds on the complex header support in DataTables to make this
				trivial to use in FixedColumns. Just initialise your FixedColumns instance as you normally would!</p>
			</div>

			<table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th rowspan="2">Name</th>
						<th colspan="2">HR Information</th>
						<th colspan="3">Contact</th>
					</tr>
					<tr>
						<th>Position</th>
						<th>Salary</th>
						<th>Office</th>
						<th>Extn.</th>
						<th>E-mail</th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Salary</th>
						<th>Office</th>
						<th>Extn.</th>
						<th>E-mail</th>
					</tr>
				</tfoot>

				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>$320,800</td>
						<td>Edinburgh</td>
						<td>5421</td>
						<td>t.nixon@datatables.net</td>
					</tr>
					<tr>
						<td>Garrett Winters</td>
						<td>Accountant</td>
						<td>$170,750</td>
						<td>Tokyo</td>
						<td>8422</td>
						<td>g.winters@datatables.net</td>
					</tr>
					<tr>
						<td>Ashton Cox</td>
						<td>Junior Technical Author</td>
						<td>$86,000</td>
						<td>San Francisco</td>
						<td>1562</td>
						<td>a.cox@datatables.net</td>
					</tr>
					<tr>
						<td>Cedric Kelly</td>
						<td>Senior Javascript Developer</td>
						<td>$433,060</td>
						<td>Edinburgh</td>
						<td>6224</td>
						<td>c.kelly@datatables.net</td>
					</tr>
					<tr>
						<td>Airi Satou</td>
						<td>Accountant</td>
						<td>$162,700</td>
						<td>Tokyo</td>
						<td>5407</td>
						<td>a.satou@datatables.net</td>
					</tr>
					<tr>
						<td>Brielle Williamson</td>
						<td>Integration Specialist</td>
						<td>$372,000</td>
						<td>New York</td>
						<td>4804</td>
						<td>b.williamson@datatables.net</td>
					</tr>
					<tr>
						<td>Herrod Chandler</td>
						<td>Sales Assistant</td>
						<td>$137,500</td>
						<td>San Francisco</td>
						<td>9608</td>
						<td>h.chandler@datatables.net</td>
					</tr>
					<tr>
						<td>Rhona Davidson</td>
						<td>Integration Specialist</td>
						<td>$327,900</td>
						<td>Tokyo</td>
						<td>6200</td>
						<td>r.davidson@datatables.net</td>
					</tr>
					<tr>
						<td>Colleen Hurst</td>
						<td>Javascript Developer</td>
						<td>$205,500</td>
						<td>San Francisco</td>
						<td>2360</td>
						<td>c.hurst@datatables.net</td>
					</tr>
					<tr>
						<td>Sonya Frost</td>
						<td>Software Engineer</td>
						<td>$103,600</td>
						<td>Edinburgh</td>
						<td>1667</td>
						<td>s.frost@datatables.net</td>
					</tr>
					<tr>
						<td>Jena Gaines</td>
						<td>Office Manager</td>
						<td>$90,560</td>
						<td>London</td>
						<td>3814</td>
						<td>j.gaines@datatables.net</td>
					</tr>
					<tr>
						<td>Quinn Flynn</td>
						<td>Support Lead</td>
						<td>$342,000</td>
						<td>Edinburgh</td>
						<td>9497</td>
						<td>q.flynn@datatables.net</td>
					</tr>
					<tr>
						<td>Charde Marshall</td>
						<td>Regional Director</td>
						<td>$470,600</td>
						<td>San Francisco</td>
						<td>6741</td>
						<td>c.marshall@datatables.net</td>
					</tr>
					<tr>
						<td>Haley Kennedy</td>
						<td>Senior Marketing Designer</td>
						<td>$313,500</td>
						<td>London</td>
						<td>3597</td>
						<td>h.kennedy@datatables.net</td>
					</tr>
					<tr>
						<td>Tatyana Fitzpatrick</td>
						<td>Regional Director</td>
						<td>$385,750</td>
						<td>London</td>
						<td>1965</td>
						<td>t.fitzpatrick@datatables.net</td>
					</tr>
					<tr>
						<td>Michael Silva</td>
						<td>Marketing Designer</td>
						<td>$198,500</td>
						<td>London</td>
						<td>1581</td>
						<td>m.silva@datatables.net</td>
					</tr>
					<tr>
						<td>Paul Byrd</td>
						<td>Chief Financial Officer (CFO)</td>
						<td>$725,000</td>
						<td>New York</td>
						<td>3059</td>
						<td>p.byrd@datatables.net</td>
					</tr>
					<tr>
						<td>Gloria Little</td>
						<td>Systems Administrator</td>
						<td>$237,500</td>
						<td>New York</td>
						<td>1721</td>
						<td>g.little@datatables.net</td>
					</tr>
					<tr>
						<td>Bradley Greer</td>
						<td>Software Engineer</td>
						<td>$132,000</td>
						<td>London</td>
						<td>2558</td>
						<td>b.greer@datatables.net</td>
					</tr>
					<tr>
						<td>Dai Rios</td>
						<td>Personnel Lead</td>
						<td>$217,500</td>
						<td>Edinburgh</td>
						<td>2290</td>
						<td>d.rios@datatables.net</td>
					</tr>
					<tr>
						<td>Jenette Caldwell</td>
						<td>Development Lead</td>
						<td>$345,000</td>
						<td>New York</td>
						<td>1937</td>
						<td>j.caldwell@datatables.net</td>
					</tr>
					<tr>
						<td>Yuri Berry</td>
						<td>Chief Marketing Officer (CMO)</td>
						<td>$675,000</td>
						<td>New York</td>
						<td>6154</td>
						<td>y.berry@datatables.net</td>
					</tr>
					<tr>
						<td>Caesar Vance</td>
						<td>Pre-Sales Support</td>
						<td>$106,450</td>
						<td>New York</td>
						<td>8330</td>
						<td>c.vance@datatables.net</td>
					</tr>
					<tr>
						<td>Doris Wilder</td>
						<td>Sales Assistant</td>
						<td>$85,600</td>
						<td>Sidney</td>
						<td>3023</td>
						<td>d.wilder@datatables.net</td>
					</tr>
					<tr>
						<td>Angelica Ramos</td>
						<td>Chief Executive Officer (CEO)</td>
						<td>$1,200,000</td>
						<td>London</td>
						<td>5797</td>
						<td>a.ramos@datatables.net</td>
					</tr>
					<tr>
						<td>Gavin Joyce</td>
						<td>Developer</td>
						<td>$92,575</td>
						<td>Edinburgh</td>
						<td>8822</td>
						<td>g.joyce@datatables.net</td>
					</tr>
					<tr>
						<td>Jennifer Chang</td>
						<td>Regional Director</td>
						<td>$357,650</td>
						<td>Singapore</td>
						<td>9239</td>
						<td>j.chang@datatables.net</td>
					</tr>
					<tr>
						<td>Brenden Wagner</td>
						<td>Software Engineer</td>
						<td>$206,850</td>
						<td>San Francisco</td>
						<td>1314</td>
						<td>b.wagner@datatables.net</td>
					</tr>
					<tr>
						<td>Fiona Green</td>
						<td>Chief Operating Officer (COO)</td>
						<td>$850,000</td>
						<td>San Francisco</td>
						<td>2947</td>
						<td>f.green@datatables.net</td>
					</tr>
					<tr>
						<td>Shou Itou</td>
						<td>Regional Marketing</td>
						<td>$163,000</td>
						<td>Tokyo</td>
						<td>8899</td>
						<td>s.itou@datatables.net</td>
					</tr>
					<tr>
						<td>Michelle House</td>
						<td>Integration Specialist</td>
						<td>$95,400</td>
						<td>Sidney</td>
						<td>2769</td>
						<td>m.house@datatables.net</td>
					</tr>
					<tr>
						<td>Suki Burks</td>
						<td>Developer</td>
						<td>$114,500</td>
						<td>London</td>
						<td>6832</td>
						<td>s.burks@datatables.net</td>
					</tr>
					<tr>
						<td>Prescott Bartlett</td>
						<td>Technical Author</td>
						<td>$145,000</td>
						<td>London</td>
						<td>3606</td>
						<td>p.bartlett@datatables.net</td>
					</tr>
					<tr>
						<td>Gavin Cortez</td>
						<td>Team Leader</td>
						<td>$235,500</td>
						<td>San Francisco</td>
						<td>2860</td>
						<td>g.cortez@datatables.net</td>
					</tr>
					<tr>
						<td>Martena Mccray</td>
						<td>Post-Sales support</td>
						<td>$324,050</td>
						<td>Edinburgh</td>
						<td>8240</td>
						<td>m.mccray@datatables.net</td>
					</tr>
					<tr>
						<td>Unity Butler</td>
						<td>Marketing Designer</td>
						<td>$85,675</td>
						<td>San Francisco</td>
						<td>5384</td>
						<td>u.butler@datatables.net</td>
					</tr>
					<tr>
						<td>Howard Hatfield</td>
						<td>Office Manager</td>
						<td>$164,500</td>
						<td>San Francisco</td>
						<td>7031</td>
						<td>h.hatfield@datatables.net</td>
					</tr>
					<tr>
						<td>Hope Fuentes</td>
						<td>Secretary</td>
						<td>$109,850</td>
						<td>San Francisco</td>
						<td>6318</td>
						<td>h.fuentes@datatables.net</td>
					</tr>
					<tr>
						<td>Vivian Harrell</td>
						<td>Financial Controller</td>
						<td>$452,500</td>
						<td>San Francisco</td>
						<td>9422</td>
						<td>v.harrell@datatables.net</td>
					</tr>
					<tr>
						<td>Timothy Mooney</td>
						<td>Office Manager</td>
						<td>$136,200</td>
						<td>London</td>
						<td>7580</td>
						<td>t.mooney@datatables.net</td>
					</tr>
					<tr>
						<td>Jackson Bradshaw</td>
						<td>Director</td>
						<td>$645,750</td>
						<td>New York</td>
						<td>1042</td>
						<td>j.bradshaw@datatables.net</td>
					</tr>
					<tr>
						<td>Olivia Liang</td>
						<td>Support Engineer</td>
						<td>$234,500</td>
						<td>Singapore</td>
						<td>2120</td>
						<td>o.liang@datatables.net</td>
					</tr>
					<tr>
						<td>Bruno Nash</td>
						<td>Software Engineer</td>
						<td>$163,500</td>
						<td>London</td>
						<td>6222</td>
						<td>b.nash@datatables.net</td>
					</tr>
					<tr>
						<td>Sakura Yamamoto</td>
						<td>Support Engineer</td>
						<td>$139,575</td>
						<td>Tokyo</td>
						<td>9383</td>
						<td>s.yamamoto@datatables.net</td>
					</tr>
					<tr>
						<td>Thor Walton</td>
						<td>Developer</td>
						<td>$98,540</td>
						<td>New York</td>
						<td>8327</td>
						<td>t.walton@datatables.net</td>
					</tr>
					<tr>
						<td>Finn Camacho</td>
						<td>Support Engineer</td>
						<td>$87,500</td>
						<td>San Francisco</td>
						<td>2927</td>
						<td>f.camacho@datatables.net</td>
					</tr>
					<tr>
						<td>Serge Baldwin</td>
						<td>Data Coordinator</td>
						<td>$138,575</td>
						<td>Singapore</td>
						<td>8352</td>
						<td>s.baldwin@datatables.net</td>
					</tr>
					<tr>
						<td>Zenaida Frank</td>
						<td>Software Engineer</td>
						<td>$125,250</td>
						<td>New York</td>
						<td>7439</td>
						<td>z.frank@datatables.net</td>
					</tr>
					<tr>
						<td>Zorita Serrano</td>
						<td>Software Engineer</td>
						<td>$115,000</td>
						<td>San Francisco</td>
						<td>4389</td>
						<td>z.serrano@datatables.net</td>
					</tr>
					<tr>
						<td>Jennifer Acosta</td>
						<td>Junior Javascript Developer</td>
						<td>$75,650</td>
						<td>Edinburgh</td>
						<td>3431</td>
						<td>j.acosta@datatables.net</td>
					</tr>
					<tr>
						<td>Cara Stevens</td>
						<td>Sales Assistant</td>
						<td>$145,600</td>
						<td>New York</td>
						<td>3990</td>
						<td>c.stevens@datatables.net</td>
					</tr>
					<tr>
						<td>Hermione Butler</td>
						<td>Regional Director</td>
						<td>$356,250</td>
						<td>London</td>
						<td>1016</td>
						<td>h.butler@datatables.net</td>
					</tr>
					<tr>
						<td>Lael Greer</td>
						<td>Systems Administrator</td>
						<td>$103,500</td>
						<td>London</td>
						<td>6733</td>
						<td>l.greer@datatables.net</td>
					</tr>
					<tr>
						<td>Jonas Alexander</td>
						<td>Developer</td>
						<td>$86,500</td>
						<td>San Francisco</td>
						<td>8196</td>
						<td>j.alexander@datatables.net</td>
					</tr>
					<tr>
						<td>Shad Decker</td>
						<td>Regional Director</td>
						<td>$183,000</td>
						<td>Edinburgh</td>
						<td>6373</td>
						<td>s.decker@datatables.net</td>
					</tr>
					<tr>
						<td>Michael Bruce</td>
						<td>Javascript Developer</td>
						<td>$183,000</td>
						<td>Singapore</td>
						<td>5384</td>
						<td>m.bruce@datatables.net</td>
					</tr>
					<tr>
						<td>Donna Snider</td>
						<td>Customer Support</td>
						<td>$112,000</td>
						<td>New York</td>
						<td>4226</td>
						<td>d.snider@datatables.net</td>
					</tr>
				</tbody>
			</table>

			<ul class="tabs">
				<li class="active">Javascript</li>
				<li>HTML</li>
				<li>CSS</li>
				<li>Ajax</li>
				<li>Server-side script</li>
			</ul>

			<div class="tabs">
				<div class="js">
					<p>The Javascript shown below is used to initialise the table shown in this example:</p><code class="multiline language-js">$(document).ready(function() {
	var table = $('#example').DataTable( {
		scrollY:        &quot;300px&quot;,
		scrollX:        true,
		scrollCollapse: true,
		paging:         false
	} );
	new $.fn.dataTable.FixedColumns( table );
} );</code>

					<p>In addition to the above code, the following Javascript library files are loaded for use in this example:</p>

					<ul>
						<li><a href="../../../media/js/jquery.js">../../../media/js/jquery.js</a></li>
						<li><a href="../../../media/js/jquery.dataTables.js">../../../media/js/jquery.dataTables.js</a></li>
						<li><a href="../js/dataTables.fixedColumns.js">../js/dataTables.fixedColumns.js</a></li>
					</ul>
				</div>

				<div class="table">
					<p>The HTML shown below is the raw HTML table element, before it has been enhanced by DataTables:</p>
				</div>

				<div class="css">
					<div>
						<p>This example uses a little bit of additional CSS beyond what is loaded from the library files (below), in order to correctly display the table. The
						additional CSS used is shown below:</p><code class="multiline language-css">/* Ensure that the demo table scrolls */
	th, td {
		white-space: nowrap;
		padding-left: 40px !important;
		padding-right: 40px !important;
	}
	div.dataTables_wrapper {
		width: 800px;
		margin: 0 auto;
	}</code>
					</div>

					<p>The following CSS library files are loaded for use in this example to provide the styling of the table:</p>

					<ul>
						<li><a href="../../../media/css/jquery.dataTables.css">../../../media/css/jquery.dataTables.css</a></li>
						<li><a href="../css/dataTables.fixedColumns.css">../css/dataTables.fixedColumns.css</a></li>
					</ul>
				</div>

				<div class="ajax">
					<p>This table loads data by Ajax. The latest data that has been loaded is shown below. This data will update automatically as any additional data is
					loaded.</p>
				</div>

				<div class="php">
					<p>The script used to perform the server-side processing for this table is shown below. Please note that this is just an example script using PHP. Server-side
					processing scripts can be written in any language, using <a href="//datatables.net/manual/server-side">the protocol described in the DataTables
					documentation</a>.</p>
				</div>
			</div>
		</section>
	</div>

	<section>
		<div class="footer">
			<div class="gradient"></div>

			<div class="liner">
				<h2>Other examples</h2>

				<div class="toc">
					<div class="toc-group">
						<h3><a href="./index.html">Examples</a></h3>
						<ul class="toc active">
							<li><a href="./left_right_columns.html">Left and right fixed columns</a></li>
							<li><a href="./simple.html">Basic initialisation</a></li>
							<li><a href="./two_columns.html">Multiple fixed columns</a></li>
							<li><a href="./right_column.html">Right column only</a></li>
							<li class="active"><a href="./rowspan.html">Complex headers</a></li>
							<li><a href="./colvis.html">ColVis integration</a></li>
							<li><a href="./server-side-processing.html">Server-side processing</a></li>
							<li><a href="./css_size.html">CSS row sizing</a></li>
							<li><a href="./size_fixed.html">Assigned column width</a></li>
							<li><a href="./size_fluid.html">Fluid column width</a></li>
							<li><a href="./col_filter.html">Individual column filtering</a></li>
							<li><a href="./bootstrap.html">Bootstrap</a></li>
							<li><a href="./index_column.html">Index column</a></li>
						</ul>
					</div>
				</div>

				<div class="epilogue">
					<p>Please refer to the <a href="http://www.datatables.net">DataTables documentation</a> for full information about its API properties and methods.<br>
					Additionally, there are a wide range of <a href="http://www.datatables.net/extras">extras</a> and <a href="http://www.datatables.net/plug-ins">plug-ins</a>
					which extend the capabilities of DataTables.</p>

					<p class="copyright">DataTables designed and created by <a href="http://www.sprymedia.co.uk">SpryMedia Ltd</a> &#169; 2007-2015<br>
					DataTables is licensed under the <a href="http://www.datatables.net/mit">MIT license</a>.</p>
				</div>
			</div>
		</div>
	</section>
</body>
</html>