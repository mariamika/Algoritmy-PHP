<?
header('Content-Type: text/html; charset=UTF-8');

$connect = mysqli_connect("localhost","root","","closure_table");
$result = mysqli_query($connect,"select a.*, b.idAncestor, b.idDescendant, b.level from `menu` as a 
inner join `items_menu` as b on a.idEntry = b.idDescendant;");
if(mysqli_num_rows($result)>0){
	$menu = [];
	while($row=mysqli_fetch_assoc($result)){
        $menu[$row[level]][$row[idAncestor]][$row[idDescendant]] = $row;

	}
//    echo "<pre>";
//    print_r($menu);
}

function build_menu($menu,$level,$idAncestor){
    if (is_array($menu)){
        $tree = "<ul>";
        if ($menu[$level]){
            foreach ($menu[$level][$idAncestor] as $menu_row){
                $tree .= "<li><a href='#' title='{$menu_row[name]}'>" . $menu_row[name] . "</a>";
                $tree .= build_menu($menu,$menu_row[level] + 1,$menu_row[idDescendant]);
                $tree .= "</li>";
            }
        }
        $tree .= "</ul>";
    } else return true;
    return $tree;
}

echo build_menu($menu,0,1);
