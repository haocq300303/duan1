<div class="alert alert-primary" role="alert">
    <h1>THỐNG KÊ</h1>
</div>
<table class="table">
    <thead>
    <tr>
        <th>MÃ DANH MỤC</th>
        <th>TÊN DANH MỤC</th>
        <th>SỐ LƯỢNG</th>
        <th>GIÁ THẤP NHẤT</th>
        <th>GIÁ CAO NHẤT</th>
        <th>GIÁ TRUNG BÌNH</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    <?php foreach ($results as $key => $value){ ?>
        <tr>
            <td><?php echo $value['madm'] ?></td>
            <td><?php echo $value['tendm'] ?></td>
            <td><?php echo $value['countsp'] ?></td>
            <td>$ <?php echo $value['minprice'] ?></td>
            <td>$ <?php echo $value['maxprice'] ?></td>
            <td>$ <?php echo $value['avgprice'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="actions" style="margin-top: 10px;">
    <a href="#" class="btn btn-warning">Biểu đồ</a>
</div>


<div class="row">
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh Muc ', 'So luong san pham'],
                <?php
                $tongdm=count($results);
                $i=1;

                foreach ($results as $thongke ) {
                    extract($thongke);
                    if($i==$tongdm) $dauphay=""; else $dauphay=",";
                    echo" ['".$thongke['tendm']."',".$thongke['countsp']."]".$dauphay;
                    $i+=1;
                }
                ?>


            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'THỐNG KÊ PHÒNG THEO LOẠI PHÒNG', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</div>