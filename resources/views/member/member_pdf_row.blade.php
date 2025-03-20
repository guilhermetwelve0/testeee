<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Download</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            background-color: #f4f4f9;
            padding: 3px 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .header h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .header p {
            font-size: 16px;
            color: #666;
            margin-top: 0;
            margin-bottom: 0;
        }
        .list-container {
            width: 90%;
            margin: 0 auto;
        }
        .list-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .list-item .line {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 0;
        }
        .list-item h2 {
            margin: 0;
            font-size: 16px;
            color: #333;
            flex-shrink: 0;
            margin-right: 10px;
            flex: 1;
        }
        .list-item p {
            margin: 0;
            font-size: 14px;
            color: #555;
            flex: 2;
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
        }
        .list-item hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 10px 0;
        }
        .section-title {
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        }
        .section-title:hover {
            color: #3498db;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="section-title">Member PDF</h1>
    </div>
    <div class="list-container">
        <div class="list-item">
            <div class="line">
                <h2>ID</h2>
                <p>1</p>
            </div>
            <hr>
            <div class="line">
                <h2>Name</h2>
                <p>Error </p>
            </div>
            <hr>
            <div class="line">
                <h2>Date</h2>
                <p>20-02-2025</p>
            </div>
        </div>
    </div>
</body>
</html>
