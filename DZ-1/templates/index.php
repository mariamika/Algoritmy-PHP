<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html">
    <title>DirectoryIterator</title>
    <link rel="stylesheet" href="<?=CSS;?>style.css">
</head>
<body>
<header>
    <h1>Файловый менеджер с Directory Iterator</h1>
    <span>Обзор содержимого папок</span>
</header>
<div id="dirs_files">
    <h2>Содержимое каталога</h2>
    <table>
        <thead>
        <tr>
            <td>Название</td>
            <td>Размер</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="?do=main&path=<?=$res_arr['old_path'];?>">Назад</a></td>
            <td></td>
        </tr>
        <!--Выводим папки-->
        <?php if ($res_arr['dirs']) :?>
            <? foreach ($res_arr['dirs'] as $dirs) :?>
                <tr>
                <? foreach ($dirs as $dir=>$val) :?>
                    <td>
                        <img src="<?=IMG;?>dir2.png" alt="directory" align="left">
                        <a href="?do=main&path=<?=$val;?>"><?=$dir;?></a>
                    </td>
                    <td>-</td>
                <? endforeach;?>
                </tr>
            <? endforeach;?>
        <? endif;?>
        <!--Выводим файлы-->
        <?php if ($res_arr['files']) :?>
            <? foreach ($res_arr['files'] as $files) :?>
                <tr>
                    <? foreach ($files as $file=>$size) :?>
                        <td>
                            <img src="<?=IMG;?>file.png" alt="file" align="left"><?=$file;?>
                        </td>
                        <td><?=$size;?></td>
                    <? endforeach;?>
                </tr>
            <? endforeach;?>
        <? endif;?>
        </tbody>
    </table>
</div>
<footer>
    <hr>
    <p> 2018 Created by Mishina Maria</p>
</footer>
</body>
</html>