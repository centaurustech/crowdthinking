<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <script type="text/javascript">
		//Variablen für späteres Zusammensetzen des anklickbaren Eintrages
        var timeline;
        var data;
		var pictureContent;
		var link;
		var startOrigin;
		var linkContentFirst = '<a href="';
		var linkContentSecond = ' target="_blank">';
		var linkContentThird = '</a>';
		var picture;
		var pictureContentFirst = '<img src="icons/';
		var pictureContentSecond = '.png" style="width:32px; height:32px;">';
		var dateContent;
	</script>
    <title>Timeline demo</title>

    <style type="text/css">
        body {font: 10pt arial;}
		#timebox {
			background-color: #fdfdfd;
            margin-left:5%;
			margin-right:5%;
            height: 300px;
        }
		#mytimeline {
            margin-left:0%;
			margin-right:0%;
            height: 300px;
        }
		#timecontrol {
		}
    </style>

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="timeline_javascript.js"></script>
    <link rel="stylesheet" type="text/css" href="timeline_style.css">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>

    <script type="text/javascript">

        google.load("visualization", "1");

        // Set callback to run when API is loaded
        google.setOnLoadCallback(drawVisualization);

        // Called when the Visualization API is loaded.
        function drawVisualization() {
            // Create and populate a data table.
            data = new google.visualization.DataTable();
            data.addColumn('datetime', 'start');
            data.addColumn('datetime', 'end');
            data.addColumn('string', 'content');
					
<?php
	include_once("connector.php");
	
	$selector_query;
	$selector_numofrows;
/*	
	$selectedProjectImportNumber;
	$checkProjectImportNumber = $_GET["projectImportNumber"];
	if($selectedProjectImportNumber > 0)
	{
		$selectedProjectImportNumber = $checkProjectImportNumber;
	}
	else
	{
		$selectedProjectImportNumber=0;
	}*/
	
	//$selectedProjectImportNumber = 1;
	
	//if($selectedProjectImportNumber != 0)
	//{
	//TODO ACHTUNG !!!!!!!!!! HARDCODED !!!!!!!!!
	$querytext =	"SELECT 
					timeline.title as itemtitle,
					projects.id as projectid,
					timeline.type as itemtype,
					timeline.date as itemdate,
					timeline.link as itemlink
					FROM projects, timeline
					WHERE projects.id = timeline.projectid
					AND projects.id = 1;";
					
	$selector_query = mysqli_query ($link, $querytext);
	//}
	
	
	
	
	while ($zeile = mysqli_fetch_array( $selector_query, MYSQL_ASSOC))
	{
		echo "\n";
	
		$importedDate = $zeile['itemdate'];
		$start = DateTime::createFromFormat('Y-m-d H:i:s', $importedDate);
		
		$year = substr($importedDate,0,4);
		$month = substr($importedDate,5,2);
		$day = substr($importedDate,8,2);
		
		$title = $zeile['itemtitle'];
		$itemlink = $zeile['itemlink'];
		$type = $zeile['itemtype'];
		
		
		if((strcmp($itemlink,"Weblink") != 0)  && (strcmp($itemlink,"") != 0) && (substr_count($itemlink,"http://") ==0 ))
		{
			$itemlink =  "http://".$itemlink;
		}
	/* Debug:
		echo $start."\n";
		echo $title."\n";
		echo $link."\n";
		echo $type."\n";*/
		
		$importContent = $title.'<br><a href="'.$itemlink.'" target="_blank"><img src="icons/';
		
		switch ($zeile['timeline.type'])
		{
			case 0:		$importContent = $importContent.'facebook';
						break;
			case 1:		$importContent = $importContent.'twitter';
						break;
			case 2:		$importContent = $importContent.'google';
						break;
			case 3:		$importContent = $importContent.'youtube';
						break;
			case 4:		$importContent = $importContent.'kickstarter';
						break;
			case 5:		$importContent = $importContent.'storify';
						break;
			default:	$importContent = $importContent.'sonstiges';
						break;
		}
		$importContent = $importContent.'.png" style="width:32px; height:32px;"></a>';
		
		/*Debug
		 echo $importContent;
		 */
		
//		echo "itemStart = '".$start."';\n";
		//Debug echo "alert(itemStart);";
//		echo "itemContent = '".$importContent."';\n";
		//Debug echo "alert(itemContent);";
		
		//echo "timeline.addItem({'start': itemStart,'content': itemContent});\n";
		
		echo "data.addRows([[new Date(".$year.','.$month.','.$day."), , '".$importContent."']]);\n";
	}
		
	//Zählen der Einträge
	//echo "var count = data.getNumberOfRows();\n";
	//echo "timeline.setSelection([{ 'row': count-1 }]);\n";
	
	
?>				
			
            // specify options
            var options = {
                'width':  "100%",
                'height': "300px",
                'editable': true, // make the events dragable
                'layout': "box"
            };

            // Instantiate our timeline object.
            timeline = new links.Timeline(document.getElementById('mytimeline'));

			
			
			
			

            // Make a callback function for the select event
            var onselect = function (event) {
                var row = undefined;
                var sel = timeline.getSelection();
                if (sel.length) {
                    if (sel[0].row != undefined) {
                        var row = sel[0].row;
                    }
                }

                if (row != undefined) {
					//Datum parsen
					var start = data.getValue(row, 0);
					
					var startMonth = (start.getMonth())+1;
					if(startMonth < 10)
					{
						startMonth = "0"+startMonth;
					}
					var startDay = start.getDate();
					if(startDay < 10)
					{
						startDay = "0"+startDay;
					}
					var startYear = start.getFullYear();
					startOrigin = startMonth+"/"+startDay+"/"+startYear;
						
					//Content parsen
                    var content = data.getValue(row, 2);
					
					var pictureStart = content.search(pictureContentFirst)+16;
					var pictureEnd = content.search(pictureContentSecond);
					if((pictureStart < pictureEnd) && (pictureStart != -1) && (pictureEnd != -1))
					{						
						picture = content.substring(pictureStart,pictureEnd);
						//alert("Picture:\n"+picture);
					}
					else
					{
						picture = "sonstiges";
					}		

					var linkStart = content.search(linkContentFirst)+9;
					var linkEnd = content.search(linkContentSecond)-1;
					if((linkStart < linkEnd) && (linkStart != -1) && (linkEnd != -1))
					{
						link = content.slice(linkStart,linkEnd);
						//alert("Link:\n"+link);
					}
					else
					{
						link = "Weblink";
					}
					
                    document.getElementById("txtContent").value = content.slice(0,content.search('<'));
					document.getElementById("txtLink").value = link;
					document.getElementById("datepicker").value = startOrigin;
					
					var icons = document.getElementsByName("icontyperadiogroup");
					
					for(var i=0; i<icons.length; i++)
					{
						if(icons[i].value.localeCompare(picture) == 0)
						{
							icons[i].checked = true;
						}
						else
						{
							icons[i].checked = false;
						}
					}
                    //document.getElementById("info").innerHTML += "event " + row + " selected<br>";
                }
            };

            // callback function for the change event
            var onchange = function () {
                var sel = timeline.getSelection();
                if (sel.length) {
                    if (sel[0].row != undefined) {
                        var row = sel[0].row;
                        //document.getElementById("info").innerHTML += "event " + row + " changed<br>";
                    }
                }
            };

            // callback function for the delete event
            var ondelete = function () {
                var sel = timeline.getSelection();
                if (sel.length) {
                    if (sel[0].row != undefined) {
                        var row = sel[0].row;
                        //document.getElementById("info").innerHTML += "event " + row + " deleted<br>";
                    }
                }
            };

            // callback function for the add event
            var onadd = function () {
                var count = data.getNumberOfRows();
                //document.getElementById("info").innerHTML += "event " + (count-1) + " added<br>";
            };

            // Add event listeners
            google.visualization.events.addListener(timeline, 'select', onselect);
            google.visualization.events.addListener(timeline, 'change', onchange);
            google.visualization.events.addListener(timeline, 'delete', ondelete);
            google.visualization.events.addListener(timeline, 'add', onadd);

            // Draw our timeline with the created data and options
            timeline.draw(data, options);
        }

        /**
         * Add a new event
         */
        function add() {
			//Datum
            var range = timeline.getVisibleChartRange();
            var start; 
			var startByUserInput = document.getElementById("datepicker").value;
			if(startByUserInput.localeCompare("") != 0)
			{
				start = new Date(startByUserInput);
			}
			else
			{
				start = new Date((range.start.valueOf() + range.end.valueOf()) / 2);
			}
			
			//Angezeigtes Logo
			var icon;
			var icons = document.getElementsByName('icontyperadiogroup');
			for(var i=0;i<icons.length; i++)
			{
				if(icons[i].checked == true)
				{
					icon = icons[i].value;
					break;
				}
			}
			
			//Weblink Teil 1
			var contentLink = document.getElementById("txtLink").value;
			if((contentLink.localeCompare("Weblink") != 0)  && (contentLink.localeCompare("") != 0) && (contentLink.indexOf("http://") !=0 ))
			{
				contentLink =  "http://"+contentLink;
			}
			
			//Ereignistitel
            var content = document.getElementById("txtContent").value;
			content += '<br>';
			if((contentLink.localeCompare("Weblink") != 0) && (contentLink.localeCompare("") != 0))
			{
				content += linkContentFirst+contentLink+linkContentSecond;
			}
			content += pictureContentFirst+icon+pictureContentSecond;
			
			//Weblink Teil 2
			if((contentLink.localeCompare("Weblink") != 0) && (contentLink.localeCompare("") != 0))
			{	
				content += linkContentThird;
			}
			alert(content);
			//Anzeige des neuen Eintrage
            timeline.addItem({
                'start': start,
                'content': content
            });

			//Zählen der Einträge
            var count = data.getNumberOfRows();
            timeline.setSelection([{
                'row': count-1
            }]);
			
			
			
			alert("Startdarstellung #"+start+"#");
        }

        /**
         * Change the content of the currently selected event
         */
        function change() {
            // retrieve the selected row
            var sel = timeline.getSelection();
            if (sel.length) {
                if (sel[0].row != undefined) {
                    var row = sel[0].row;
                }
            }

            if (row != undefined) {
				var newStart;
				var startByUserInput = document.getElementById("datepicker").value;
				if(startOrigin.localeCompare(startByUserInput) != 0)
				{
					newStart = new Date(startByUserInput);
					//alert("neu: "+startOrigin+" != "+startByUserInput);
				}
				else
				{
					newStart = new Date(startOrigin);
					//alert("geblieben: "+startOrigin+" == "+startByUserInput);
				}
			
                var content = document.getElementById("txtContent").value;
				var title = content;
				var locallink = document.getElementById("txtLink").value;
				if((locallink.localeCompare("Weblink") != 0) && (locallink.localeCompare("") != 0) && (locallink.indexOf("http://") != 0))
				{
					locallink =  "http://"+locallink;
					document.getElementById("txtLink").value = locallink;
				}
				var icon;
				var type;
				var icons = document.getElementsByName('icontyperadiogroup');
				for(var i=0;i<icons.length; i++)
				{
					if(icons[i].checked == true)
					{
						icon = icons[i].value;
						type = i;
						break;
					}
				}
			
				content += '<br>';
				
				if((locallink.localeCompare("Weblink") != 0) && (locallink.localeCompare("") != 0))
				{	
					content += linkContentFirst;
					if(locallink.localeCompare("") != 0)
					{
						content += locallink + '"';
					}
					else
					{
						content += '"';
					}
					content += linkContentSecond;
				}
				
				content += pictureContentFirst;
				content += icon;
				content += pictureContentSecond;
				if((locallink.localeCompare("Weblink") != 0) && (locallink.localeCompare("") != 0))
				{
					content += linkContentThird;
				}
			//	alert(content);
				
                timeline.changeItem(row, {
                    'content': content,
					'start': newStart
                    // Note: start, end, and group can be added here too.
                });
				
				var xmlHttp = null;

	//TODO ACHTUNG !!!!!!!!!! HARDCODED !!!!!!!!!
				theUrl = 'updater.php?id=1&title='+title+'&type='+type+'&date='+newStart+'&link='+locallink;
				alert(theUrl);
				
				xmlHttp = new XMLHttpRequest();
				xmlHttp.open( "GET", theUrl);
				xmlHttp.send( null );
				
				//return xmlHttp.responseText;
            } else {
                alert("Bitte wählen Sie zuerst ein Ereignis");
            }
        }

        /**
         * Delete the currently selected event
         */
        function doDelete() {
            // retrieve the selected row
            var sel = timeline.getSelection();
            if (sel.length) {
                if (sel[0].row != undefined) {
                    var row = sel[0].row;
                }
            }

            if (row != undefined) {
                timeline.deleteItem(row);
            } else {
                alert("Bitte wählen Sie zuerst ein Ereignis");
            }
        }
    </script>
