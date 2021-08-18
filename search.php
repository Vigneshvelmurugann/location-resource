<?php


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['ch'];
    $yt=$_POST['ch1'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `business` WHERE CONCAT(`Pincode`) LIKE '%".$valueToSearch."%' and CONCAT(`Work`) LIKE '%".$yt."%'";
    $search_result = filterTable($query);
    
}
else{
  $query="SELECT * from `business`";
  $search_result = filterTable($query);
}
// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "locationresource");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
        a:hover { text-decoration: none; color:yellow; }
a:focus { text-decoration: none; color:orange; }
a:active { text-decoration: none; color:teal; }
        body { background: #eee; }
.video { margin: 50px auto; position: relative;
display: block;}
table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
		td:nth-of-type(1):before { content: "NAME"; }
		td:nth-of-type(2):before { content: "MAIL"; }
		td:nth-of-type(3):before { content: "PHONE"; }
		td:nth-of-type(4):before { content: "ADDRESS"; }
		td:nth-of-type(5):before { content: "PINCODE"; }
		td:nth-of-type(6):before { content: "WORK"; }
		td:nth-of-type(7):before { content: "LOCATION"; }
		}
.video {
  border-bottom: 5px solid transparent;
  box-shadow: 0px 20px 20px -10px #4e4e4e;
  border-image: linear-gradient(to right, #D04A02 20%, #FFB600 20%, #FFB600 40%, #E0301E 40%, #E0301E 60%, #EB8C00 60%, #EB8C00 80%, #D93954 80%, #D93954 100%);
  border-image-slice: 1;
}
            *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
myiframe{
box-shadow: 1px 1px 1px #888; }
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
  background: black;

}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
        </style>
    </head>
    <body>
    <center>
    <br>
    <br>
    <br>
    <form action="search.php" method="post">
        
            <input type="text" id="ch" name="ch" placeholder="Pincode">
            <input type="text" id="ch" name="ch1" placeholder="Work"><br><br>
            <input type="submit" class="s" name="search" value="Filter">
            <button value="Back"  onclick='window.location.href="C:/xampp/htdocs/7058/location ressource/login.php"'>Back</button>
            <div class="table-wrpper">
    <table role="table" class="fl-table">
        <thead role="rowgroup">
            <tr role="row">
    <td role="columnheader">NAME</td>
    <td role="columnheader">MAIL</td>
    <td role="columnheader">PHONE</td>
    <td role="columnheader">ADDRESS</td>
    <td role="columnheader">PINCODE</td>
    <td role="columnheader">WORK</td>
    <td role="columnheader">LOCATION</td>
  </tr>
  </thead>
        <tbody role="rowgroup">

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                    <tr role="row">
<td role="cell"><?php echo $row['Name'];?></td>
<td role="cell"><?php echo $row['Mail'];?></td>
<td role="cell"><a href="tel:<?php echo $row['Phone'];?>"><?php echo $row['Phone'];?></a></td>
<td role="cell"><?php echo $row['Address'];?></td>
<td role="cell"><?php echo $row['Pincode'];?></td>
<td role="cell"><?php echo $row['Work'];?></td>


<td role="cell"><a href="mapdirec.php" onclick="return changeSrc(<?php echo $row['Lat'];?>,<?php echo $row['Longu'];?>);">SEEMAP</a></td>
</tr>
              <br>
                <?php endwhile;?>
                </tbody>
            </table>
       </div>
        </form>
      <br>
      <br>
      <br> 
      </center>
    </body>
    <script>
function changeSrc(lat,long)
{ 
    window.location.href = "mapdirec.php";
sessionStorage.setItem("lat", lat);  

sessionStorage.setItem("long", long);


console.log(lat,long);

    return false;
}
</script>
   
</html>