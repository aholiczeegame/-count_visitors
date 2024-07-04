<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
</head>
<body>
    <h1>จำนวนผู้เข้าชม</h1>
    <p>ผู้เข้าชมทั้งหมด: <span id="totalCount"></span></p>
    <p>ผู้เข้าชมปีนี้: <span id="yearlyCount"></span></p>
    <p>ผู้เข้าชมเดือนนี้: <span id="monthlyCount"></span></p>
    <p>ผู้เข้าชมวันนี้: <span id="dailyCount"></span></p>

    <script>
        fetch('counter.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalCount').innerText = data.total;
                document.getElementById('yearlyCount').innerText = data.yearly;
                document.getElementById('monthlyCount').innerText = data.monthly;
                document.getElementById('dailyCount').innerText = data.daily;
            });
    </script>
</body>
</html>