</head>

<body style="background-color:#c8c8c8">
<center>
<div>
<!--
	<form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="GET">
<select id="projectImport" name="projectImport">
<?php
/**			while ($zeile = mysqli_fetch_array( $selector_query, MYSQL_ASSOC))
			{
				$projectId = $zeile['id'];
				$projectTitle = $zeile['projecttitle'];
				echo '<option onClick="this.form.submit()" value="'.projectId.'"';

				if ($_POST["projectImport"] == $j)
				{
					echo ' selected="selected"> ';
				}
				else
				{
					echo "> ";
				}

				echo $projectTitle.'</option>'."\n";
			}
			**/
?>
		</select>
	<input type="submit" value="Projekt importieren">	
	</form> -->
</div>
<p>
	<table>
	<tr>
	<td style="text-align:right;">
		Ereignistitel: <input type="text" value="Ereignistitel" id="txtContent">
		<br>
		<br>
		Link: <input type="text" value="Weblink" id="txtLink">
		<br>
		<br>
		Datum: <input type="text" id="datepicker">
	</td>
	<td style="height:10px;" >
<div id="datepicker" onclick="abholen();">
</div>
	</td>
	<td>
		<p style="float:left;">
			<input type="radio"  name="icontyperadiogroup" value="facebook"> Facebook</br>
			<input type="radio"  name="icontyperadiogroup" value="twitter"> Twitter</br>
			<input type="radio"  name="icontyperadiogroup" value="google"> Google+</br>
			<input type="radio"  name="icontyperadiogroup" value="youtube"> Youtube</br>
			<input type="radio"  name="icontyperadiogroup" value="kickstarter"> Kickstarter</br>
			<input type="radio"  name="icontyperadiogroup" value="storify"> Storify</br>
			<input type="radio"  name="icontyperadiogroup" value="sonstiges"checked="true"> Sonstiges</br>
		</p>
	</td>
	<td>
		<input type="button" value="Neues Ereignis" title="Neues Ereignis hinzufügen" onclick="add();">
	</td>
	<td>
	</td>
	</tr>
	</table>
