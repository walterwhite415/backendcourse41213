<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Доска объявлений' ?></title>
   <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #eef0f2;
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 15px;
            color: #222;
        }

        .layout {
            width: 100%;
            max-width: 860px;
            margin: 36px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.10);
            overflow: hidden;
        }

        .header {
            padding: 22px 28px;
            font-size: 22px;
            font-weight: bold;
            background: #2c3e50;
            color: #fff;
            letter-spacing: 0.5px;
        }

        .header a { color: #fff; text-decoration: none; }

        .nav {
            padding: 0 28px;
            background: #34495e;
            display: flex;
            gap: 4px;
        }

        .nav a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            padding: 10px 14px;
            display: inline-block;
            transition: color 0.2s;
        }

        .nav a:hover { color: #fff; }

        .content { padding: 28px; }

        .footer {
            padding: 14px 28px;
            text-align: center;
            font-size: 13px;
            color: #aaa;
            background: #f7f7f7;
            border-top: 1px solid #e8e8e8;
        }

        
        .ad-card {
            padding: 16px 0;
            border-bottom: 1px solid #ebebeb;
        }

        .ad-card:last-child { border-bottom: none; }

        .ad-card a.ad-title {
            font-size: 17px;
            font-weight: bold;
            color: #2c3e50;
            text-decoration: none;
        }

        .ad-card a.ad-title:hover { text-decoration: underline; }

        .ad-meta {
            font-size: 12px;
            color: #aaa;
            margin: 4px 0 6px;
        }

        .ad-excerpt { color: #555; line-height: 1.5; }

        .ad-price {
            margin-top: 6px;
            font-weight: bold;
            color: #2c3e50;
        }

        .ad-price.free { color: #888; font-weight: normal; }

        
        .categories {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .categories a {
            padding: 5px 12px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 13px;
            color: #555;
            text-decoration: none;
            transition: all 0.2s;
        }

        .categories a:hover,
        .categories a.active {
            background: #2c3e50;
            color: #fff;
            border-color: #2c3e50;
        }

        
        label {
            display: block;
            font-size: 13px;
            color: #666;
            margin-bottom: 4px;
            margin-top: 14px;
        }

        input[type=text],
        input[type=number],
        textarea,
        select {
            width: 100%;
            padding: 9px 11px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 15px;
            font-family: inherit;
            color: #222;
            background: #fafafa;
            transition: border-color 0.2s;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #2c3e50;
            background: #fff;
        }

        textarea { height: 130px; resize: vertical; }

        
        button, .btn {
            display: inline-block;
            padding: 9px 22px;
            background: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            margin-top: 16px;
        }

        button:hover, .btn:hover { background: #1a252f; }

        .btn-danger { background: #c0392b; }
        .btn-danger:hover { background: #922b21; }

        .btn-secondary {
            background: #fff;
            color: #555;
            border: 1px solid #ccc;
        }

        .btn-secondary:hover { background: #f0f0f0; color: #222; }

        /* Ошибки */
        .error {
            background: #fdecea;
            color: #c0392b;
            padding: 8px 12px;
            border-radius: 4px;
            margin-bottom: 8px;
            font-size: 14px;
        }

      
        .ad-full-title {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .ad-full-price {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin: 14px 0;
        }

        .ad-full-price.free { font-size: 18px; color: #888; font-weight: normal; }

        .ad-actions { margin-top: 20px; display: flex; gap: 10px; align-items: center; }

        h2 { color: #2c3e50; margin-bottom: 16px; }

        hr { border: none; border-top: 1px solid #ebebeb; margin: 4px 0; }
    </style>
</head>
<body>
<div class="layout content">
    <div class="header"><a href="<?= $basePath ?>/">Доска объявлений</a></div>
    <div class="nav">
        <a href="<?= $basePath ?>/">Все объявления</a>
        <a href="<?= $basePath ?>/ads/add">Подать объявление</a>
    </div>
    <div class="content" style="padding:0.5rem"></div>