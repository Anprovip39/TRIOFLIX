<div class="admin-container">
    <header>
        <h1>Thống kê</h1>
    </header>
    <main class="content">
        <div class="film_statistics">
            <h2>Phim</h2>
            <div id="filmChart"></div>
        </div>
    </main>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart']
    });


    fetch('http://localhost/duAn1NhomSupercalifragilisticexpialidocious/admin.php?ctrl=page&view=data')
        .then(response => response.json())
        .then(data => {
            console.log(data.film_statistics);


            const filmStatistics = data.film_statistics;


            const chartData = [
                ['Thể loại', 'Số lượng phim']
            ];
            filmStatistics.forEach(item => {
                chartData.push([item.catagory_name, item.num_films]);
            });


            google.charts.setOnLoadCallback(function() {
                const dataTable = google.visualization.arrayToDataTable(chartData);
                const options = {
                    title: 'Số lượng phim theo thể loại',
                    hAxis: {
                        title: 'Thể loại'
                    },
                    vAxis: {
                        title: 'Số lượng phim'
                    },
                    legend: {
                        position: 'none'
                    }
                };
                const chart = new google.visualization.ColumnChart(document.getElementById('filmChart'));
                chart.draw(dataTable, options);
            });
        })
        .catch(error => {
            console.error('Lỗi khi tải dữ liệu:', error);
            document.getElementById('filmChart').innerText = 'Không thể tải dữ liệu.';
        });
</script>