</p>
<br>
<p>
    <input type="button" value="Änderung übernehmen" title="Ein ausgewähltes Ereignis bearbeiten" onclick="change();">
    <input type="button" value="Ereignis löschen" title="Ein ausgewähltes Ereignis löschen" onclick="doDelete();">
</p>
</center>
	<div id="timebox">
		<div id="mytimeline">
		</div>
		
		<script>
			function zoom(zoomFactor)
			{
				switch(zoomFactor)
				{
					case "1":
						timeline.zoom(3,new Date());
						break;
					case "2":
						timeline.zoom(6,new Date());
						break;
					case "3":
						timeline.zoom(6,new Date());
						break;
					case "4":
						timeline.zoom(-10,new Date());
						break;
					default:
						break;
				}
			}
		</script>
		
		<div id="timecontrol">
			<p style="float:left;"><input type="button" value="Zoom Tag" title="Die Zoomstufe auf die Tagesansicht stellen" onclick="zoom('1');"></p>
			<p style="float:left;"><input type="button" value="Zoom Woche" title="Die Zoomstufe auf die Wochenansicht stellen" onclick="zoom('2');"></p>
			<p style="float:left;"><input type="button" value="Zoom Monat" title="Die Zoomstufe auf die Monatsansicht stellen" onclick="zoom('3');"></p>
			<p style="float:left;"><input type="button" value="Zoom Jahr" title="Die Zoomstufe auf die Jahresansicht stellen" onclick="zoom('4');"></p>
		</div>
	</div>
</body>
</html>
